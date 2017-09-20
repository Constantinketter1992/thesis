app.controller('company', function($scope,$location,$http,$httpParamSerializerJQLike){
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  //initializers:
  $scope.showError = false;
  $scope.validation = false;

  //submit
  $scope.submit = function (formValid){
    if(formValid){
      $http({
        method: 'POST',
        url: 'queries/qr_company_login_validation.php',
        data: $httpParamSerializerJQLike({ 'user' : $scope.user, 'password': $scope.password })
      }).then(function successCallback(response) {
        var result = JSON.parse(response.data);
        if(result){
          $location.path('/company/portal');
        }else{
          $scope.validation = true;
          $scope.showError = true;
          $scope.c_login.$setPristine();
        }
      });
    }else{
      $scope.showError = true;
    }
  }
});
