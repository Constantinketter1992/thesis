app.controller('employees_register_2', function($scope,$location,$http,$httpParamSerializerJQLike) {
  //initializers:
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

  //user
  var user =

  $scope.reset = function(){
    $scope.user = '';
    $scope.name = '';
    $scope.value1 = '';
    $scope.value2 = '';
    $scope.e_register.$setUntouched();
    $scope.email_status = false;
    $scope.user_status = false;
  }


 $scope.checkUsername = function(formValid){
   if(formValid){
     $http({
       method: 'POST',
       url: 'queries/qr_employees_register_2_validation.php',
       data: $httpParamSerializerJQLike({ 'user' : $scope.user })
     }).then(function successCallback(response) {
      $scope.user_status = JSON.parse(response.data);
      console.log($scope.user_status);
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
     url: 'queries/qr_employees_register_2_post.php',
     data: $httpParamSerializerJQLike({
       'user' : $scope.user,
       'name': $scope.name,
       'password': $scope.value1
      })
   }).then(function successCallback(response) {
     if(response.data == 'success'){
       console.log('success');
       $location.path('/employees/register/3');
     }else{
       console.log("failed");
     }
   });
 }
});
