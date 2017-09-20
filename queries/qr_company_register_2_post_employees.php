<?php include '../../../functions.php'; ?>
<?php
  $employees = $_POST['data'];
  $id = $_SESSION['userid'];

  //function used from https://stackoverflow.com/questions/4356289/php-random-string-generator
  function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
    $mysqli = getConnection();
    /* create a prepared statement */
    $stmt =  $mysqli->stmt_init();

    if ($stmt->prepare("INSERT INTO user_employees (company_id, email, token)
     VALUES (?,?,?)")){

       //bind parameters
       $stmt->bind_param("iss", $id, $email, $token);

       //execute query
       foreach($employees as $one){
         $token = generateRandomString();
         $email = $one['email'];
         $stmt->execute();
       }

       /* close statement */
       $stmt->close();
    }

    //set all employees stats (badges,levels,steps) to 0
    $stmt =  $mysqli->stmt_init();
    $employee_id = $mysqli->insert_id;

    if ($stmt->prepare("INSERT INTO employees_stats (employee_id, company_id, badge_team_completion, badge_team_winner, badge_ind_completion, badge_ind_winner, badge_ind_cutoff, steps_total, level, XP)
     VALUES (?,?,0,0,0,0,0,0,0,0)")){

       //bind parameters
       $stmt->bind_param("ii", $employee_id, $id);

       //execute query
       foreach($employees as $one){
         $stmt->execute();
         $employee_id--;
       }

       /* close statement */
       $stmt->close();
    }


    /* close connection */
    $mysqli->close();

    echo $response;
  ?>
