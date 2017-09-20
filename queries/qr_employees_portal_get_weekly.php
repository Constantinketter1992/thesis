<?php include '../../../functions.php'; ?>

<?php
  //get connection
  $mysqli = getConnection();
  $company_id = $_SESSION["companyid"];
  $employee_id = $_SESSION["userid"];
  $data = false;

  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT goal_id, team_number FROM employees_weekly WHERE company_id = $company_id AND employee_id = $employee_id AND date > (NOW()- INTERVAL 7 DAY) ORDER BY date DESC LIMIT 1" )) {

    $stmt->execute();

    $stmt->bind_result($goal_id, $group_id);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?
      $return = true;
    	/* fetch the result of the query & loop round the results */
      while($stmt->fetch()) {
        $_SESSION['groupid'] = $group_id;
        $_SESSION['goalid'] = $goal_id;
      }
  	}
    /* close statement */
    $stmt->close();
  }

  if($return){
    $query = "SELECT numberOfTeams, steps_team, steps_person, cutoff, award_team_completion_type, award_team_completion_details, award_team_winner_type, award_team_winner_details, award_person_completion_type, award_person_completion_details, award_person_cutoff_type, award_person_cutoff_details, award_person_winner_type, award_person_winner_details, NOW() FROM company_weekly WHERE id = $goal_id";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_object()) {
          $return = $row;
      }
      $_SESSION['lastid'] = end($data)->message_id;
    }else{
      $return = 'second step fail';
    }
  }
  if($group_id !== null){
    $x = new DateTime('Monday next week');
    $data = [$return,$group_id,$x];
  }

  /* close connection */
  $mysqli->close();

  echo json_encode($data);
?>
