app.controller('company_portal',function($scope,$http,$httpParamSerializerJQLike,$location){
//initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

  //check if user is logged in
  $http({
    method: 'GET',
    url:'queries/qr_employees_check_login.php'
  }).then(function successCallback(response) {
    if(!JSON.parse(response.data)){
      $location.path('/company');
    }
  });

  //logout button
  $scope.logout = function(){
    // $location.path('/company');
    $http({
      method: 'POST',
      url:'queries/qr_employees_logout.php'
    }).then(function successCallback(response) {
      // console.log(response.data);
    });
  }


  //scope variables
  $scope.employees = [];
  $scope.graph = {
    type: 'week'
  };
  var steps_month=[];
  var steps_three_months = [];
  var labels_month = [];
  var labels_three_months = [];
  var steps_week = [];
  var labels_week = [];
  $scope.labels = [];
  $scope.order = {
    type: '-total'
  };

  //get company name
  $http({
    method: 'GET',
    url: 'queries/qr_company_portal_get_name.php'
  }).then(function successCallback(response) {
    $scope.name = response.data.company;
  });

  //get employees badges,level, total steps from DB
  var NumberOfEmployees;
  var init = function(){
    $http({
      method: 'GET',
      url: 'queries/qr_company_portal_get_employees.php'
    }).then(function successCallback(response) {
      console.log(response.data);
      $scope.employees = response.data;
      NumberOfEmployees = response.data.length;

      //get % of employees registered
      var count = 0;
      angular.forEach(response.data, function(item,index){
        if(item.name.length != 0){
          count++;
        }
      });
      $scope.employeesRegistered = (count/NumberOfEmployees)*100;
      console.log($scope.employeesRegistered);

    });
  }
  init();
  //company name from DB
  $http({
    method: 'GET',
    url: 'queries/qr_company_portal_get_employees_steps.php'
  }).then(function successCallback(response) {
    console.log(response.data.length );
    if(response.data.length == 8){
      $scope.noSteps = false;
    }else{
      $scope.noSteps = true;
    }

    //calculate average steps for each day
    var average_day = [];
    var number = 0;
    var i = -1;
    angular.forEach(response.data, function(item, index){
      if(number == 0){
        average_day.push(item.steps);
        i++;
      }else{
        average_day[i] = (average_day[i] + item.steps);
      }
      if(number == NumberOfEmployees-1){
        number = 0;
        average_day[i] = Math.round(average_day[i]/NumberOfEmployees);
      }else{
        number++;
      }
    });
    console.log(average_day);

    //calculate average steps for each week
    number = 0;
    i = -1;
    var weekNumber;
    var average_week = [];
    angular.forEach(average_day, function(item, index){
      if(number == 0){
        average_week.push(item);
        i++;
      }else{
        average_week[i] = average_week[i]+item;
      }
      if(number == 6){
        number = 0;
        average_week[i] = Math.round(average_week[i]/7);
      }else{
        number++;
      }
      // number++;
    });
    console.log(average_week);
    setGraphData(average_day,average_week);
  });


  function setGraphData(daily,weekly){
    var today = new Date();
    var week = 7;
    var month = 30;

    //graph data for past 7 days (steps and labels)
    var week_format = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    for(var i = 0; i < week; i++){
      steps_week.unshift(daily[i]);
      if(i == week-1){
        labels_week.push("Today");
      }else if(i == week-2){
        labels_week.push("Yesterday");
      }else{
        labels_week.push(week_format[today.getDay()]);
      }
      today.setDate(today.getDate() + 1);
    }
    $scope.data = [steps_week];
    $scope.labels = labels_week;
    $scope.colors = ["#3ac641"];

    //graph data for past month
    today = new Date();
    for(var k = 0;k<month;k++){
      steps_month.unshift(daily[k]);
      if(k==0){
        labels_month.unshift("Today");

      }else{
        labels_month.unshift(today.toDateString().substring(4,10));
      }
      today.setDate(today.getDate()-1);
    }

    //3 months data
    for(var i = 0;i<weekly.length;i++){
      steps_three_months.unshift(weekly[i]);
      if(i == 0){
        labels_three_months.unshift("This Week");
      }else if(i==1){
        labels_three_months.unshift("1 Week Ago");
        // labels_three_months[i] = i + labels_three_months[i];
      }else{
        labels_three_months.unshift(i+" Weeks Ago");
      }
    }
    console.log(steps_month);
    console.log(labels_three_months);
  }

  $scope.changeGraph = function(){
    console.log($scope.graph.type);
    if($scope.graph.type == 'week'){
      $scope.data = [steps_week];
      $scope.labels = labels_week;
    }else if($scope.graph.type == 'month'){
      $scope.data = [steps_month];
      $scope.labels = labels_month;
    }else{
      $scope.data = [steps_three_months];
      $scope.labels = labels_three_months;
    }
  }


});
