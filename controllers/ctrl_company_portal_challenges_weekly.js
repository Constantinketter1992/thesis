app.controller('company_portal_challenges_weekly',function($scope,$http,$httpParamSerializerJQLike){
//initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
//scope variables
  $scope.newChallengeClicked = false;
  $scope.groupNumber = 2;
  $scope.stepsOptions = [{g_value: '', i_value: '', text: 4000},{g_value: '', i_value: '', text: 5000}, {g_value: '', i_value: '', text: 6000},{g_value: '', i_value: '', text: 7000}, {g_value: '', i_value: '', text: 8000}];
  var weeklyStepsPerGroup;
  $scope.awardList = ["none", "gift card", "cash reward", "other"];
  $scope.challenges = []
  $scope.awards= [{type:"none", text: ""},
  {type:"none", text: ""},
  {type:"none", text: ""},
  {type:"none", cutoff: 5, text: ""},
  {type:"none", text: ""}];
  $scope.cutoffOptions = [5, 10, 15, 20, 25, 30];
  $scope.selected = [false, false, false, false, false];
  // var employees = passEmployees.get();
  // console.log(employees);
  // var randomizeEmployeesList = shuffle(employees);

  //get employees number
  var randomizeEmployeesList;
  var employees;
  $http({
    method: 'GET',
    url: 'queries/qr_company_portal_get_employees.php'
  }).then(function successCallback(response) {
    employees = response.data;
    console.log(employees);
    randomizeEmployeesList = shuffle(employees);
    $scope.calculateSteps();
  });

  $scope.calculateSteps = function(){
    $scope.stepsOptions.g_value = [];
    angular.forEach($scope.stepsOptions, function(option){
      //calculate options
      weeklyStepsPerGroup = (7 * option.text * employees.length) / $scope.groupNumber;
      //reset g_value
      option.g_value = weeklyStepsPerGroup;
      option.i_value = 7 * option.text;
    });
    $scope.stepsPerGroup = $scope.stepsOptions[0].g_value;
    $scope.stepsPerPerson = $scope.stepsOptions[0].i_value;

  }


//create challenge:

  $scope.newChallenge = function(){
    $scope.newChallengeClicked = true;
  }
  $scope.cancelChallenge = function(){
    $scope.newChallengeClicked = false;
  }
  $scope.submitChallenge = function(){
    var groups = splitUp(randomizeEmployeesList,$scope.groupNumber);
    console.log(groups);
    $http({
      method: 'POST',
      url: 'queries/qr_company_portal_post_challenge_week.php',
      data: $httpParamSerializerJQLike({'awards':$scope.awards, 'groups': groups, 'numberOfGroups': $scope.groupNumber, 'stepsPerGroup': $scope.stepsPerGroup, 'stepsPerPerson': $scope.stepsPerPerson})
    }).then(function successCallback(response){
      console.log(response.data);
    });
  }

  $scope.determineAwardType = function(number, value){
    console.log($scope.selected[number]);
    console.log(value);
    if(value == "none"){
      $scope.selected[number] = false;
    }else{
      $scope.selected[number] = true;
    }
  }




  //borrowed from https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
   function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }
  //borrowed from https://stackoverflow.com/questions/8188548/splitting-a-js-array-into-n-arrays
  function splitUp(arr, n) {
      var rest = arr.length % n, // how much to divide
          restUsed = rest, // to keep track of the division over the elements
          partLength = Math.floor(arr.length / n),
          result = [];

      for(var i = 0; i < arr.length; i += partLength) {
          var end = partLength + i,
              add = false;

          if(rest !== 0 && restUsed) { // should add one element for the division
              end++;
              restUsed--; // we've used one division element now
              add = true;
          }

          result.push(arr.slice(i, end)); // part of the array

          if(add) {
              i++; // also increment i in the case we added an extra element for division
          }
      }

      return result;
  }
//end of controller
});
