<?php include '../../../functions.php'; ?>

<?php
//get connection
$mysqli = getConnection();

$company_id = $_SESSION['userid'];
$data = [];

  $query="SELECT employee_id as id, steps, date FROM employees_steps_daily WHERE company_id = $company_id AND  DATE(date) >= DATE_SUB(CURDATE(), INTERVAL 90 DAY) ORDER BY date DESC,id";

  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    $last_employee_id = -1;
    while($row = $result->fetch_object()) {

      $data [] = $row;
     }
  }else{
    $data = "false";
  }

  $mysqli->close();

  echo json_encode($data, JSON_NUMERIC_CHECK);
?>
