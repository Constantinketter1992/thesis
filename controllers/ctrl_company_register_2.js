app.controller('company_register_2',function($scope,$http,$httpParamSerializerJQLike, $location){
  //initializers
  $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

  //scope variables
  $scope.resetMode = false;
  $scope.list_state = false;
  $scope.addMode = true;

  $scope.employees = [];
  $scope.cancel = function(user){
    console.log('hi');
    $scope.current = {};
    $scope.addMode = true;
  }

  $scope.reset = function(){
    console.log('hi');
    $scope.employees = [];
    $scope.resetMode = false;
  }

  $scope.save = function(user){
    console.log('hi');
    $scope.addMode = true;
    $scope.current = {};
  }

  $scope.add = function(user){
    console.log($scope.employees);
    if($scope.list_state){
      $scope.list_state = false;
    }
    $scope.resetMode = true;
    $scope.employees.push(user);
    $scope.current = {};
  }
  // $scope.checkEmail = function(){
  //   angular.forEach($scope.employees, function(value){
  //     if($scope.current = value){
  //       $scope.unique = true;
  //       return;
  //     }
  //   });
  // }

  $scope.remove = function(user){
    var index = $scope.employees.indexOf(user);
    $scope.employees.splice(index, 1);
  }

  $scope.edit = function(user){
    $scope.current = user;
    $scope.addMode = false;
  }

  $scope.submit = function() {
    console.log($scope.employees.length);
     if ($scope.employees.length == 0){
       $scope.list_state = true;
     }else{
       $http({
         method: 'POST',
         url: 'queries/qr_company_register_2_post_employees.php',
         data: $httpParamSerializerJQLike({'data': $scope.employees})
       }).then(function successCallback(response) {
        console.log(response.data);
        $location.path('/company/portal');
       });
     }
  }
});
