<?php include '../../../functions.php'; ?>

<?php

$return = 'false';
$company_id = $_SESSION["companyid"];
$goal_id = $_SESSION["goalid"];
$group_id = $_SESSION["groupid"];
$data = [];
  //get connection
  $mysqli = getConnection();

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();

  $query = "SELECT id as message_id, employee_id as id, name, message,date FROM employees_chat WHERE company_id = $company_id AND goal_id = $goal_id AND group_id = $group_id ";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data[] = $row;
    }
  }else{
    $data = 'false';
  }
  $mysqli->close();

  $_SESSION['lastid'] = end($data)->message_id;


  echo json_encode($data);

?>
