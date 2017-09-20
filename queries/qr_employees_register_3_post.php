<?php include '../../../functions.php'; ?>
<?php

  $id = $_SESSION['userid'];
  $token = $_POST['access_token'];
  $fitbit_id = $_POST['user_id'];
  $response = 'failed';

  $mysqli = getConnection();
  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("UPDATE user_employees SET  fitbit_access_token = ?, fitbit_id = ?
   WHERE id = ?")){

     //bind parameters
     $stmt->bind_param("ssi", $token, $fitbit_id, $id);

     //execute query
     $results = $stmt->execute();

     if($results){
       $response = "true";
     }
     /* close statement */
     $stmt->close();
  }
  /* close connection */
  $mysqli->close();

  echo $response;
?>
