app.controller('employees', function($scope,$location,$http,$httpParamSerializerJQLike){
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  //initializers:
  $scope.showError = false;
  $scope.validation = false;

  //check if fitbit account was just registered
  //if so redirect them to user's home page
  console.log($location.hash());
  if($location.hash().length != 0){
    var token = $location.hash().split('=')[1].slice(0, -8);
    var user_id = $location.hash().split('=')[2].slice(0, -6);
    console.log(token);
    console.log(user_id);
    if(token !== undefined){
      $location.path('/employees/portal/home');
      $http({
        method: 'POST',
        url: 'queries/qr_employees_register_3_post.php',
        data: $httpParamSerializerJQLike({
          'access_token' : token,
          'user_id' : user_id
         })
      }).then(function successCallback(response) {
        console.log(response.data);
        $location.url($location.path());
      });
    }
  }

  //submit
  $scope.submit = function (formValid){
    if(formValid){
      $http({
        method: 'POST',
        url: 'queries/qr_employees_login_validation.php',
        data: $httpParamSerializerJQLike({ 'user' : $scope.user, 'password': $scope.password })
      }).then(function successCallback(response) {
        console.log(response.data);
        if(JSON.parse(response.data)){
          $location.path('/employees/portal/home');
        }else{
          $scope.validation = true;
          $scope.showError = true;
          $scope.e_login.$setPristine();
          console.log($scope.e_login.$dirty);
        }
      });
    }else{
      $scope.showError = true;
    }
  }
});
