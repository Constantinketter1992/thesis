<?php include '../../../functions.php'; ?>

<?php
//get connection
$mysqli = getConnection();

$company_id = $_SESSION['companyid'];
$data = [];


  // $query="SELECT GROUP_CONCAT(ew.employee_id) as employee_id, GROUP_CONCAT(ue.name) as name, GROUP_CONCAT(ew.steps) as steps_ind, ew.team_number as group_id FROM employees_weekly as ew JOIN user_employees as ue ON ew.employee_id=ue.id AND ew.goal_id = $goal_id AND ew.company_id = $company_id GROUP BY ew.team_number";
  $query="SELECT employee_id as id, steps, date FROM employees_steps_daily WHERE company_id = $company_id AND  DATE(date) >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) ORDER BY date DESC,id";
// SELECT employee_id as id, steps, date FROM employees_steps_daily WHERE company_id = $company_id AND  DATE(date) >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) GROUP BY employee_id, date ORDER BY employee_id, date
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    $last_employee_id = -1;
    // $i = 0;
    // $date_today = getdate();
    while($row = $result->fetch_object()) {
      $data [] = $row;
     }
  }else{
    $data = "false";
  }
  // $x = explode(",", $data["employee_id"]);

  $mysqli->close();

  echo json_encode($data, JSON_NUMERIC_CHECK);
?>
