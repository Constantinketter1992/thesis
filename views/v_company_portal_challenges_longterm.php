<style>
  .employees::before{
    opacity: 0.15;
  }
</style>

<div class="employees" id="company_portal" style="text-align:center;">
  <!-- navigation -->
  <div style="text-align: center; padding-top:5px;">
    <div class="align-self-center justify-content-center nav_container" >
      <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-sm">
        <!-- Navbar content -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a style="float: left;"class="navbar-brand" href="#"><img height=50px src="r.gif" alt="">
          <span style="padding-top: 10px; font-family:sassoon; color: rgb(229, 232, 227);">MyCorpHealth</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#!company/portal">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Challenges
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#!company/portal/challenges">View Challenges</a>
                <a class="dropdown-item" href="#!company/portal/challenges/weekly">Create Weekly Challenge</a>
                <a class="dropdown-item" href="#!company/portal/challenges/longterm">Create Longterm Challenge</a>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a ng-click="logout()" class="nav-link" href="#!company">Logout: Fiat Chrysler</a>
            </li> -->
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a ng-click="logout()" class="nav-link" href="#!company">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <!-- title -->
  <div id="title" style="font-family: sassoon; font-size: 30px; margin-top: 20px;">Longterm Challenge</div>

  <!-- body -->
  <div style="text-align:left; display: inline-block; margin-top: 10px;">
    <!-- contingencies -->
    <div>
      Choose your contingencies:
      <!-- levels -->
      <label style="margin-right: .3rem !important;" class="custom-control custom-checkbox">
        <input ng-change="reset('levels')" ng-model="Levels" type="checkbox" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Levels</span>
      </label>
      <!-- awards -->
      <label class="custom-control custom-checkbox">
        <input ng-change="reset('awards')" ng-model="awards" type="checkbox" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Awards</span>
      </label>
    </div>

    <!-- level -->
    <div style="margin-bottom: 5px;" ng-if="Levels">
      Level:
      <select class="custom-select" ng-init="object.level = levels[0]" ng-model="object.level" ng-options="level for level in levels"></select>
    </div>

    <!-- awards -->
    <div ng-show="awards">
      <!-- individual completion -->
      <div>
        <label class="custom-control custom-checkbox">
          <input ng-model="ic" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Individual Completion Awards</span>
        </label>
        <!-- select # -->
        <div ng-if="ic" style="margin-left: -15px; margin-right: 10px; display:inline-block; height: 20px;">
          <select class="custom-select" ng-init="object.n_p_completion = levels[0]" ng-model="object.n_p_completion" ng-options="level for level in levels">
          </select>
        </div>
      </div>

      <!-- individual cutoff -->
      <div>
        <label class="custom-control custom-checkbox">
          <input ng-model="c" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Individual Elite Group Awards</span>
        </label>
        <!-- select # -->
        <div ng-if="c" style="margin-left: -15px; margin-right: 10px; display:inline-block; height: 20px;">
          <select class="custom-select" ng-init="object.n_p_cutoff = levels[0]" ng-model="object.n_p_cutoff" ng-options="level for level in levels">
          </select>
        </div>
      </div>

      <!-- individual winner -->
      <div>
        <label class="custom-control custom-checkbox">
          <input ng-model="iw" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Individual Winner Awards</span>
        </label>
        <!-- select # -->
        <div ng-if="iw" style="margin-left: -15px; margin-right: 10px; display:inline-block; height: 20px;">
          <select class="custom-select" ng-init="object.n_p_winner = levels[0]" ng-model="object.n_p_winner" ng-options="level for level in levels">
          </select>
        </div>
      </div>

      <!-- team completion -->
      <div>
        <label class="custom-control custom-checkbox">
          <input ng-model="tc" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Team Completion Awards</span>
        </label>
        <!-- select # -->
        <div ng-if="tc" style="margin-left: -15px; margin-right: 10px; display:inline-block; height: 20px;">
          <select class="custom-select" ng-init="object.n_t_completion = levels[0]" ng-model="object.n_t_completion" ng-options="level for level in levels">
          </select>
        </div>
      </div>

      <!-- team winner -->
      <div>
        <label class="custom-control custom-checkbox">
          <input ng-model="tw" type="checkbox" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Team Winner Awards</span>
        </label>
        <!-- select # -->
        <div ng-if="tw" style="margin-left: -15px; margin-right: 10px; display:inline-block; height: 20px;">
          <select class="custom-select" ng-init="object.n_t_winner = levels[0]" ng-model="object.n_t_winner" ng-options="level for level in levels">
          </select>
        </div>
      </div>
    </div>

    <!-- rewards -->
    <div style="text-align:left;" class="formChallenges" ng-show="awards || Levels">
      Reward Type
      <select class="custom-select selectText" ng-change="resetDetails()" ng-init="object.awardType = awardList[0]" ng-model="object.awardType" ng-options="award for award in awardList"></select>
      <div class="input-group" ng-if="object.awardType !== 'none'">
        <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
        <textarea rows="2" class="form-control" placeholder="details" ng-model="object.awardDetails" type="text"></textarea>
      </div>
      <!-- submit button -->
      <div ng-if="object.awardType !== 'none'" style="margin-top: 10px; float: left;">
        <button style=" background-color: #42ac47; color:white;" class="btn" ng-click="submit()">submit</button>
      </div>
    </div>
  </div>
</div>
