app.controller('company_portal_challenges',function($scope,$http,$httpParamSerializerJQLike){
//initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  //scope variable
  $scope.clicked = [];

  //get weekly challenges from db
  var getWeeklyChallenge = function(){
    $http({
      method: 'GET',
      url: 'queries/qr_company_portal_get_challenge_weekly.php'
    }).then(function successCallback(response) {
      if(response.data.length == 0){
        $scope.empty = true;
      }else{
        console.log(response.data);
        $scope.weekly = response.data;
        $scope.empty = false;
      }

    });
  }
  var getLongTermChallenges = function(){
    $http({
      method: 'GET',
      url: 'queries/qr_company_portal_get_challenges_longterm.php'
    }).then(function successCallback(response) {
      if(response.data.length == 0){
        console.log("none");
        $scope.l_empty = true;
      }else{
        console.log("yes");
        $scope.longterm = response.data;
        $scope.l_empty = false;
        // for(var i = 0; i < $scope.longterm.length; i++){
        //   $scope.clicked.push(false);
        // }
      }

    });
  }
  getWeeklyChallenge();
  getLongTermChallenges();

  // $scope.click = function(id){
  //   $scope.clicked[id] =
  // }
//end of controller

});
