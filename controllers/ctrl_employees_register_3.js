app.controller('employees_register_3', function($window,$scope,$location,$http,$httpParamSerializerJQLike) {
  //initializers:
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  $scope.fitbit_client_id = "228K22";
  var url = "https://www.fitbit.com/oauth2/authorize?response_type=token&client_id=" + $scope.fitbit_client_id +
  "&scope=activity&expires_in=31536000";

  $scope.submit = function(){
    // $window.open(url);
    // window.location.protocol = "https:";
    window.location.replace(url);
  }

});
