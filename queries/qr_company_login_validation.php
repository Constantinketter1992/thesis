<?php include '../../../functions.php'; ?>

<?php

$password = $_POST['password'];
$user = $_POST['user'];
$return = "false";

  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT id FROM user_company WHERE username = ? AND password = ?" )) {
    $stmt->bind_param('ss', $user, $password);

    $stmt->execute();

    $stmt->bind_result($id);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?
      $return = "true";
    	/* fetch the result of the query & loop round the results */
      while($stmt->fetch()) {
      $_SESSION['userid'] = $id;
      }
  	}
    /* close statement */
    $stmt->close();
  }
  /* close connection */
  $mysqli->close();

  echo $return;
?>
