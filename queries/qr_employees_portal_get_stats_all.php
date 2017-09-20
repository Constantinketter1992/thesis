<?php include '../../../functions.php'; ?>

<?php


$company_id = $_SESSION['companyid'];
$data=[];

  //get connection
  $mysqli = getConnection();


  $query="SELECT ue.name as name, es.employee_id as id, es.level, es.steps_total as total, es.badge_team_completion as alliance, es.badge_team_winner as warriors, es.badge_ind_completion as league, es.badge_ind_winner as champion, es.badge_ind_cutoff as elite,
  es.badge_team_completion+ es.badge_team_winner+ es.badge_ind_completion  + es.badge_ind_winner + es.badge_ind_cutoff as sum
   FROM employees_stats as es JOIN user_employees as ue ON es.employee_id = ue.id AND es.company_id = $company_id";

  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        $data [] = $row;
    }
  }else{
    $data = "false";
  }
  $mysqli->close();
  echo json_encode($data, JSON_NUMERIC_CHECK);
  ?>
