<style>
  .employees::before{
    opacity: 0.15;
  }
</style>

<div class="employees" id="company_portal" style="text-align:center; margin-bottom: 20px;">
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
  <div id="title" style="font-family: sassoon; font-size: 30px; margin-top: 20px;">Weekly Challenge</div>

  <!-- body -->
  <div style="text-align:left; display: inline-block; margin-top: 10px;">
    <form class="formChallenges createWeekly" name="WeeklyChallenge">
      <!-- # of teams -->
      <div class="weeklyChallenge">
        # of teams:
        <select class="custom-select" name="singleSelect" ng-model="groupNumber" ng-change="calculateSteps()" convert-to-number>
            <option value="2">2</option>
            <option value="4">4</option>
        </select>
      </div>

      <!-- # of team steps -->
      <div class="weeklyChallenge">
        Team Objective:
        <select class="custom-select selectText" name="stepsPerGroup" ng-model="stepsPerGroup" convert-to-number>
            <option ng-repeat="steps in stepsOptions" value="{{steps.g_value}}">{{steps.g_value | number:0}} steps ({{steps.text | number:0}}/day/person)</option>
        </select>
      </div>

      <!-- # of ind steps -->
      <div class="weeklyChallenge">
        Individual Objective:
        <select class="custom-select selectText" name="stepsPerPerson" ng-model="stepsPerPerson" convert-to-number>
            <option ng-repeat="steps in stepsOptions" value="{{steps.i_value}}">{{steps.i_value | number:0}} steps ({{steps.text | number:0}}/day)</option>
        </select>
      </div>

      <!-- table of rewards -->
      <div class="company_table">
        <table class="table table-hover table-striped">
          <thead>
            <th>Type</th>
            <th>Reward</th>
          </thead>
          <tbody>
            <!-- team objective -->
            <tr>
              <th>Team Objective</th>
              <th>
                <select class="custom-select selectText" ng-change="determineAwardType(0, awards[0].type)" name="awardGQ" ng-model="awards[0].type">
                    <option ng-repeat="award in awardList" value="{{award}}">{{award}}</option>
                </select>
                <div style="margin-top: 3px;" class="input-group" ng-if="selected[0]">
                  <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
                  <textarea rows="2" class="form-control" placeholder="details" ng-model="awards[0].text" type="text"></textarea>
                </div>

              </th>
            </tr>
            <!-- team winner -->
            <tr>
              <th>Team Winner</th>
              <th>
                <select class="custom-select selectText" ng-change="determineAwardType(1, awards[1].type)" name="awardGC" ng-model="awards[1].type">
                    <option ng-repeat="award in awardList" value="{{award}}">{{award}}</option>
                </select>
                <div style="margin-top: 3px;" class="input-group" ng-if="selected[1]">
                  <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
                  <textarea rows="2" class="form-control" placeholder="details" ng-model="awards[1].text" type="text"></textarea>
                </div>
              </th>
            </tr>
            <tr>
              <th>Individual Objective</th>
              <th>
                <select class="custom-select selectText" ng-change="determineAwardType(2, awards[2].type)" name="awardIQ" ng-model="awards[2].type">
                    <option ng-repeat="award in awardList" value="{{award}}">{{award}}</option>
                </select>
                <div style="margin-top: 3px;" class="input-group" ng-if="selected[2]">
                  <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
                  <textarea rows="2" class="form-control" placeholder="details" ng-model="awards[2].text" type="text"></textarea>
                </div>
              </th>
            </tr>
            <tr>
              <th>Individual Elite Group</th>
              <th>
                <select class="custom-select selectText" name="cutoff" ng-model="awards[3].cutoff" convert-to-number>
                    <option ng-repeat="cutoff in cutoffOptions" value="{{cutoff}}">top {{cutoff}}</option>
                </select>
                <select class="custom-select selectText" ng-change="determineAwardType(3, awards[3].type)" name="awardIC" ng-model="awards[3].type">
                    <option ng-repeat="award in awardList" value="{{award}}">{{award}}</option>
                </select>
                <div style="margin-top: 3px;" class="input-group" ng-if="selected[3]">
                  <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
                  <textarea rows="2" class="form-control" placeholder="details" ng-model="awards[3].text" type="text"></textarea>
                </div>
              </th>
            </tr>
            <tr>
              <th>Individual Winner</th>
              <th>
                <select class="custom-select selectText" ng-change="determineAwardType(4, awards[4].type)" name="awards[4].type" ng-model="awards[4].type">
                    <option ng-repeat="award in awardList" value="{{award}}">{{award}}</option>
                </select>
                <div style="margin-top: 3px;" class="input-group" ng-if="selected[4]">
                  <span class="input-group-addon" ><i class="fa fa-gift"></i></span>
                  <textarea rows="2" class="form-control" placeholder="details" ng-model="awards[4].text" type="text"></textarea>
                </div>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- submit button -->
      <div style="margin: 10px;">
        <button ng-click="submitChallenge()" go-click="/company/portal/challenges"
        style=" background-color: #42ac47; color:white;" class="btn">submit challenge</button>
      </div>

    </form>
  </div>
</div>
