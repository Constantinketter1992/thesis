
<div class="background_employees" id="employees_portal_home">

  <!-- logo -->
  <div class="align-self-center" id="logo">
    <img id="logo_img" src="img/logo.png" alt=""><span class="align-self-center" id="logo_title">MyCorpHealth</span>
  </div>

  <!-- weekly challenge page button -->
  <div id="home">
    <!-- <a href=""><img src="logout.gif" height='40px' alt=""></a> -->
    <a ng-click="weeklyChallengePage()"  href="">
    <!-- icon from http://www.freeiconspng.com/img/12918-->
    <img src="img/button_challenges.gif" height='55px' alt=""></a>
  </div>

  <!-- title -->
  <div id="title">PORTAL</div>

  <!-- LEVEL XP progress bar -->
  <div id="level">
    <div id="level_container">
      <!-- heart image acquired from http://pngimages.net/ekg-png-image-13 -->
      <div id="levelProgressBar" class="progress" ng-style="{backgroundColor: '#E1E1E2'}">
        <div ng-style="{backgroundColor: '#93c7bc', 'width': (stats.xp/xp_required*100 | number:1)+'%'}" class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100">{{stats.xp/xp_required*100 | number:1}}%
        </div>
      </div>
      <div id="level_text_container">
        <h id="level_text2">{{stats.level}}</h>
        <h id="level_text"><strong>XP:</strong> {{stats.xp | number: 0}}/{{xp_required| number: 0}}</h>
      </div>
    </div>
  </div>

  <!-- popupbox -->
  <div style="visibility: hidden" id="popup">
    <div style="border-color:#93c7bc; color:#93c7bc;" id="popup_container">
      <span style="white-space: pre;" id="popup_title">{{popup_title}}</span><br>
      <span style="white-space: pre;" id="popup_text">{{popup_text}}</span><br>
      <img style="display: none; height: 100px;" src="" alt="">
    </div>
  </div>



  <!-- body -->
  <div class="items flex-container">


    <!-- steps -->
    <div class="item justify-content-center">
      <div class="card" id="history">
        <h3>My Steps</h3>
        <div id="h_content">
          <div id="left">
            <p><strong>Total: </strong>{{stats.total | number:fractionSize}}</p>
            <p><strong>Today: </strong>{{steps_today | number:fractionSize}}</p>
          </div>
          <!-- badges -->
          <div id="right">
            <p ng-if="WeeklyChallenge"><strong>Week: </strong>{{steps_week_total | number:fractionSize}}</p>
          </div>
        </div>
        <div style="font-family: sassoon; margin-bottom:0;" class="form-group">
          <label>Past:</label>
          <input type="radio" value="week" ng-model="graph.type" ng-change="changeGraph('week')" >  week
          <input type="radio" value="month" ng-model="graph.type" ng-change="changeGraph('month')">  month
          <label style="margin-left: 2rem !important;" class="custom-control custom-checkbox">
            <span class="custom-control-description">Compare with colleagues</span>
            <input ng-change="changeGraph()" ng-model="compare" type="checkbox" class="custom-control-input">
            <span class="custom-control-indicator"></span>
          </label>
        </div>
        <!-- <div style="font-family: sassoon; font-size: 18px;">
          <span ng-if="graph.type == 'week'">
            Steps per day last week
          </span>
          <span ng-if="graph.type == 'month'">
            Steps per day last month
          </span>
          <!-- <span ng-if="compare"> (compared to others)</span> -->
        <!-- </div> -->

        <!-- graph -->
        <!-- from https://github.com/jettro/c3-angular-directive -->
        <div style="height: 40vh; position:relative; width: 100%;">
          <canvas id="line" class="chart chart-line" chart-data="data"
            chart-labels="labels" chart-series="series" chart-options="options"
            chart-dataset-override="datasetOverride" chart-click="onClick">
          </canvas>
        </div>
      </div>
    </div>

    <!-- rank -->
    <div class="item justify-content-center">
      <div class="card l_container" id="ranking">
        <h3>Rankings</h3>
        <div style="font-family: sassoon; margin-bottom:0;" class="form-group">
          <label>Order by:</label>
          <input type="radio" value="-level" ng-model="order.type" >  level
          <input type="radio" value="-total" ng-model="order.type">  steps
          <input type="radio" value="-sum" ng-model="order.type">  badges
        </div>
        <div id="rank_body">
          <table class="table table-hover table-striped table-responsive">
            <thead>
              <th>rank</th>
              <th>player</th>
              <th>level</th>
              <th>steps</th>
              <th>badges</th>
            </thead>
            <tbody >
              <tr ng-style="{backgroundColor: person.id == employee_id ? '#93c7bc' : '', color: person.id == employee_id ? 'white' : 'black'}" ng-repeat="person in employees | orderBy: order.type">
                <td>{{$index+1}}</td>
                <td>{{person.name}}</td>
                <td>{{person.level}}</td>
                <td>{{person.total | number:fractionSize}}</td>
                <td>{{person.sum}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- badges -->
    <div class="item justify-content-center">
      <div class="card" id="badges">
        <h3>My Badges</h3>
        <!-- ng-if="stats.champion != 0" -->
        <div class="badges justify-content-around">
          <div class="badge">
            <img class="badge_image" src="img/champion.gif" alt="">
            <!-- <svg id="circle" height="30" width="40">
              <circle cx="15" cy="15" r="14" stroke="black" stroke-width="2" fill="red" />
            </svg> -->
            <h2>
              {{stats.champion}}
            </h2>
          </div>

          <div class="badge">
            <img class="badge_image" src="img/elite.gif" alt="">
            <h2 class="badge_number">
              {{stats.elite}}
            </h2>
          </div>
          <!-- <div class="right">
            x {{stats.elite}}
          </div> -->


          <div class="badge">
            <img class="badge_image" src="img/warriors.gif" alt="">
            <h2 class="badge_number">
              {{stats.warriors}}
            </h2>
          </div>
          <!-- <div class="right">
            x {{stats.warriors}}
          </div> -->

          <div class="badge">
            <img class="badge_image" src="img/league.gif" alt="">
            <h2 class="badge_number">
              {{stats.league}}
            </h2>
          </div>
          <!-- <div class="right">
            x {{stats.league}}
          </div> -->

          <div class="badge">
            <img class="badge_image" src="img/alliance.gif" alt="">
            <h2 class="badge_number">
              {{stats.alliance}}
            </h2>
          </div>
        </div>

          <!-- <div class="right">
            x {{stats.alliance}}
          </div> -->

      </div>
    </div>

    <!-- long term challenges -->
    <div class="item justify-content-center">
      <div class="card l_container" id="longterm_challenges">
        <h3>longterm Challenges</h3>
        <div id="lc_body">
          <table class="table table-hover table-striped">
            <thead>
              <th>#</th>
              <th>objective</th>
              <th>reward</th>
              <th>completed</th>
            </thead>
            <tbody >
              <tr ng-repeat="challenge in challenges">
                <td>
                  {{$index}}
                </td>
                <td style="padding: 6px;">
                  <!-- champion -->
                  <div class="objectives" ng-if="challenge.champion !== null">
                    <img class="badge_image" src="img/champion.gif" alt="">
                    <h2>
                      {{challenge.champion}}
                    </h2>
                  </div>
                  <!-- elite -->
                  <div class="objectives" ng-if="challenge.elite !== null">
                    <img class="badge_image" src="img/elite.gif" alt="">
                    <h2>
                      {{challenge.elite}}
                    </h2>
                  </div>
                  <!-- warriors -->
                  <div class="objectives" ng-if="challenge.warriors !== null">
                    <img class="badge_image" src="img/warriors.gif" alt="">
                    <h2>
                      {{challenge.warriors}}
                    </h2>
                  </div>
                  <!-- league -->
                  <div class="objectives" ng-if="challenge.league !== null">
                    <img class="badge_image" src="img/league.gif" alt="">
                    <h2>
                      {{challenge.league}}
                    </h2>
                  </div>
                  <!-- alliance -->
                  <div class="objectives" ng-if="challenge.alliance !== null">
                    <img class="badge_image" src="img/alliance.gif" alt="">
                    <h2>
                      {{challenge.alliance}}
                    </h2>
                  </div>
                  <!-- level -->
                  <div style="padding: 1px;" class="objectives" ng-if="challenge.level !== null">
                    <img class="badge_image" src="img/heart.gif" alt="">
                    <h2 id="level">
                      {{challenge.level}}
                    </h2>
                  </div>
                </td>
                <td>
                  {{challenge.type}}: {{challenge.details}}
                </td>
                <td ng-if="challenge.complete">
                  yes
                </td>
                <td ng-if="!challenge.complete">
                  no
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <!-- end of body -->
  </div>

  <!-- logout button -->
  <div id="logout" style="height: 45px; vertical-align: middle;">
    <a href="" ng-click="logout()">
    <div style="float:left; height: 45px; ">
      <img src="logout.gif" height='45px' width='30px' alt="">
    </div>
    <h style="margin-left: 2px; font-size: 14px; line-height: 45px; "> Logout</h></a>
  </div>

</div>
