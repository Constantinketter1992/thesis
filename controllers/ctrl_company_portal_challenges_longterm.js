app.controller('company_portal_challenges_longterm',function($scope,$http,$httpParamSerializerJQLike,$location){
  //initializers
  $http.defaults.headers.post["Content-Type"]= "application/x-www-form-urlencoded";
  //scope variables
  $scope.timeCondition = "without";
  $scope.b_time = true;
  $scope.levels = [];
  $scope.awardList = ["none", "gift card", "cash reward", "other"];
  $scope.showError = false;
  for(var i = 1;i<21;i++){
    $scope.levels.push(i);
  }
  $scope.object = {level: null, n_t_completion: null, n_t_winner: null, n_p_completion: null, n_p_winner: null, n_p_cutoff: null, awardType: "none", awardDetails: null}

  //functions
  // $scope.resetDetails = function(){
  //   console.log($scope.object.awardType);
  //   if($scope.object.awardType == "none"){
  //     $scope.object.awardDetails = null;
  //   }
  // }
  $scope.reset = function(type){
    if(type == 'levels'){
      if(!$scope.Levels){
        $scope.object.level = null;
      }
    }else{
      if(!$scope.awards){
        $scope.tc = false;
        $scope.object.n_t_completion = null;
        $scope.tw = false;
        $scope.object.n_t_winner = null;
        $scope.ic = false;
        $scope.object.n_p_completion = null;
        $scope.c = false;
        $scope.object.n_p_cutoff = null;
        $scope.iw = false;
        $scope.object.n_p_winner = null;
      }
    }
    if(!$scope.awards && !$scope.Levels){
      $scope.object.awardType = "none";
      $scope.object.awardDetails = null;
    }
  }
  // $scope.resetNumber = function(){
  //   if($scope.badges.indexOf('t_completion')<0){
  //     $scope.object.n_t_completion = null;
  //   }
  //   if($scope.badges.indexOf('t_winner')<0){
  //     $scope.object.n_t_winner = null;
  //   }
  //   if($scope.badges.indexOf('p_completion')<0){
  //     $scope.object.n_p_completion = null;
  //   }
  //   if($scope.badges.indexOf('p_winner')<0){
  //     $scope.object.n_p_winner = null;
  //   }
  //   if($scope.badges.indexOf('p_cutoff')<0){
  //     $scope.object.n_p_cutoff = null;
  //   }
  // }
  $scope.submit = function(){
    console.log($scope.object);
    $http({
      method: 'POST',
      url: 'queries/qr_company_portal_post_challenge_longterm.php',
      data: $httpParamSerializerJQLike({ 'object' : $scope.object })
    }).then(function successCallback(response) {
      $location.path('/company/portal/challenges');
    });
  }

});
