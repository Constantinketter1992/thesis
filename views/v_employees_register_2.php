<style>
  .employees::before{
    opacity: 0.1;
  }
</style>


<div class="employees">
  <!-- logo -->
  <div>
    <div class="align-self-center logo_main">
      <img id="logo_img" src="img/logo.png" alt=""><span style="display: inline-block; color:#464a4c;" class="align-self-center" id="logo_title">MyCorpHealth</span>
      <div id="subtitle">Health made fun</div>
    </div>
  </div>

  <!-- form -->
  <form name="e_register" class="formEmployees" novalidate autocomplete="off" style="top: 20%;">
    <div class="body">
      <!-- instructions -->
      <div class="register_title">Registration</div>
      <div style="margin-top: 4px; margin-bottom: 10px; line-height: 23px;" class="register_steps"><span >Step 2:</span> enter account information</div>

      <!-- name -->
      <div class="input-group" ng-class="{'has-warning':(e_register.name.$invalid && e_register.name.$touched),'has-success':(e_register.name.$valid && e_register.name.$touched)}">
        <span class="input-group-addon" ><i class="fa fa-user-circle-o"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(e_register.name.$invalid && e_register.name.$touched),'form-control-success':(e_register.name.$valid && e_register.name.$touched)}" placeholder="name" type="text" name="name" ng-model="name" required>
      </div>

      <!-- validation name -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="e_register.name.$touched && e_register.name.$invalid">
          <span ng-show="e_register.name.$error.required">name is required.</span>
        </span>
      </div>

      <!-- username -->
      <div class="input-group" ng-class="{'has-warning':(e_register.user.$invalid && e_register.user.$touched),'has-success':(e_register.user.$valid && e_register.user.$touched), 'has-danger': (user_status)}" style="margin-top: 10px;">
        <span class="input-group-addon" ><i class="fa fa-user-circle-o"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(e_register.user.$invalid && e_register.user.$touched),'form-control-success':(e_register.user.$valid && e_register.user.$touched),
      'form-control-danger' : (user_status)}" placeholder="username" name="user" ng-model="user" minlength="5" maxlength="15" required ng-keyup='checkUsername(e_register.user.$valid)' validate-text>
      </div>
      <!-- username validation -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="(e_register.user.$touched && e_register.user.$invalid) || user_status">
          <span ng-show="e_register.user.$error.required">Username is required.</span>
          <span ng-show="e_register.user.$error.minlength">Too short</span>
          <span ng-show="e_register.user.$error.validateText && !e_register.user.$error.required && !e_register.user.$error.minlength">
              Your username must contain a numeric, uppercase, lowercase, and special character
          </span>
          <span style="color:#d9534f;" ng-if="user_status">Already taken</span>
        </span>
      </div>

      <!-- password -->
      <div class="input-group" ng-class="{'has-warning':(e_register.password.$invalid && e_register.password.$touched),'has-success':(e_register.password.$valid && e_register.password.$touched)}" style="margin-top: 10px;">
        <span class="input-group-addon" ><i class="fa fa-key"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(e_register.password.$invalid && e_register.password.$touched),'form-control-success':(e_register.password.$valid && e_register.password.$touched)}" placeholder="password" name="password" validate-text minlength="5" maxlength="15" type="password" ng-model="value1" equals="{{value2}}" required>
      </div>

      <!-- validation -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="e_register.password.$touched && e_register.password.$invalid">
          <span ng-show="e_register.password.$error.required">password is required.</span>
          <span ng-show="e_register.password.$error.minlength">Too short</span>
          <span ng-show="e_register.password.$error.validateText && !e_register.password.$error.required && !e_register.password.$error.minlength ">
              Your password must contain a numeric, uppercase, lowercase, and special character
          </span>
        </span>
      </div>


      <!-- password validation -->
    <div style="margin-top: 10px;" class="input-group" ng-class="{'has-warning': (e_register.password.$error.equals && e_register.password_check.$touched),'has-success': (!e_register.password.$error.equals && e_register.password_check.$touched)}">
        <span class="input-group-addon" ><i class="fa fa-key"></i></span>
        <input class="form-control" ng-class="{
      'form-control-warning' : (e_register.password.$error.equals && e_register.password_check.$touched), 'form-control-success': (!e_register.password.$error.equals && e_register.password_check.$touched)}" placeholder="confirm password" name="password_check" type="password" ng-model="value2" equals="{{value1}}" required>
      </div>
      <div class="validation">
        <span style="color:#f0ad4e;" ng-if="e_register.password.$error.equals">Passwords don't match</span>
      </div>


      <!-- reset/submit buttons -->
      <div style="margin-top: 10px;">
        <button style="float: left; background-color: #c7d92d; color:#464a4c;" class="btn" type="button" ng-click="reset()" value="Reset">Reset</button>
        <button style="float: right; background-color: #42ac47; color:white;" class="btn" ng-click="submit(e_login.$valid)" type="button" ng-click="submit()"
        ng-disabled="e_register.user.$pristine || e_register.user.$invalid || e_register.name.$pristine || e_register.name.$invalid || user_status || e_register.password.$pristine || e_register.password.$invalid || e_register.password.$error.equals || e_register.password_check.$invalid">Submit</button>
      </div>
    </div>

  </form>

  <!-- bullet list of description -->
  <div style="text-align:center; position:absolute; top: 75%; left: 0; right:0">

    <div><i class="arrow fa fa-arrow-right"> <span>Connect your Fitness Tracker</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Compete in fun challenges with your colleagues</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn Badges, XP, and Level Up</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn prizes set by your employer</span></i></div>
  </div>
</div>
