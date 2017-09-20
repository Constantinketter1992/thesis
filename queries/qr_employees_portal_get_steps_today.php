<?php include '../../../functions.php'; ?>

<?php

$return = "false";
$employee_id = $_SESSION['userid'];
$company_id = $_SESSION['companyid'];
  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT steps FROM employees_steps_daily WHERE employee_id = $employee_id AND company_id = $company_id AND DATE(date) = DATE(NOW())")) {

    $stmt->execute();

    $stmt->bind_result($steps);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?
    	/* fetch the result of the query & loop round the results */
      while($stmt->fetch()){
        $return = $steps;
      }
  	}
    /* close statement */
    $stmt->close();
  }
  /* close connection */
  if($return == "false"){
    $_SESSION["stepsToday"] = false;
  }else{
    $_SESSION["stepsToday"] = true;
  }
  $mysqli->close();

  echo $return;

?>
