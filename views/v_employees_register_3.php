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

  <div class="formEmployees" style="top: 20%;">
    <div class="body">
      <div class="register_title">Registration</div>
      <div class="register_steps"><span> Step 3:</span> Connect your Fitness Tracker</div>
      <!-- login/register buttons -->
      <div style="margin-top: 5px;">
        <button style="float: left; background-color: #42ac47; color:white;" class="btn" ng-click="submit(e_login.$valid)" type="button">Connect <i class="fa fa-plug" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- bullet list of description -->
  <div style="text-align:center; position:absolute; top: 70%; left: 0; right:0">

    <div><i class="arrow fa fa-arrow-right"> <span>Connect your Fitness Tracker</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Compete in fun challenges with your colleagues</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn Badges, XP, and Level Up</span></i></div>
    <div><i class="arrow fa fa-arrow-right"> <span>Earn prizes set by your employer</span></i></div>
  </div>
</div>
