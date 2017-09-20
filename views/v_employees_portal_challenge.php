<!-- <div id="fakeLoader"> -->

<div class="background_employees" id="employees_portal_challenge">

  <!-- logo -->
  <div class="align-self-center" id="logo">
    <img id="logo_img" src="img/logo.png" alt=""><span class="align-self-center" id="logo_title">MyCorpHealth</span>
  </div>

  <!-- home page button -->
  <div id="home">
    <a ng-click="reset()" go-click="/employees/portal/home" href="">
    <!-- icon from http://www.newdesignfile.com/post_house-icon-home-button_328320/ -->
    <img src="img/home.gif" height='55px' alt=""></a>
  </div>

  <!-- popupbox -->
  <div style="visibility: hidden" id="popup">
    <div id="popup_container">
      <span style="white-space: pre;" id="popup_title">{{popup_title}}</span><br>
      <span style="white-space: pre;" id="popup_text">{{popup_text}}</span><br>
      <img style="display: none; height: 100px;" src="" alt="">
    </div>
  </div>

  <!-- title -->
  <div id="title">WEEKLY CHALLENGE</div>

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



  <!-- row -->
  <div class="items flex-container">

    <!-- column: progressCircle -->
    <div class=" item align-self-center align-self-sm-start justify-content-center" id="progressCircle">
      <div id="p_container">
        <div id="p_text" class="table-responsive">
          <!-- <div id="target">
            <img src="img/target.png" alt="" id="target_img">
            <h id="target_text">{{challenge.steps_team | number: fractionSize}} steps</h>
          </div> -->
          <table class="table">
            <thead ng-style="{backgroundColor:'#BDC0BC'}">
              <th>rank</th>
              <th>team</th>
              <th>steps</th>
            </thead>
            <tbody>
              <tr ng-style="{backgroundColor: team.color}" ng-repeat="team in teams | orderBy: '-steps'">
                <td>{{$index+1}}</td>
                <td >{{team.group_id}}</td>
                <td >{{team.steps | number: fractionSize}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div ng-if="challenge.numberOfTeams == 4">
          <round-progress class="p_first"
            current=teams[0].steps
            stroke="6"
            responsive="true"
            color="#7CC188"
            radius=100
          >
            <round-progress
              offset="9"
              current=teams[1].steps
              color="#10B7E8"
            >
            </round-progress>
            <round-progress
              offset="18"
              current=teams[2].steps
              color="#fc6c85 "
            >
            </round-progress>
            <round-progress
              offset="27"
              current=teams[3].steps
              color="#ffc87a"
            >
            </round-progress>
          </round-progress>
        </div>
      </div>
    <!-- end of column progressCircle -->
    </div>

    <!-- column: progressBar -->
    <div class="item align-content-around align-self-sm-center justify-content-center" id="progressBar">
      <!-- countdown  -->
      <div  style="text-align: center; margin-bottom: 15px;">
        <div style="text-align: center; width: 100%; display: inline-block;" id="countDown" class="">
          <div class=" clock" style="margin: 0;  zoom:0.5; font-size: 16px !important; width: 622px; display: inline-block;"></div>
        </div>
      </div>


      <div class="card" id="p_box">
        <div id="p_bar">
          <div class="progress ">
            <!-- http://www.flaticon.com/free-icon/golf-flag-with-pole_33871# -->
            <img ng-show="(steps[myStepsId].steps/challenge.steps_person*100) < 100" src="img/flag.png" alt="">
            <img id="finish" ng-show="(steps[myStepsId].steps/challenge.steps_person*100) >= 100" src="img/flag-finish.png" alt="">
            <!-- teams[group_id].color -->
            <div ng-style="{backgroundColor: '#93c7bc', 'width': (steps[myStepsId].steps/challenge.steps_person*100 | number:1)+'%'}" class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" >
              <div ng-class="(steps[myStepsId].steps/challenge.steps_person*100) < 30 ? 'p1':'p2'" class="b_percentage">
                {{steps[myStepsId].steps/challenge.steps_person*100 | number: 1}}%
              </div>
              <img ng-show="(steps[myStepsId].steps/challenge.steps_person*100) < 100"  src="img/man-running.gif">
              <!-- http://www.flaticon.com/free-icon/man-running_18057#term=running&page=1&position=20 -->
            </div>
          </div>
          <div id="p_text">
            <h1 id="p_title">MY STEPS</h1>
            <div id="left">
              <h6><strong>Total:</strong> {{steps[myStepsId].steps | number: fractionSize}} steps</h6>
              <h6><strong>Left:</strong> <span ng-if="steps[myStepsId].steps <= challenge.steps_person">{{challenge.steps_person - steps[myStepsId].steps | number: fractionSize}} steps</span><span ng-if="steps[myStepsId].steps > challenge.steps_person">0 steps</span></h6>
              <h6><strong>Today:</strong> {{steps_today | number: fractionSize}} steps</h6>
            </div>
            <div id="right">
              <!-- <h6><strong>Today:</strong> {{steps_today | number: fractionSize}} steps</h6> -->
              <h6><strong>Team: </strong>{{group_id+1}}</h6>
            </div>
          </div>
        </div>
      </div>

    <!-- end of column progressBar -->
    </div>


    <!-- column rewards description -->
    <div class="item align-self-center align-self-sm-center justify-content-center" id="rewards_container">
      <div class="card " id="rewards">
        <h3>Rewards and Badges</h3>
        <!-- http://freevectorfinder.com/free-vectors/badge-templates/ badge -->
        <!-- https://thenounproject.com/search/?q=health&i=1024089 health sign -->
        <!-- http://www.freeiconspng.com/img/29530 alliance -->
        <!-- http://www.flaticon.com/free-icon/first-prize-trophy_47844#term=trophy&page=1&position=28 champion -->
        <!-- https://thenounproject.com/search/?q=team%20champion&i=968012 warriors -->
        <!-- https://www.shareicon.net/person-logo-symbol-leaves-gym-logotype-symbols-shape-667712 league -->
        <div id="alliance" class="badge_container">
          <img class="badge_image" src="img/alliance.gif" alt="">
          <div class="badge_text">
            <p><strong>Objective:</strong> help your team reach {{challenge.steps_team | number: fractionSize}} steps</p>
            <p ng-if="challenge.award_team_completion_type !== 'none'"><strong>Reward:</strong>
              <span ng-if="challenge.award_team_completion_type !== 'other'"> {{challenge.award_team_completion_type}} ({{challenge.award_team_completion_details}})
              </span>
              <span ng-if="challenge.award_team_completion_type == 'other'">
                {{challenge.award_team_completion_details}}
              </span>
            </p>
          </div>
        </div>
        <div id="warriors" class="badge_container">
          <img class="badge_image" src="img/warriors.gif" alt="">
          <div class="badge_text">
            <p><strong>Objective:</strong> help your team come in first</p>
            <p ng-if="challenge.award_team_winner_type !== 'none'"><strong>Reward:</strong>
              <span ng-if="challenge.award_team_winner_type !== 'other'"> {{challenge.award_team_winner_type}} ({{challenge.award_team_winner_details}})
              </span>
              <span ng-if="challenge.award_team_winner_type == 'other'">
                {{challenge.award_team_winner_details}}
              </span>
            </p>
          </div>
        </div>
        <div id="league" class="badge_container">
          <img class="badge_image" src="img/league.gif" alt="">
          <div class="badge_text">
            <p><strong>Objective:</strong> reach {{challenge.steps_person | number: fractionSize}} steps</p>
            <p ng-if="challenge.award_person_completion_type !== 'none'"><strong>Reward:</strong>
              <span ng-if="challenge.award_person_completion_type !== 'other'"> {{challenge.award_person_completion_type}} ({{challenge.award_person_completion_details}})
              </span>
              <span ng-if="challenge.award_person_completion_type == 'other'">
                {{challenge.award_person_completion_details}}
              </span>
            </p>
          </div>
        </div>
        <div id="elite" class="badge_container">
          <img class="badge_image" src="img/elite.gif" alt="">
          <div class="badge_text">
            <p><strong>Objective:</strong> end up in the top {{challenge.cutoff}} among all players</p>
            <p ng-if="challenge.award_person_cutoff_type !== 'none'"><strong>Reward:</strong>
              <span ng-if="challenge.award_person_cutoff_type !== 'other'"> {{challenge.award_person_cutoff_type}} ({{challenge.award_person_cutoff_details}})
              </span>
              <span ng-if="challenge.award_person_cutoff_type == 'other'">
                {{challenge.award_person_cutoff_details}}
              </span>
            </p>
          </div>
        </div>
        <div id="champion" class="badge_container">
          <img class="badge_image" src="img/champion.gif" alt="">
          <div class="badge_text">
            <p><strong>Objective:</strong> come in first among all players</p>
            <p ng-if="challenge.award_person_winner_type !== 'none'"><strong>Reward:</strong>
              <span ng-if="challenge.award_person_winner_type !== 'other'"> {{challenge.award_person_winner_type}} ({{challenge.award_person_winner_details}})
              </span>
              <span ng-if="challenge.award_person_winner_type == 'other'">
                {{challenge.award_person_winner_details}}
              </span>
            </p>
          </div>
        </div>
      </div>
    <!-- end of rewards -->
    </div>


    <!-- column: team leaderboards -->
    <div class="item align-self-center align-self-sm-start justify-content-center" id="teamLeaderBoard">
      <div class="card l_container">
        <h1 class="l_header ">Team Leaderboard</h1>
        <table class="table" id="t_buttons">
          <tr>
            <td ng-style="{backgroundColor: (showTable[$index] ? group.color: '#BDC0BC')}" ng-click="toggle($index)" ng-repeat="group in teams">
              <button ng-style="{backgroundColor: (showTable[$index] ? group.color: '#BDC0BC')}">Team {{$index+1}}</button>
            </td>
          </tr>
        </table>
        <table id="t_body" class="table table-hover table-striped"  ng-show="showTable[$index]" ng-repeat="(index, team) in teams | orderBy: 'group_id'">
          <thead ng-style="{backgroundColor: team.color}">
            <th>rank</th>
            <th>player</th>
            <th>steps</th>
          </thead>
          <tbody ng-style="{backgroundColor: team.color}">
            <!-- ng-style="{backgroundColor: team.color, 'opacity': ($index % 2 !== 0 ? '0.8':'1.0')}" -->
            <tr ng-style="{backgroundColor: person.id == employee_id ? '#93c7bc' : '', color: person.id == employee_id ? 'white' : ''}" ng-repeat="person in steps | filter:orderByGroups(index+1):true | orderBy: 'steps':true">
              <td>{{$index+1}}</td>
              <td>{{person.name}}</td>
              <td>{{person.steps | number:0}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    <!-- end of column teamLeaderBoard -->
    </div>


    <!-- column: Individual leaderboard -->
    <div class="item align-self-center align-self-sm-start justify-content-center" id="individualLeaderBoard">
      <div class="card l_container">
        <h1 class="l_header ">
          Individual Leaderboard
        </h1>
        <table class="table table-hover table-striped">
          <thead>
            <th>rank</th>
            <th>player</th>
            <th>team</th>
            <th>steps</th>
          </thead>
          <tbody class="table" >
            <!-- ng-style="{backgroundColor: teams[person.group_id-1].color}" -->

            <!-- {backgroundColor: $index == 0 ? '#D4AF37' : 'none', backgroundColor: $index <= challenge.cutoff-1 && $index>0 ? '#333334' : 'none', color: $index <= challenge.cutoff-1 ? 'white' : 'none' }" ng-repeat="person in steps | orderBy: 'steps':true -->
            <!-- ng-class="{'gold': $index == 0 , 'black': $index <= challenge.cutoff - 1 && $index > 0}" ng-repeat="person in steps | orderBy: 'steps':true" -->
            <tr ng-style="{backgroundColor: person.id == employee_id ? '#93c7bc' : '', color: person.id == employee_id ? 'white' : 'black'}" ng-repeat="person in steps | orderBy: 'steps':true">
              <td style="vertical-align:middle">
                <span class="rank_text">{{$index+1}}</span>
                <img ng-if="$index == 0" class="badge_image" src="img/champion.gif" alt="">
                <img ng-if="$index > 0 && $index <= challenge.cutoff - 1" class="badge_image" src="img/elite.gif" alt="">
                <img ng-if="person.steps >= challenge.steps_person" class="badge_image" src="img/league.gif" alt="">
              </td>
              <td >{{person.name}}</td>
              <td>{{person.group_id}}</td>
              <td>{{person.steps | number: fractionSize}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    <!-- end of individualLeaderBoard -->
    </div>
  </div>

  <!-- logout button -->
  <div id="logout" style="height: 45px; vertical-align: middle;">
    <a href="" ng-click="logout()">
    <div style="float:left; height: 45px; ">
      <img src="logout.gif" height='45px' width='30px' alt="">
    </div>
    <h style="margin-left: 2px; font-size: 16px; line-height: 45px; "> Logout</h></a>
  </div>

  <!-- chat -->
  <div id ="chat">
    <div ng-model="header" ng-click="header.booleanVal = !header.booleanVal" id="c_header">
      <!-- Chat (Team {{group_id+1}}) -->
      Team Chat
    </div>
    <div ng-show="header.booleanVal">
      <div id="c_box" scroll-glue>
        <div ng-repeat="message in chat track by $index">
          <div ng-class="message.id == employee_id ? 'c_myMessage': ''" class = "c_message">
            <div class="c_header">
              <span class="c_name" >{{message.name}}</span>
              <time class="c_time" am-time-ago="message.date"></time>
            </div>
            <div class="c_text">
              {{message.message}}
            </div>
          </div>
        </div>
      </div>
      <div id="c_footer">
        <textarea id="c_input" rows="1" msd-elastic ng-model="input" placeholder="Type a message.." my-enter="submit()"></textarea>
        <!-- <button id="c_button"></button> -->
      </div>
    </div>
  </div>



</div>

<!-- <script type="text/javascript">
$("#fakeloader").fakeLoader();
</script>
</div> -->
