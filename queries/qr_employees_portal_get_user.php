<?php include '../../../functions.php'; ?>

<?php


$id = $_SESSION['userid'];
$return = "false";

  //get connection
  $mysqli = getConnection();

  /* create a prepared statement */
  $stmt =  $mysqli->stmt_init();

  if ($stmt->prepare("SELECT user_employees.company_id, user_employees.name, user_company.company, user_employees.fitbit_access_token, user_employees.fitbit_id FROM user_employees JOIN user_company ON user_employees.company_id = user_company.id AND user_employees.id = ?" )) {
    $stmt->bind_param('i', $id);

    $stmt->execute();

    $stmt->bind_result($company_id, $name,$company, $token, $fitbit_id);

    $stmt->store_result();

  	if($stmt->num_rows){// are there any results?
    	/* fetch the result of the query & loop round the results */
      while($stmt->fetch()) {
        $_SESSION['userid'] = $id;
        $_SESSION['companyid'] = $company_id;
        $return = [$id, $company_id,$name,$company,$token,$fitbit_id];
      }
  	}
    /* close statement */
    $stmt->close();
  }
  /* close connection */
  $mysqli->close();

  echo json_encode($return);
?>
