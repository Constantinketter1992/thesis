<!-- <button><a href="#!company/login">login company</a></button>
<button><a href="#!company/register">register company</a></button> -->
<style>
  .employees::before{
    opacity: 0.15;
  }
</style>
<div class="employees" style="padding-top: 5px;" id="company">
  <!-- logo -->
  <div>
    <div class="logo_main">
      <img id="logo_img" src="img/logo.png" alt=""><span style="display: inline-block; color:#464a4c;"  id="logo_title">MyCorpHealth</span>
      <div id="subtitle">Health is Wealth</div>
    </div>
  </div>

  <form id="main" style="position: relative; top:10%;" class="formEmployees" name="c_login" novalidate>
    <div class="body">
      <!-- username -->
      <div class="input-group" ng-class="{'has-warning':(c_login.user.$invalid && showError),'has-success':(!c_login.user.$invalid && showError), 'has-danger': (validation && !c_login.$dirty)}">
        <span class="input-group-addon" ><i class="fa fa-user-circle-o"></i></span>
        <input autocomplete="off" ng-class="{'form-control-warning':(c_login.user.$invalid && showError),'form-control-success':(!c_login.user.$invalid && showError) , 'form-control-danger': (validation && !c_login.$dirty)}" class="form-control" placeholder="username" minlength="5" maxlength="15" ng-model="user" name="user" type="text" required validate-text>
      </div>

      <!-- validation username -->
      <div class="validation">
        <span ng-style="{color: (validation && !c_login.$dirty)? '#d9534f':'#f0ad4e'}" ng-show="showError && c_login.user.$invalid">
          <span ng-show="c_login.user.$error.required ">Username is required</span>
          <span ng-show="c_login.user.$error.minlength">Too short</span>
          <span ng-show="c_login.user.$error.validateText && !c_login.user.$error.required && !c_login.user.$error.minlength ">
            Your username must contain a numeric, uppercase and special character
          </span>
        </span>
      </div>

      <!-- password -->
        <div ng-class="{'has-warning':(c_login.password.$invalid && showError),'has-success':(!c_login.password.$invalid && showError), 'has-danger': (validation && !c_login.$dirty)}" style="padding-top:10px;" class="input-group">
          <span class="input-group-addon" ><i class="fa fa-key"></i></span>
          <input class="form-control" ng-class="{'form-control-warning':(c_login.password.$invalid && showError),'form-control-success':(!c_login.password.$invalid && showError), 'form-control-danger': (validation && !c_login.$dirty)}" placeholder="password" name="password" ng-model="password" type="password" minlength="5" maxlength="15" validate-text required>
        </div>
        <!-- validation -->
        <div class="validation">
          <span ng-style="{color: (validation && !c_login.$dirty)? '#d9534f':'#f0ad4e'}" ng-show="showError && c_login.password.$invalid">
            <span ng-show="c_login.password.$error.required ">Password is required</span>
            <span ng-show="c_login.password.$error.minlength">Too short</span>
            <span ng-show="c_login.password.$error.validateText && !c_login.password.$error.required && !c_login.password.$error.minlength ">
                Your password must contain a numeric, uppercase and special character
            </span>
          </span>
        </div>

        <!-- wrong username/password label -->
        <div class="validation">
          <span style="color: #d9534f" ng-show="validation && !c_login.$dirty">Invalid username or password</span>
        </div>

        <!-- login/register buttons -->
        <div style="margin-top: 10px;">
          <button style="float: left; background-color: #c7d92d; color:#464a4c;" class="btn" go-click="/company/register" type="button">Register</button>
          <button style="float: right; background-color: #42ac47; color:white;" class="btn" ng-click="submit(c_login.$valid)" type="button">Login</button>
        </div>
    </div>
  </form>

  <!-- image instructions -->
  <!-- <div style="text-align:center; margin-top: 200px; padding: 20px;"> -->
  <div id="instructions">
    <!-- <div id="a" style="display: inline-block; width: 35vw; height: 600px;
    background-size: cover;"> -->
      <img src="company.gif"  alt="">
    <!-- </div> -->
  </div>
</div>
