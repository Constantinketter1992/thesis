<?php include '../../../functions.php'; ?>
<?php

  $employee_id = $_SESSION['userid'];
  $company_id = $_SESSION['companyid'];
  $goal_id = $_SESSION['goalid'];
  $group_id = $_SESSION['groupid'];
  $steps = $_POST["steps"];
  $boolean = $_SESSION["stepsToday"];
  $response = 'failed';
  $id = $_SESSION["id_today"];


  $mysqli = getConnection();
  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();
  if($boolean == false){
    $query = "INSERT INTO employees_steps_daily (employee_id, company_id, steps, date) VALUES ($employee_id,$company_id,$steps,NOW())";
  }else{
    $query = "UPDATE employees_steps_daily SET steps = steps + $steps WHERE employee_id = $employee_id AND company_id = $company_id AND DAY(date) = DAY(NOW())";
  }
  if ($stmt->prepare($query)){


     //execute query
     $results = $stmt->execute();

     /* close statement */
     $stmt->close();
  }

  $stmt =  $mysqli->stmt_init();
  if ($stmt->prepare("UPDATE employees_weekly_progress_team SET steps = steps + $steps WHERE company_id = $company_id AND group_id = $group_id AND goal_id = $goal_id")){
    $stmt->execute();

    /* close statement */
    $stmt->close();
  }
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("UPDATE employees_weekly SET steps = steps + $steps WHERE employee_id = $employee_id AND company_id = $company_id AND goal_id = $goal_id")){
  $stmt->execute();

    /* close statement */
    $stmt->close();
  }

  $stmt =  $mysqli->stmt_init();
  if ($stmt->prepare("UPDATE employees_stats SET steps_total = steps_total + $steps WHERE employee_id = $employee_id AND company_id = $company_id")){
  $stmt->execute();

    /* close statement */
    $stmt->close();
  }


  /* close connection */
  $mysqli->close();

  ?>
