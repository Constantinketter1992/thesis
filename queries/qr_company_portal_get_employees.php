<?php include '../../../functions.php'; ?>

<?php

$return = 'false';
$company_id = $_SESSION['userid'];
$data = [];
class Employee{
  public $id;
  public $email;
  public $name;
}
  //get connection
  $mysqli = getConnection();

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();

  $query = "SELECT ue.id, ue.email, ue.name, es.level, es.steps_total as total, es.badge_team_completion as alliance, es.badge_team_winner as warriors, es.badge_ind_completion as league, es.badge_ind_winner as champion, es.badge_ind_cutoff as elite,
  es.badge_team_completion+ es.badge_team_winner+ es.badge_ind_completion  + es.badge_ind_winner + es.badge_ind_cutoff as sum FROM user_employees as ue JOIN employees_stats as es ON ue.id = es.employee_id WHERE ue.company_id = $company_id ";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data[] = $row;
    }
  }
  $mysqli->close();

  echo json_encode($data, JSON_NUMERIC_CHECK);


?>
