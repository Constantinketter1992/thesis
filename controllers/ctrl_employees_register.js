app.controller('employees_register', function($scope,$location,$http,$httpParamSerializerJQLike){
  $http.defaults.headers.post["Content-Type"]= "application/x-www-form-urlencoded";
  //initializers:
  $scope.validation = false;
  $scope.showError = false;

  //submit
  $scope.submit = function (formValid){
    if(formValid){
      $http({
        method: 'POST',
        url:'queries/qr_employees_register_validation.php',
        data: $httpParamSerializerJQLike({ 'token' : $scope.token })
      }).then(function successCallback(response) {
        var result = JSON.parse(response.data);
        if(!result){
          $scope.validation = true;
          $scope.showError = true;
          $scope.e_register.$setPristine();
          console.log($scope.e_register);
        }else{
          $location.path('/employees/register/2');
        }
      });
    }else{
      $scope.showError = true;
    }
  }
});
