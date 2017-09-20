<?php include '../../../functions.php'; ?>

<?php
$username = $_POST['user'];

$return = 'false';

  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT id FROM user_employees WHERE username = '".$username."' ")) {

    $stmt->execute();

    $stmt->bind_result($med_id);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?

    	/* fetch the result of the query & loop round the results */
      $return= 'true';
  	}
    /* close statement */
    $stmt->close();
  }
  /* close connection */
  $mysqli->close();

  echo $return;

?>
