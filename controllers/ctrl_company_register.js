app.controller('company_register', function($scope,$location,$http,$httpParamSerializerJQLike) {
  //initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

  $scope.reset = function(){
    $scope.user = '';
    $scope.email = '';
    $scope.company = '';
    $scope.value1 = '';
    $scope.value2 = '';
    $scope.myForm.$setUntouched();
    $scope.email_status = false;
    $scope.user_status = false;
  }
    // Check email
 $scope.checkEmail = function(formValid){
   if(formValid){
     $http({
       method: 'POST',
       url: 'queries/qr_company_register_validation.php',
       data: $httpParamSerializerJQLike({ 'email' : $scope.email })
     }).then(function successCallback(response) {
      $scope.email_status = JSON.parse(response.data);
      console.log($scope.email_status);
     });
   }
 }

 $scope.checkUsername = function(formValid){
  if(formValid){
    $http({
      method: 'POST',
      url: 'queries/qr_company_register_validation.php',
      data: $httpParamSerializerJQLike({ 'username' : $scope.user })
    }).then(function successCallback(response) {
     $scope.user_status = JSON.parse(response.data);
    });
  }else{
    if($scope.user_status){
      $scope.user_status = false;
    }
  }
 }

 $scope.submit = function(){
   $http({
     method: 'POST',
     url: 'queries/qr_company_register_post.php',
     data: $httpParamSerializerJQLike({
       'username' : $scope.user,
       'email': $scope.email,
       'company': $scope.company,
       'password': $scope.value1
      })
   }).then(function successCallback(response) {
     if(response.data == 'success'){
       $location.path('/company/register/2');
     }else{
       console.log("failed");
     }
   });
 }
});
