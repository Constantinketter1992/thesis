<style>
  .employees::before{
    opacity: 0.15;
  }
</style>
<div class="employees" id="company">
  <!-- logo -->
  <div>
    <div class="align-self-center logo_main">
      <img id="logo_img" src="img/logo.png" alt=""><span style="display: inline-block; color:#464a4c;" class="align-self-center" id="logo_title">MyCorpHealth</span>
      <div id="subtitle">Health is Wealth</div>
    </div>
  </div>

  <form style="top: 18%;" name="myForm" class="formEmployees" novalidate autocomplete="off">
    <div class="body">
      <!-- instructions -->
      <div class="register_title">Registration</div>
      <div style="margin-top: 4px; margin-bottom: 10px; line-height: 23px;" class="register_steps"><span >Step 1:</span> enter account information</div>

      <!-- email -->
      <div class="input-group" ng-class="{'has-warning':(myForm.email.$invalid && myForm.email.$touched),'has-success':(myForm.email.$valid && myForm.email.$touched), 'has-danger': (email_status)}">
        <span class="input-group-addon" ><i class="fa fa-envelope"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(myForm.email.$invalid && myForm.email.$touched),'form-control-success':(myForm.email.$valid && myForm.email.$touched),
      'form-control-danger' : (email_status)}" placeholder="email" type="email" name="email" ng-model="email" required ng-keyup='checkEmail(myForm.email.$valid)'>
      </div>

      <!-- validation email -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="myForm.email.$touched && myForm.email.$invalid">
          <span ng-show="myForm.email.$error.required">Email is required.</span>
          <span ng-show="myForm.email.$error.email">Invalid email address.</span>
        </span>
      </div>
      <!-- email unique? -->
      <div class="validation">
        <span style="color:#d9534f;" ng-if="email_status">Already taken</span>
      </div>

      <!-- company -->
      <div style="margin-top: 10px;" class="input-group" ng-class="{'has-warning':(myForm.company.$invalid && myForm.company.$touched),'has-success':(myForm.company.$valid && myForm.company.$touched)}">
        <span class="input-group-addon" ><i class="fa fa-building"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(myForm.company.$invalid && myForm.company.$touched),'form-control-success':(myForm.company.$valid && myForm.company.$touched)}" placeholder="company" type="text" name="company" ng-model="company" required>
      </div>

      <!-- company validation -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="myForm.company.$touched && myForm.company.$invalid">
          <span ng-show="myForm.company.$error.required">company name is required.</span>
        </span>
      </div>

      <!-- username -->
      <div class="input-group" ng-class="{'has-warning':(myForm.user.$invalid && myForm.user.$touched),'has-success':(myForm.user.$valid && myForm.user.$touched), 'has-danger': (user_status)}" style="margin-top: 10px;">
        <span class="input-group-addon" ><i class="fa fa-user-circle-o"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(myForm.user.$invalid && myForm.user.$touched),'form-control-success':(myForm.user.$valid && myForm.user.$touched),
      'form-control-danger' : (user_status)}" placeholder="username" type="text" name="user" ng-model="user" minlength="5" maxlength="15" required ng-keyup='checkUsername(myForm.user.$valid)' validate-text>
      </div>

      <!-- username validation -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="(myForm.user.$touched && myForm.user.$invalid) || user_status">
          <span ng-show="myForm.user.$error.required">Username is required</span>
          <span ng-show="myForm.user.$error.minlength">Too short</span>
          <span ng-show="myForm.user.$error.validateText && !myForm.user.$error.required && !myForm.user.$error.minlength">
              Your username must contain a numeric, uppercase, lowercase, and special character
          </span>
          <span style="color:#d9534f;" ng-if="user_status">Already taken</span>
        </span>
      </div>
      <!-- username unique? -->


      <!-- password -->
      <div class="input-group" ng-class="{'has-warning':(myForm.password.$invalid && myForm.password.$touched),'has-success':(myForm.password.$valid && myForm.password.$touched)}" style="margin-top: 10px;">
        <span class="input-group-addon" ><i class="fa fa-key"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(myForm.password.$invalid && myForm.password.$touched),'form-control-success':(myForm.password.$valid && myForm.password.$touched)}" placeholder="password" name="password" validate-text minlength="5" maxlength="15" type="password" ng-model="value1" equals="{{value2}}" required>
      </div>

      <!-- validation -->
      <div class="validation">
        <span style="color:#f0ad4e" ng-show="myForm.password.$touched && myForm.password.$invalid">
          <span ng-show="myForm.password.$error.required">password is required.</span>
          <span ng-show="myForm.password.$error.minlength">Too short</span>
          <span ng-show="myForm.password.$error.validateText && !myForm.password.$error.required && !myForm.password.$error.minlength ">
              Your password must contain a numeric, uppercase, lowercase, and special character
          </span>
        </span>
      </div>


      <!-- password validation -->
    <div style="margin-top: 10px;" class="input-group" ng-class="{'has-warning': (myForm.password.$error.equals && myForm.password_check.$touched),'has-success': (!myForm.password.$error.equals && myForm.password_check.$touched)}">
        <span class="input-group-addon" ><i class="fa fa-key"></i></span>
        <input class="form-control" ng-class="{
      'form-control-warning' : (myForm.password.$error.equals && myForm.password_check.$touched), 'form-control-success': (!myForm.password.$error.equals && myForm.password_check.$touched)}" placeholder="confirm password" name="password_check" type="password" ng-model="value2" equals="{{value1}}" required>
      </div>
      <div class="validation">
        <span style="color:#f0ad4e;" ng-if="myForm.password.$error.equals">Passwords don't match</span>
      </div>


      <!-- reset/submit buttons -->
      <div style="margin-top: 10px;">
        <button style="float: left; background-color: #c7d92d; color:#464a4c;" class="btn" type="button" ng-click="reset()" value="Reset">Reset</button>
        <button style="float: right; background-color: #42ac47; color:white;" class="btn" ng-click="submit(e_login.$valid)" type="button" ng-click="submit()"
        ng-disabled="myForm.user.$pristine || myForm.user.$invalid || myForm.company.$pristine || myForm.company.$invalid || user_status || myForm.password.$pristine || myForm.password.$invalid || myForm.password.$error.equals || myForm.password_check.$invalid">Submit</button>
      </div>





    </div>
  </form>
</div>







<!-- <form name="myForm" novalidate autocomplete="off">

  <p>Email:<br>
    <input type="email" name="email" ng-model="email" required ng-keyup='checkEmail(myForm.email.$valid)'>
    <span style="color:red" ng-show="myForm.email.$touched && myForm.email.$invalid">
    <span ng-show="myForm.email.$error.required">Email is required.</span>
    <span ng-show="myForm.email.$error.email">Invalid email address.</span>
    </span>
    <span style="color:red" ng-if="email_status">Already taken</span>
  </p>

  <p>Username:<br>
    <input type="text" name="user" ng-model="user" minlength="5" maxlength="15" required ng-keyup='checkUsername(myForm.user.$valid)' validate-text>
    <span style="color:red" ng-show="myForm.user.$touched && myForm.user.$invalid">
      <span ng-show="myForm.user.$error.required">Username is required.</span>
      <span ng-show="myForm.user.$error.minlength">Too short</span>
      <span ng-show="myForm.user.$error.validateText && !myForm.user.$error.required && !myForm.user.$error.minlength ">
          Your password must contain a numeric, uppercase and lowercase as well as special characters
      </span>
    </span>
    <span style="color:red" ng-if="user_status">Already taken</span>
  </p>

  <p>Company:<br>
    <input type="text" name="company" ng-model="company" required>
    <span style="color:red" ng-show="myForm.company.$touched && myForm.company.$invalid">
    <span ng-show="myForm.company.$error.required">Company name is required.</span>
    </span>
  </p>

  <p>Password:<br>
    <input name="password" validate-text minlength="5" maxlength="15" type="password" ng-model="value1" equals="{{value2}}" required>
    <span style="color:red" ng-show="myForm.password.$touched && myForm.password.$invalid">
      <span ng-show="myForm.password.$error.required">password is required.</span>
      <span ng-show="myForm.password.$error.minlength">Too short</span>
      <span ng-show="myForm.password.$error.validateText && !myForm.password.$error.required && !myForm.password.$error.minlength ">
          Your password must contain a numeric, uppercase and lowercase as well as special characters
      </span>
    </span>
    <input name="password_check" type="password" ng-model="value2" equals="{{value1}}" required>
    <span ng-if="myForm.password.$error.equals">not valid</span>
  </p>

  <p>
    <input type="submit" ng-click="submit()"
    ng-disabled="myForm.user.$pristine || myForm.user.$invalid ||
    myForm.email.$pristine || myForm.email.$invalid || myForm.company.$pristine || myForm.company.$invalid || email_status || user_status || myForm.password.$pristine || myForm.password.$invalid || myForm.password.$error.equals || myForm.password_check.$invalid">
    <input type="button" ng-click="reset()" value="Reset" >
  </p>

</form> -->
