<?php include '../../../functions.php'; ?>

<?php
if(!empty($_POST['email'])){
  $data = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $type = 'email';
}else{
  $data = $_POST['username'];
  $type = 'username';
}

$return = 'false';

  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT id FROM user_company WHERE ".$type." = '".$data."' ")) {

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
