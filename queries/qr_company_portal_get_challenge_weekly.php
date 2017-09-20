<?php include '../../../functions.php'; ?>

<?php
//get connection
$mysqli = getConnection();

$company_id = $_SESSION['userid'];

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();

  $query = "SELECT numberOfTeams as number, steps_team, steps_person, cutoff, award_team_completion_type as tc_type, award_team_completion_details as tc_details, award_team_winner_type as tw_type, award_team_winner_details as tw_details, award_person_completion_type as pc_type, award_person_completion_details as pc_details, award_person_cutoff_type as c_type, award_person_cutoff_details as c_details, award_person_winner_type as pw_type, award_person_winner_details as pw_details, date FROM company_weekly WHERE company_id= $company_id AND YEARWEEK(date)=YEARWEEK(NOW(),3) ORDER BY date DESC LIMIT 1 ";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data = $row;
    }
  }else{
    $data = [];
  }
  $mysqli->close();

  echo json_encode($data, true);
?>
