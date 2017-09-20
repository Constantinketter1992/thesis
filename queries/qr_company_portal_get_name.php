<?php include '../../../functions.php'; ?>

<?php
//get connection
$mysqli = getConnection();

$company_id = $_SESSION['userid'];

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();

  $query = "SELECT company FROM user_company WHERE id= $company_id";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    $data = "suh";
    while($row = $result->fetch_object()) {
        $data = $row;
    }
  }else{
    $data = "nada";
  }
  $mysqli->close();

  echo json_encode($data, true);
?>
