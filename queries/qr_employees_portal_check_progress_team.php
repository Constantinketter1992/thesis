<?php include '../../../functions.php'; ?>

<?php

$company_id = $_SESSION['companyid'];
$goal_id = $_SESSION["goalid"];
$data = [];
  //get connection
  $mysqli = getConnection();

  $query = "SELECT steps, group_id FROM employees_weekly_progress_team WHERE company_id = $company_id AND goal_id = $goal_id ORDER BY group_id";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data[] = $row;
    }
  }else{
    $data = "false";
  }

    // $stmt->execute();
    //
    // $stmt->bind_result($steps);
    //
    // $stmt->store_result();
    //
  	// if($stmt->num_rows){// are there any results?
    // 	/* fetch the result of the query & loop round the results */
    //   while($stmt->fetch()){
    //     $data[] = $steps;
    //   }
  	// }else{
    //   $data = false;
    // }
    /* close statement */
    // $stmt->close();

  // $query = "SELECT steps FROM employees_weekly_progress_team WHERE company_id = $company_id AND goal_id = $goal_id ORDER BY group_id";
  //
  // $result = $mysqli->query($query);
  //
  // if ($result->num_rows > 0) {
  //   // output data of each row
  //   while($row = $result->fetch_object()) {
  //       $data[] = $row;
  //   }
  // }else{
  //   $data = 'false';
  // }

  $mysqli->close();

  echo json_encode($data, JSON_NUMERIC_CHECK);

?>
