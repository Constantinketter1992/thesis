<style>
  .employees::before{
    opacity: 0.1;
  }
</style>
<div class="employees">
  <!-- logo -->
  <div >
    <div class="align-self-center logo_main">
      <img id="logo_img" src="img/logo.png" alt=""><span style="display: inline-block; color:#464a4c;" class="align-self-center" id="logo_title">MyCorpHealth</span>
      <div id="subtitle">Health made fun</div>
    </div>
  </div>

  <form name="e_register" class="formEmployees" novalidate style="top: 20%;">

    <div class="body">
      <!-- instructions -->
      <!-- <i class="arrow fa fa-arrow-right" style="color: #42ac47; font-size: 18px;"></i> -->
      <div class="register_title">Registration</div>
      <div style="margin-top: 4px; margin-bottom: 10px; line-height: 25px;" class="register_steps"><span> Step 1:</span> enter your access token provided by your employer</div>

      <!-- access token -->
      <div class="input-group" ng-class="{'has-warning':(e_register.token.$invalid && showError),'has-success':(!e_register.token.$invalid && showError), 'has-danger': (validation && !e_register.$dirty)}">
        <span class="input-group-addon" ><i class="fa fa-key"></i></span>
        <input class="form-control" ng-class="{'form-control-warning':(e_register.token.$invalid && showError),'form-control-success':(!e_register.token.$invalid && showError), 'form-control-danger': (validation && !e_register.$dirty)}" minlength="7" maxlength="15" placeholder="Access Token" ng-model="token" name="token" type="text" required>
        <button class="btn" style="width: 60px; padding: 5px; background-color: #42ac47; border-left: none; border-top-left-radius: 0; border-bottom-left-radius: 0; border-color: #38923c; color:white;" ng-click="submit(e_register.$valid)" type="submit">Submit</button>
      </div>
      <!-- validation -->
      <div class="validation">
        <span ng-style="{color: (validation && !e_register.$dirty)? '#d9534f':'#f0ad4e'}" style="color:red" ng-show="showError && e_register.token.$invalid">
          <span ng-show="e_register.token.$error.required ">Access Token is required</span>
          <span ng-show="e_register.token.$error.minlength">Too short</span>
        </span>
      </div>
      <div class="validation">
        <span style="color: #d9534f" ng-show="validation && !e_register.$dirty">Invalid access token</span>
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
