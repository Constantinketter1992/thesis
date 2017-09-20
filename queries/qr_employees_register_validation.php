<?php include '../../../functions.php'; ?>

<?php

$token = $_POST["token"];
$return = "false";

  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT id, company_id FROM user_employees WHERE token = ?" )) {
    $stmt->bind_param('s', $token);

    $stmt->execute();

    $stmt->bind_result($id, $company_id);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?
      $return = "true";
      while($stmt->fetch()) {
      $_SESSION['userid'] = $id;
      $_SESSION['companyid'] = $company_id;
      }

  	}
    /* close statement */
    $stmt->close();
  }
  /* close connection */
  $mysqli->close();

  echo $return;
?>
