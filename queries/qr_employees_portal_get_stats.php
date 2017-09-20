<?php include '../../../functions.php'; ?>

<?php


$id = $_SESSION['userid'];
$data;

  //get connection
  $mysqli = getConnection();


  $query="SELECT level, xp, steps_total as total, badge_team_completion as alliance, badge_team_winner as warriors, badge_ind_completion as league, badge_ind_winner as champion, badge_ind_cutoff as elite FROM employees_stats WHERE employee_id = $id";

  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        $data = $row;
    }
  }else{
    $data = "false";
  }


  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();
  //
  // if ($stmt->prepare("SELECT level, XP, steps_total, badge_team_completion as alliance, badge_team_winner as warriors, badge_ind_completion as league, badge_ind_winner as champion, badge_ind_cutoff as elite FROM employees_stats WHERE employee_id = $id" )) {
  //
  //   $stmt->execute();
  //
  //   $stmt->bind_result($level, $XP, $alliance, $warriors, $league, $champ, $bic);
  //
  //   $stmt->store_result();
  //
  // 	if($stmt->num_rows){// are there any results?
  //   	/* fetch the result of the query & loop round the results */
  //     while($stmt->fetch()) {
  //       $data = [$level, $XP, $btc, $btw, $bic, $biw, $b];
  //     }
  // 	}
  //   /* close statement */
  //   $stmt->close();
  // }
  // /* close connection */
  // $mysqli->close();
  $mysqli->close();
  echo json_encode($data, JSON_NUMERIC_CHECK);
  ?>
