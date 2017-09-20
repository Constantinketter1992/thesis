<?php include '../../../functions.php'; ?>

<?php
//get connection
$mysqli = getConnection();
$data = [];
$company_id = $_SESSION['userid'];

  // /* create a prepared statement */
  // $stmt =  $mysqli->stmt_init();

  $query = "SELECT awardType, awardDetails, level, t_completion, t_winner, p_completion, p_winner, p_cutoff FROM company_longterm WHERE company_id= $company_id";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        $data[] = $row;
    }
  }else{
    $data = [];
  }
  $mysqli->close();

  echo json_encode($data, true);
?>
