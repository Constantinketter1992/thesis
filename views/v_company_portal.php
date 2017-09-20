<style>
  .employees::before{
    opacity: 0.15;

  }
</style>

<div class="employees" id="company_portal">
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
              <a ng-click="logout()" class="nav-link" href="#!company">Logout: {{name}}</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <!-- title -->
  <!-- <div id="title" style="font-family: sassoon;">GateWay
    <div style="color: #868383; margin-top: -12px; font-size: 22px;">{{name}}</div>
  </div> -->
  <div id="title" style="font-family: sassoon;">Health Management
    <div style="color: #868383; margin-top: -12px; font-size: 22px;">{{name}}</div>
  </div>

  <!-- body -->
  <div style="margin-top: -10px;" class="items flex-container">
    <!-- <div class="company_item item_1">
      <div class="card itemContainer">
        <h1>Company Information</h1>
        <div>Company name: {{name}}</div>
        <div>Employees Registered: {{employeesRegistered}}%</div>
      </div>
    </div> -->


    <!-- graph -->
    <div class="company_item item_2">
      <div class="card itemContainer">
        <h1>Physical Activity Levels</h1>
        <!-- graph controllers -->
        <div ng-if="noSteps" style="font-family: sassoon; margin-top: 10px; margin-bottom:0;" class="form-group">
          <label>Past:</label>
          <input type="radio" value="week" ng-model="graph.type" ng-change="changeGraph()">  week
          <input type="radio" value="month" ng-model="graph.type" ng-change="changeGraph()">  month
          <input type="radio" value="three_months" ng-model="graph.type" ng-change="changeGraph()">  3 months
          <!-- <label style="margin-left: 15px;" class="custom-control custom-checkbox">
            <span class="custom-control-description">Compare with the Average</span>
            <input ng-model="compare" ng-change="changeGraph()" type="checkbox" class="custom-control-input">
            <span class="custom-control-indicator"></span>
          </label> -->
        </div>
        <div ng-if="noSteps" style="color: #696969; font-size: 18px; margin: 2px 0 5px 0;">
          <span ng-if="graph.type == 'week'">Average # of steps per day this week</span>
          <span ng-if="graph.type == 'month'">Average # of steps per day this month</span>
          <span ng-if="graph.type == 'three_months'">Average # of steps per week in the last 3 months</span>
        </div>
        <!-- graph -->
        <!-- from https://github.com/jettro/c3-angular-directive -->
        <div ng-if="noSteps" style="height: 50vh; position:relative; width: 100%;">
          <canvas chart-colors="colors" id="line" class="chart chart-line" chart-data="data"
            chart-labels="labels" chart-series="series" chart-options="options"
            chart-dataset-override="datasetOverride" chart-click="onClick">
          </canvas>
        </div>
        <div ng-if="!noSteps">
          - Employees have not yet registered or taken any steps
          <div>
            <button style="margin: 5px; background-color: #c7d92d; color:#464a4c;" class="btn" go-click="/company/portal/challenges/">Create Challenge</button>
          </div>
        </div>
      </div>
    </div>

    <!-- table -->
    <div class="company_item item_1">
      <div class="card itemContainer company_table">
        <h1>Statistics</h1>
        <!-- <div>Employees Registered: {{employeesRegistered}}%</div> -->
        <div style="font-family: sassoon; margin-bottom: 2px;" class="form-group">
          <label style="margin-right: 5px;">Order by:</label>
          <input type="radio" value="-total" ng-model="order.type" >  steps
          <input type="radio" value="-league" ng-model="order.type" >  individual objectives
          <input type="radio" value="-alliance" ng-model="order.type">  team objectives
          <input type="radio" value="-sum" ng-model="order.type">  total awards
        </div>
        <table class="table table-hover table-striped portal">
          <thead>
            <th>rnk</th>
            <th>name</th>
            <th>Total Steps</th>
            <th>Ind. Objectives</th>
            <th>Team Objectives</th>
            <th>Total Awards</th>
          </thead>
          <tbody >
            <tr ng-repeat="person in employees | orderBy: order.type">
              <td>{{$index+1}}</td>
              <td><span ng-if="person.name ==''">{{person.email}} - not registered</span>{{person.name}}</td>
              <td>{{person.total| number:fractionSize}}</td>
              <td>{{person.league}}</td>
              <td>{{person.alliance}}</td>
              <td>{{person.sum}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


</div>


<!-- <button go-click="/company/portal/challenges">challenges</button> -->
