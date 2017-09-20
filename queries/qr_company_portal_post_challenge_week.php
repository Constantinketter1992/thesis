<?php include '../../../functions.php'; ?>
<?php
  $groups = $_POST['groups'];
  $numberOfTeams = $_POST['numberOfGroups'];
  $awards = $_POST['awards'];
  $steps_team = $_POST['stepsPerGroup'];
  $steps_person = $_POST['stepsPerPerson'];
  $cutoff = $_POST['cutoff'];
  $id = $_SESSION['userid'];

  $mysqli = getConnection();
  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("INSERT INTO company_weekly (company_id, numberOfTeams, steps_team, steps_person, cutoff, award_team_completion_type, award_team_completion_details, award_team_winner_type, award_team_winner_details, award_person_completion_type, award_person_completion_details, award_person_cutoff_type, award_person_cutoff_details, award_person_winner_type, award_person_winner_details, date)
   VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())")){

     //bind parameters
     $stmt->bind_param("iiiiissssssssss", $id, $numberOfTeams, $steps_team, $steps_person, $awards[3]["cutoff"], $awards[0]["type"], $awards[0]["text"], $awards[1]["type"], $awards[1]["text"], $awards[2]["type"], $awards[2]["text"], $awards[3]["type"], $awards[3]["text"], $awards[4]["type"], $awards[4]["text"]);

     $stmt->execute();

     /* close statement */
     $stmt->close();
  }
  $goal_id = $mysqli->insert_id;
  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();
  if ($stmt->prepare("INSERT INTO employees_weekly (employee_id, company_id, goal_id, team_number, steps, date)
   VALUES (?,?,?,?,0,NOW())")){

     //bind parameters
     $stmt->bind_param("iiii", $employee_id, $id, $goal_id, $team_number);

     //execute query
     $x = 1;
     foreach($groups as $one){
       $team_number = $x;
       foreach($one as $two){
        $employee_id = $two['id'];
        $stmt->execute();
       }
       $x++;
     }

     /* close statement */
     $stmt->close();
  }

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();
  if ($stmt->prepare("INSERT INTO employees_weekly_progress_team (company_id, group_id, goal_id, steps, date)
   VALUES (?,?,?,0,NOW())")){

     //bind parameters
     $stmt->bind_param("iii", $id, $group_id, $goal_id);

     //execute query
     $x = 1;
     foreach($groups as $one){
       $group_id = $x;
       $stmt->execute();
       $x++;
     }

     /* close statement */
     $stmt->close();
  }

//DONT NEED employees_weekly_progress_individual!!!!
  /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();
  // if ($stmt->prepare("INSERT INTO employees_weekly_progress_individual (employee_id, company_id, goal_id, steps, date)
  //  VALUES (?,?,?,?, 0, NOW())")){
  //
  //    //bind parameters
  //    $stmt->bind_param("iiii", $employee_id, $id, $goal_id);
  //
  //    //execute query
  //    $x = 1;
  //    foreach($groups as $one){
  //      $group_id = $x;
  //      foreach($one as $two){
  //       $employee_id = $two['id'];
  //       $stmt->execute();
  //      }
  //      $x++;
  //    }
  //
  //    /* close statement */
  //    $stmt->close();
  // }


    /* close connection */
    $mysqli->close();

    echo $response;
?>
