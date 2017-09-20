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
              <a ng-click="logout()" class="nav-link" href="#!company">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <!-- title -->
  <div id="title" style="font-family: sassoon; font-size: 30px; margin-top: 20px; line-height: 30px;">My Challenges</div>

  <!-- body -->
  <div class="items flex-container">
    <!-- weekly -->
    <div class="item">
      <div class="card itemContainer company_table">
        <h1 style="">Weekly Challenge
        </h1>
        <div>
          <button style="margin-bottom: 5px;float: right; margin-top:-35px; background-color: #c7d92d; color:#464a4c;" class="btn" go-click="/company/portal/challenges/weekly">new</button>
        </div>
        <div style="font-size: 18px; color: grey;" ng-show = "empty">- no challenge this week</div>
        <div style="text-align:left; color: #555555;" ng-show = "!empty">
          <!-- date, steps, #teams -->
          <!-- <div>
            Created: {{weekly.date}}
          </div> -->
          <div>
            <strong># of Teams:</strong> {{weekly.number}}
          </div>
          <div>
            <strong>Team Objective:</strong> {{weekly.steps_team | number: 0}} steps
          </div>
          <div>
            <strong>Individual Objective:</strong> {{weekly.steps_person | number:0}} steps
          </div>

          <table style="margin-top: 5px;" class="table table-hover table-striped">
            <thead>
              <th>Type</th>
              <th>Reward</th>
            </thead>
            <tbody>
              <!-- individual completion -->
              <tr>
                <th>Individual Objective</th>
                <th>
                  <span ng-if="weekly.pc_type == 'none'">
                    none
                  </span>
                  <span ng-if="weekly.pc_type !== 'none'">
                    <span ng-if="weekly.pc_type =='other'">
                      {{weekly.pc_details}}
                    </span>
                    <span ng-if="weekly.pc_type !=='other'">
                      {{weekly.pc_type}}: {{weekly.pc_details}}
                    </span>
                  </span>
                </th>
              </tr>

              <!-- cutoff -->
              <tr>
                <th>Individual Elite Group (Top {{weekly.cutoff}})</th>
                <th>
                  <span ng-if="weekly.c_type == 'none'">
                    none
                  </span>
                  <span ng-if="weekly.c_type !== 'none'">
                    <span ng-if="weekly.c_type =='other'">
                      {{weekly.c_details}}
                    </span>
                    <span ng-if="weekly.c_type !=='other'">
                      {{weekly.c_type}}: {{weekly.c_details}}
                    </span>
                  </span>
                </th>
              </tr>

              <!-- individual winner -->
              <tr>
                <th>Individual Winner</th>
                <th>
                  <span ng-if="weekly.pw_type == 'none'">
                    none
                  </span>
                  <span ng-if="weekly.pw_type !== 'none'">
                    <span ng-if="weekly.pw_type =='other'">
                      {{weekly.pw_details}}
                    </span>
                    <span ng-if="weekly.pw_type !=='other'">
                      {{weekly.pw_type}}: {{weekly.pw_details}}
                    </span>
                  </span>
                </th>
              </tr>

              <!-- team completion -->
              <tr>
                <th>Team Objective</th>
                <th>
                  <span ng-if="weekly.tc_type == 'none'">
                    none
                  </span>
                  <span ng-if="weekly.tc_type !== 'none'">
                    <span ng-if="weekly.tc_type =='other'">
                      {{weekly.tc_details}}
                    </span>
                    <span ng-if="weekly.tc_type !=='other'">
                      {{weekly.tc_type}}: {{weekly.tc_details}}
                    </span>
                  </span>
                </th>
              </tr>

              <!-- team winner -->
              <tr>
                <th>Team Winner</th>
                <th>
                  <span ng-if="weekly.tw_type == 'none'">
                    none
                  </span>
                  <span ng-if="weekly.tw_type !== 'none'">
                    <span ng-if="weekly.tw_type =='other'">
                      {{weekly.tw_details}}
                    </span>
                    <span ng-if="weekly.tw_type !=='other'">
                      {{weekly.tw_type}}: {{weekly.tw_details}}
                    </span>
                  </span>
                </th>
              </tr>

            </tbody>
          </table>

        </div>
      </div>
    </div>


    <!-- longterm -->
    <div class="item">
      <div class="card itemContainer company_table">
        <h1>Longterm Challenges</h1>
        <div style="inline-block;">
          <button style="margin-bottom: 5px;float: right; margin-top:-35px; background-color: #c7d92d; color:#464a4c;" class="btn" go-click="/company/portal/challenges/longterm">add</button>
        </div>
        <div style="font-size: 18px; color: grey;" ng-show = "l_empty">- no longterm challenges</div>
        <table ng-if = "!l_empty" class="table table-hover table-striped">
          <thead>
            <th>#</th>
            <th>Objective</th>
            <th>Reward</th>
          </thead>
          <tbody>
            <tr ng-repeat="challenge in longterm">
              <td>{{$index+1}}</td>
              <td >
                <div ng-if="challenge.level !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  Level {{challenge.level}}
                </div>
                <div ng-if="challenge.p_completion !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  Individual Objective: {{challenge.p_completion}} time<span ng-if="challenge.p_completion>1">s
                  </span>
                </div>
                <div ng-if="challenge.t_completion !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  Team Objective: {{challenge.t_completion}} time<span ng-if="challenge.t_completion>1">s
                  </span>
                </div>
                <div ng-if="challenge.p_cutoff !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  Individual Elite Group: {{challenge.p_cutoff}} time<span ng-if="challenge.p_cutoff>1">s
                  </span>
                </div>
                <div ng-if="challenge.p_winner !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  <!-- win the individual challenge {{challenge.p_winner}} time<span ng-if="challenge.p_winner>1">s
                  </span> -->
                  Individual Winner: {{challenge.p_winner}} time<span ng-if="challenge.p_winner>1">s</span>
                </div>
                <div ng-if="challenge.t_winner !==null">
                  <i class="arrow fa fa-arrow-right"></i>
                  Team Winner: {{challenge.t_winner}} time<span ng-if="challenge.t_winner>1">s
                  </span>
                </div>
              </td>
              <td>
                <span ng-if="challenge.awardType !=='other'">
                  <span>
                    {{challenge.awardType}}
                  </span>
                  <span ng-if="challenge.awardDetails !== null">
                    ({{challenge.awardDetails}})
                  </span>
                </span>

                <span ng-if="challenge.awardType =='other'">
                  <span ng-if="challenge.awardDetails !== null">
                    {{challenge.awardDetails}}
                  </span>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
