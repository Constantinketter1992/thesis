app.controller('employees_portal_home', function($window,$scope,$location,$http,$httpParamSerializerJQLike,$timeout,$rootScope, $interval, roundProgressConfig,$location) {
  //initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

  //check if user is logged in
  $http({
    method: 'GET',
    url:'queries/qr_employees_check_login.php'
  }).then(function successCallback(response) {
    if(!JSON.parse(response.data)){
      $location.path('/');
    }
  });

  //logout button
  $scope.logout = function(){
    $location.path('/');
    $http({
      method: 'POST',
      url:'queries/qr_employees_logout.php'
    }).then(function successCallback(response) {
      // console.log(response.data);
    });
  }

  //go to weekly challenge page
  $scope.weeklyChallengePage = function(){
    if ($scope.WeeklyChallenge){
      $location.path('/employees/portal/challenge');
    }else{
      alert("Unfortunately there are no weekly challenges this week");
    }
  }

  //variables
  var IndividualTargetReached = false;
  $scope.WeeklyChallenge = false;
  var info;
  var weekly_target;
  var $popup = $("#popup");
  var $popup_container = $popup.find("#popup_container");
  var $img = $popup_container.find("img");
  $scope.order = {
    type: '-level'
  };
  $scope.graph = {
    type: 'week'
  };

  //get user info
  $http({
    method: 'GET',
    url:'queries/qr_employees_portal_get_user.php'
  }).then(function successCallback(response) {
    console.log(response.data);
    info = response.data;
    $scope.employee_id = info[0];
    getFitbitData();
  });

  //check if there are challenges this weekly
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_weekly.php'
  }).then(function successCallback(response) {
    var result = response.data;
    console.log(result);
    if(typeof result !== "string"){
      $scope.WeeklyChallenge = true;
      weekly_target = result[0].steps_person;
      getAverageSteps();
    }else{

    }
  });
  //get user's daily steps
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_steps_today.php'
  }).then(function successCallback(response) {
    var result = JSON.parse(response.data);
    if(result !== false){
      $scope.steps_today = result;
      console.log(result);
    }else{
      $scope.steps_today = 0;
    }
  });

  //get user's history(level, XP, total steps)
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_stats.php'
  }).then(function successCallback(response) {
    var result = response.data;
    console.log(result);
    $scope.stats = result;
    $scope.xp_required = 1000 + result.level*200;
    console.log(result.level);
  });

  //get all employees' history
  var NumberOfEmployees;
  var employees_myId;
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_stats_all.php'
  }).then(function successCallback(response) {
    var result = response.data;
    console.log(result);
    NumberOfEmployees = response.data.length;
    $scope.employees = result;
    angular.forEach(result, function(item,index){
      if(item.id == $scope.employee_id){
        employees_myId = index;
        return;
      }
    });
  });

  //get long term challenges
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_longterm.php'
  }).then(function successCallback(response) {
    var result = response.data;
    console.log(result);
    $scope.challenges = result;
    //check if user completed them
    checkCompletion(result);
  });

  //get steps from each day for the past month(for the chart)
  $http({
    method: 'GET',
    url: 'queries/qr_employees_portal_get_steps.php'
  }).then(function successCallback(response) {
    var result = response.data;
    console.log(result);
    setGraphData(result);
  });

  //for each day of the last month
  //if there are no steps on a particular day set that day's steps equal to 0
  var steps_month=[];
  var labels_month = [];
  var steps_week = [];
  var labels_week = [];
  $scope.labels = [];

  function setGraphData(data){
    var today = new Date();
    var week = 7;
    var month = 30;
    var steps_week_total = 0;

    //graph labels for past 7 days
    var week_format = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    for(var i = 0; i < week; i++){
      steps_week_total = steps_week_total + data[i].steps;
      steps_week.unshift(data[i].steps);
      if(i == week-1){
        labels_week.push("Today");
      }else if(i == week-2){
        labels_week.push("Yesterday");
      }else{
        labels_week.push(week_format[today.getDay()]);
      }
      today.setDate(today.getDate() + 1);
    }
    $scope.steps_week_total = steps_week_total;

    //graph labels for past month
    today = new Date();
    for(var k = 0;k<month;k++){
      steps_month.unshift(data[k].steps);
      // if(k%3==0 && k!==0){
      //   labels_month.unshift(today.toDateString().substring(4,10));
      // }else if(k==0){
      //   labels_month.unshift("Today");
      // }else{
      //   labels_month.unshift("");
      // }
      if(k==0){
        labels_month.unshift("Today");
      }else if(k==1){
        labels_month.unshift("Yesterday");
      }else{
        labels_month.unshift(today.toDateString().substring(4,10));
      }
      today.setDate(today.getDate()-1);
    }
    $scope.data = [steps_week];
    $scope.labels = labels_week;
  }

  $scope.changeGraph = function(){
    console.log($scope.graph.type);
    if($scope.graph.type == 'week'){
      if($scope.compare){
        $scope.data = [steps_week,steps_week_average];
      }else{
        $scope.data = [steps_week];
      }
      $scope.labels = labels_week;
    }else{
      if($scope.compare){
        $scope.data = [steps_month,steps_month_average];
      }else{
        $scope.data = [steps_month];
      }
      $scope.labels = labels_month;
    }
  }

  var steps_week_average = [];
  var steps_month_average = [];
  function getAverageSteps(){
    $http({
      method: 'GET',
      url: 'queries/qr_employees_portal_get_steps_all.php'
    }).then(function successCallback(response) {
      console.log(response.data);
      var array = [];
      var number = 0;
      var i = -1;
      angular.forEach(response.data, function(item, index){
        if(number == NumberOfEmployees){
          number = 0;
          array[i] = Math.round(array[i]/NumberOfEmployees);
        }
        if(number == 0){
          array.push(item.steps);
          i++;
        }else{
          array[i] = (array[i] + item.steps);
        }
        number++;
      });
      console.log(array);
      var week = 7;
      var month = 30;
      for(var i = 0; i<week;i++){
        steps_week_average.unshift(array[i]);
      }
      for(var i = 0; i<month;i++){
        steps_month_average.unshift(array[i]);
      }

    });
  }

  function checkCompletion(challenges){
    var stats = $scope.stats;
    angular.forEach(challenges, function(item,index){
      var completed = true;
      if(item.champion != null){
        if(stats.champion < item.champion){
          completed = false;
        }
      }
      if(item.elite != null){
        if(stats.elite < item.elite){
          completed = false;
        }
      }
      if(item.warriors != null){
        if(stats.warriors < item.warriors){
          completed = false;
        }
      }
      if(item.league != null){
        if(stats.league < item.league){
          completed = false;
        }
      }
      if(item.alliance != null){
        if(stats.alliance < item.alliance){
          completed = false;
        }
      }
      if(item.level != null){
        if(stats.level < item.level){
          completed = false;
        }
      }
      $scope.challenges[index].complete = completed;
    });
    console.log($scope.challenges);
  }


  //show animation popup
  function showPopup(type, steps, xp, level){
    if($popup.css("visibility") == "hidden" ){
      if(type == "award"){
        $scope.popup_title = "Congrats!";
        $img.show().attr('src', 'img/league.gif');
        $scope.popup_text = "+"+steps+" steps\n+"+xp+" XP\nyou just won:";
      }else{
        $img.hide();
        //if there's a levelup
        if(level != null){
          $scope.popup_title = "Congrats!\nLevel "+level;
          $scope.popup_text = "+ "+steps+" steps\n+ "+xp+" XP";
        }else{
          $scope.popup_title = "+"+steps+" steps\n+"+xp+" XP";
          $scope.popup_text = "Keep going!"
        }
      }
      hide();
      $("#popup").css('visibility','visible').animateCss(["rollIn","rollOut"]);
      function hide(){
        setTimeout(function(){
          $("#popup").css('visibility', 'hidden');
        },5000);
      }
    }
  }

  //get new fitbit data
  function getFitbitData(){
    var date = moment().format("YYYY-MM-DD");
    var url = 'https://api.fitbit.com/1/user/'+info[5]+'/activities/tracker/steps/date/'+date+'/1d.json';
    $http({
      method: 'GET',
      url: url,
      headers : {"Authorization": "Bearer "+info[4]}
    }).then(function successCallback(response) {
      var result = parseInt(response.data["activities-tracker-steps"][0].value);
      console.log(response.data);
      // if there are new steps(compare the steps stored in the DB for today), save the changes in the DOM and DB
      if(result !== $scope.steps_today){
        console.log("hi");
        $scope.newSteps = result - $scope.steps_today;
        //update user's steps in employees steps array
        $scope.employees[employees_myId].total = $scope.employees[employees_myId].total + $scope.newSteps;
        //update steps taken today
        $scope.steps_today = result;
        $scope.stats.total = $scope.stats.total + $scope.newSteps;
        console.log($scope.steps_today);
        console.log($scope.newSteps);
        postSteps(); //DB
        steps_week[6] = $scope.steps_today;
        steps_month[29] = $scope.steps_today;
        $scope.data[0].pop();
        $scope.data[0].push($scope.steps_today);
        console.log($scope.data);

        //if there is a weekly challenge, check whether user reached goal
        if($scope.WeeklyChallenge && !IndividualTargetReached && $scope.steps_weekly + $scope.newSteps >= weekly_target){
          //determine XP gained: 100 for badge and 1 per 100 steps
          console.log("yes");
          var newXP = Math.round($scope.newSteps*10/100)/10 +100;
          $scope.stats.xp = $scope.stats.xp + newXP;
          postXP(newXP);
          postBadge();
          //show popup animation
          showPopup("award", $scope.newSteps, newXP);
          IndividualTargetReached = true;
        }else{
          //determine XP
          console.log("yesa a");
          var newXP = Math.round($scope.newSteps*10/100)/10;
          $scope.stats.xp = $scope.stats.xp + newXP;
          console.log(newXP);
          console.log($scope.stats.xp);
          //post new xp
          postXP(newXP);

          //determine if there's a levelup
          if($scope.stats.xp>=$scope.xp_required){
            var difference = $scope.stats.xp - $scope.xp_required;
            //change level and XP
            $scope.stats.level++;
            //show popup animation
            showPopup("levelup",$scope.newSteps,newXP, $scope.stats.level);
            $scope.stats.xp = difference;
            $scope.xp_required = $scope.xp_required + 200;
            //post new level
            postLevel(difference);
          }else{
            showPopup("normal",$scope.newSteps, newXP);
          }
        }
      }
    });
  }

  function postSteps(){
    $http({
      method: 'POST',
      url: 'queries/qr_employees_portal_post_steps.php',
      data: $httpParamSerializerJQLike({'steps': $scope.newSteps})
    });
  }
  function postXP(xp){
    $http({
      method: 'POST',
      url: 'queries/qr_employees_portal_post_xp.php',
      data: $httpParamSerializerJQLike({'xp': xp})
    });
  }
  function postLevel(xp){
    $http({
      method: 'POST',
      url: 'queries/qr_employees_portal_post_level.php',
      data: $httpParamSerializerJQLike({'xp': xp})
    });
  }
  function postBadge(){
    $http({
      method: 'POST',
      url: 'queries/qr_employees_portal_post_badge.php',
      data: $httpParamSerializerJQLike({'type': "badge_ind_completion"})
    });
  }



  $.fn.extend({
  animateCss: function (animationNames, index) {
    if (!Array.isArray(animationNames)){
      animationNames = [animationNames];    }
    if (typeof(index)==='undefined') { index = 0; }
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    this.addClass('animated ' + animationNames[index]).one(animationEnd, index, function () {
      $(this).removeClass(animationNames[index]);
      if (index < animationNames.length - 1) {
        $(this).animateCss(animationNames, index + 1);
      }else{
        $(this).removeClass('animated');
        return this;
      }
    });
  }
 });


});
