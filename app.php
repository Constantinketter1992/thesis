<?php include '../../functions.php';
$token = $_GET['access_token'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>

  <!-- flexbox grid -->
  <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" > -->

  <!-- material -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-touch/1.6.4/angular-touch.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.4/angular-material.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-aria.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-messages.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.6.4/angular-sanitize.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="flipclock.css">
  <script src="flipclock.js"></script>

  <!-- https://github.com/monospaced/angular-elastic -->
  <script src='elastic.js'></script>
  <!-- https://github.com/Luegg/angularjs-scroll-glue -->
  <script src='scrollglue.js'></script>


</head>
<body ng-app="myApp">

<div ng-view>
<!-- end of ng-view -->
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<!-- https://momentjs.com/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-moment/0.9.0/angular-moment.min.js"></script>

<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <script src="flipclock.min"></script> -->
<!-- chart.js -->
<script src="Chart.min.js"></script>
<script src="angular-chart.min.js"></script>

<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<!-- ui bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>

<!-- progress bar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-svg-round-progressbar/0.4.8/roundProgress.min.js"></script>


<script>

  var app = angular.module('myApp', ["ngRoute","angularMoment","monospaced.elastic","luegg.directives","angular-svg-round-progressbar","ngMaterial","ui.bootstrap","ngAnimate","chart.js"]);
  app.config(['ChartJsProvider', function (ChartJsProvider) {
    // Configure all charts
    ChartJsProvider.setOptions({
      chartColors: ['#93c7bc', '#b1b1b1'],
      maintainAspectRatio: false
    });
    }])
  app.config(function($routeProvider, $locationProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "views/v_employees.php",
        controller: "employees"
    })
    .when("/company", {
        templateUrl : "views/v_company.php",
        controller : "company"
    })
    .when("/company/register", {
        templateUrl : "views/v_company_register.php",
        controller : "company_register"
    })
    .when("/company/register/2", {
        templateUrl : "views/v_company_register_2.php",
        controller : "company_register_2"
    })
    .when("/company/portal", {
        templateUrl : "views/v_company_portal.php",
        controller : "company_portal"
    })
    .when("/company/portal/challenges", {
        templateUrl : "views/v_company_portal_challenges.php",
        controller : "company_portal_challenges"
    })
    .when("/company/portal/challenges/weekly", {
        templateUrl : "views/v_company_portal_challenges_weekly.php",
        controller : "company_portal_challenges_weekly"
    })
    .when("/company/portal/challenges/longterm", {
        templateUrl : "views/v_company_portal_challenges_longterm.php",
        controller : "company_portal_challenges_longterm"
    })
    .when("/employees/register", {
        templateUrl : "views/v_employees_register.php",
        controller : "employees_register"
    })
    .when("/employees/register/2", {
        templateUrl : "views/v_employees_register_2.php",
        controller : "employees_register_2"
    })
    .when("/employees/register/3", {
        templateUrl : "views/v_employees_register_3.php",
        controller : "employees_register_3"
    })
    .when("/employees/portal/challenge", {
        templateUrl : "views/v_employees_portal_challenge.php",
        controller : "employees_portal_challenge"
    })
    .when("/employees/portal/home", {
        templateUrl : "views/v_employees_portal_home.php",
        controller : "employees_portal_home"
    })
    .otherwise({
      templateUrl : "views/v_employees.php",
      controller: "employees"
    });
  });
// app.controller('employees', function($scope,$window, $location, $http, $httpParamSerializerJQLike){
//   //initializers:
//   $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
//   var token = $location.hash().split('=')[1].slice(0, -8);
//   var user_id = $location.hash().split('=')[2].slice(0, -6);
//   console.log(token);
//   console.log(user_id);
//   if(token !== undefined){
//     $location.path('/employees/portal/home');
//     $http({
//       method: 'POST',
//       url: 'queries/qr_employees_register_3_post.php',
//       data: $httpParamSerializerJQLike({
//         'access_token' : token,
//         'user_id' : user_id
//        })
//     }).then(function successCallback(response) {
//       console.log(response.data);
//     });
//   }
// });

//borrowed from https://stackoverflow.com/questions/14012239/password-check-directive-in-angularjs
app.directive('equals', function(){
  return {
    restrict: 'A', // only activate on element attribute
    require: '?ngModel', // get a hold of NgModelController
    link: function(scope, elem, attrs, ngModel) {
      if(!ngModel) return; // do nothing if no ng-model

      // watch own value and re-validate on change
      scope.$watch(attrs.ngModel, function() {
        validate();
      });

      // observe the other value and re-validate on change
      attrs.$observe('equals', function (val) {
        validate();
      });

      var validate = function() {
        // values
        var val1 = ngModel.$viewValue;
        var val2 = attrs.equals;

        // set validity
        ngModel.$setValidity('equals', ! val1 || ! val2 || val1 === val2);
      };
    }
  }
});

//borrowed from https://stackoverflow.com/questions/17470790/how-to-use-a-keypress-event-in-angularjs
app.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});

//borrowed from https://www.yearofmoo.com/2014/09/taming-forms-in-angularjs-1-3.html#asnychronous-validation-via-asyncvalidators
app.directive('validateText', function() {

  var REQUIRED_PATTERNS = [
    /\d+/,    //numeric values
    /[a-z]+/, //lowercase values
    /[A-Z]+/, //uppercase values
    /\W+/,    //special characters
    /^\S+$/   //no whitespace allowed
  ];

  return {
    require : 'ngModel',
    link : function($scope, element, attrs, ngModel) {
      ngModel.$validators.validateText = function(value) {
        var status = true;
        angular.forEach(REQUIRED_PATTERNS, function(pattern) {
          status = status && pattern.test(value);
        });
        return status;
      };
    }
  }
});

//borrowed from https://stackoverflow.com/questions/15847726/is-there-a-simple-way-to-use-button-to-navigate-page-as-a-link-does-in-angularjs
app.directive( 'goClick', function ( $location ) {
  return function ( scope, element, attrs ) {
    var path;

    attrs.$observe( 'goClick', function (val) {
      path = val;
    });

    element.bind( 'click', function () {
      scope.$apply( function () {
        $location.path( path );
      });
    });
  };
});

// borrowed from https://stackoverflow.com/questions/22408790/angularjs-passing-data-between-pages
//passing employee/company id to portal
app.factory('passID', function(){
  var user = [];
  function set(user_info) {
    user = user_info;
  }
  function get() {
   return user;
  }

  return {
   set: set,
   get: get
  }
});
app.factory('passEmployees', function() {
 var employees = [];
 function set(employees_db) {
   employees = employees_db;
 }
 function get() {
  return employees;
 }

 return {
  set: set,
  get: get
 }
});

//borrowed from https://docs.angularjs.org/api/ng/directive/select
app.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return parseInt(val, 10);
      });
      ngModel.$formatters.push(function(val) {
        return '' + val;
      });
    }
  };
});
</script>
<script src="controllers/ctrl_company_register.js"></script>
<script src="controllers/ctrl_company_register_2.js"></script>
<script src="controllers/ctrl_company.js"></script>
<script src="controllers/ctrl_company_portal.js"></script>
<script src="controllers/ctrl_company_portal_challenges.js"></script>
<script src="controllers/ctrl_company_portal_challenges_weekly.js"></script>
<script src="controllers/ctrl_company_portal_challenges_longterm.js"></script>


<script src="controllers/ctrl_employees_register.js"></script>
<script src="controllers/ctrl_employees_register_2.js"></script>
<script src="controllers/ctrl_employees_register_3.js"></script>
<script src="controllers/ctrl_employees.js"></script>
<script src="controllers/ctrl_employees_portal_challenge.js"></script>
<script src="controllers/ctrl_employees_portal_home.js"></script>

</body>
</html>
