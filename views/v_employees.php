
  <!-- <button><a href="#!employees/register">register employees</a></button> -->
  <!-- <button><a href="#!company/login">login company</a></button> -->
<div class="employees">
  <!-- logo -->
  <div >
    <div class="align-self-center logo_main">
      <img id="logo_img" src="img/logo.png" alt=""><span style="display: inline-block; color:#464a4c;" class="align-self-center" id="logo_title">MyCorpHealth</span>
      <div id="subtitle">Health made fun</div>
    </div>

  </div>
  <!-- <div style="font-family: sassoon; font-size: 60px;" id="title">MyCorpHealth</div> -->
  <form name="e_login" class="formEmployees" novalidate>
    <div class="body">
      <img src="badges.gif" width=300px alt="">
      <!-- username -->
      <div ng-class="{'has-warning':(e_login.user.$invalid && showError),'has-success':(!e_login.user.$invalid && showError), 'has-danger': (validation && !e_login.$dirty)}" class="input-group">
        <span class="input-group-addon" ><i class="fa fa-user-circle-o"></i></span>
        <input autocomplete="off" ng-class="{'form-control-warning':(e_login.user.$invalid && showError),'form-control-success':(!e_login.user.$invalid && showError) , 'form-control-danger': (validation && !e_login.$dirty)}" class="form-control" placeholder="username" minlength="5" maxlength="15" ng-model="user" name="user" type="text" required validate-text>
        <!-- <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div> -->
      </div>

      <!-- validation -->
      <div class="validation">
        <span ng-style="{color: (validation && !e_login.$dirty)? '#d9534f':'#f0ad4e'}" ng-show="showError && e_login.user.$invalid">
          <span ng-show="e_login.user.$error.required ">Username is required</span>
          <span ng-show="e_login.user.$error.minlength">Too short</span>
          <span ng-show="e_login.user.$error.validateText && !e_login.user.$error.required && !e_login.user.$error.minlength ">
            Your username must contain a numeric, uppercase and special character
          </span>
        </span>
      </div>

      <!-- password -->
        <div ng-class="{'has-warning':(e_login.password.$invalid && showError),'has-success':(!e_login.password.$invalid && showError), 'has-danger': (validation && !e_login.$dirty)}" style="padding-top:10px;" class="input-group">
          <span class="input-group-addon" ><i class="fa fa-key"></i></span>
          <input class="form-control" ng-class="{'form-control-warning':(e_login.password.$invalid && showError),'form-control-success':(!e_login.password.$invalid && showError), 'form-control-danger': (validation && !e_login.$dirty)}" placeholder="password" name="password" ng-model="password" type="password" minlength="5" maxlength="15" validate-text required>
        </div>
        <!-- validation -->
        <div class="validation">
          <span ng-style="{color: (validation && !e_login.$dirty)? '#d9534f':'#f0ad4e'}" ng-show="showError && e_login.password.$invalid">
            <span ng-show="e_login.password.$error.required ">Password is required</span>
            <span ng-show="e_login.password.$error.minlength">Too short</span>
            <span ng-show="e_login.password.$error.validateText && !e_login.password.$error.required && !e_login.password.$error.minlength ">
                Your password must contain a numeric, uppercase and special character
            </span>
          </span>
        </div>

        <!-- wrong username/password label -->
        <div class="validation">
          <span style="color: #d9534f" ng-show="validation && !e_login.$dirty">Invalid username or password</span>
        </div>

        <!-- login/register buttons -->
        <div style="margin-top: 10px;">
          <button style="float: left; background-color: #c7d92d; color:#464a4c;" class="btn" go-click="/employees/register" type="button">Register</button>
          <button style="float: right; background-color: #42ac47; color:white;" class="btn" ng-click="submit(e_login.$valid)" type="button">Login</button>
        </div>

    </div>

  </form>

  <!-- bullet list of description -->
  <div style="text-align:center; position:absolute; top: 70%; left: 0; right:0">

    <div><i class="arrow fa fa-arrow-right"> <span>Connect your Fitness Tracker</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Compete in fun challenges with your colleagues</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn Badges, XP, and Level Up</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn prizes set by your employer</span></i></div>
  </div>
</div>
