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

  <form style="top: 18%;" name="eForm" class="formEmployees">
    <div class="body">
      <!-- instructions -->
      <div class="register_title">Registration</div>
      <div style="margin-top: 4px; line-height: 23px; margin-bottom: 10px;" class="register_steps"><span >Step 2:</span> enter your employees' email addresses</div>

      <div class="input-group">
        <span class="input-group-addon" ><i class="fa fa-envelope"></i></span>
        <input autocomplete="off" placeholder="employee email" class="form-control" type="email" value = "{{current.name}}" ng-model= "current.email" name="email" required>
        <button class="btn" style="width: 60px; padding: 5px; background-color: #42ac47; border-left: none; border-top-left-radius: 0; border-bottom-left-radius: 0; border-color: #38923c; color:white;" ng-disabled="eForm.email.$invalid" ng-click="add(current)" ng-show="addMode">Add</button>
      </div>

      <!-- table -->
      <table id="list" class="table table-hover table-striped">
        <thead>
          <th>#</th>
          <th>email address</th>
        </thead>
        <tbody>
          <tr ng-repeat="person in employees">
            <td>{{$index+1}}</td>
            <td>{{person.email}}</td>
          </tr>
        </tbody>
      </table>

      <!-- reset/submit buttons -->
      <div style="margin-top: 10px;">
        <button style="float: left; background-color: #c7d92d; color:#464a4c;" class="btn" type="button" ng-disabled="!resetMode" ng-click="reset()">Reset</button>
        <button style="float: right; background-color: #42ac47; color:white;" class="btn" ng-disabled="!resetMode" ng-click="submit()">Submit</button>
      </div>
    </div>
  </form>
</div>




<!-- <form name="eForm" >
  <ul>
    <p>Add employees</p>
    <input type="email" value = "{{current.name}}" ng-model= "current.email" name="email" required>
    <button ng-disabled="eForm.email.$invalid" ng-click="add(current)" ng-show="addMode">add</button>
    <button ng-disabled="eForm.email.$invalid" ng-click="save()" ng-hide="addMode">save</button>
    <button ng-click="cancel()" ng-hide="addMode">cancel</button>

    <span ng-if="eForm.email.$error.email">Invalid</span>
    <li ng-repeat = "email in employees">
      {{email.email}}
      <button ng-click="remove(email)">remove</button>
      <button ng-click="edit(email)">edit</button>
    </li>
    <button ng-click="submit()">submit</button>
    <button ng-hide="!resetMode" ng-click="reset()">reset</button>
    <span ng-if="list_state">
      you must enter a list of emails
    </span>
  </ul>
</form> -->
