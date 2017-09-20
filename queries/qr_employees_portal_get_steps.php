<?php include '../../../functions.php'; ?>

<?php


$employee_id = $_SESSION['userid'];
$company_id = $_SESSION['companyid'];
  //get connection
  $mysqli = getConnection();

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();
  //
  // if ($stmt->prepare("SELECT steps,date FROM employees_steps_daily WHERE employee_id = $employee_id AND company_id = $company_id ORDER BY date")) {
  //
  //   $stmt->execute();
  //
  //   $stmt->bind_result($steps);
  //
  //   $stmt->store_result();
  //
  // 	if($stmt->num_rows){// are there any results?
  //   	/* fetch the result of the query & loop round the results */
  //     while($stmt->fetch()){
  //       $data [] = $steps;
  //     }
  // 	}
  //   /* close statement */
  //   $stmt->close();
  // }

  $query="SELECT steps,date FROM employees_steps_daily WHERE employee_id = $employee_id AND company_id = $company_id AND  DATE(date) >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) ORDER BY date DESC";

  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data[] = $row;
    }
  }else{
    $data = false;
  }
  $mysqli->close();

  echo json_encode($data, JSON_NUMERIC_CHECK);

?>
