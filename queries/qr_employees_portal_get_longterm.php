<?php include '../../../functions.php'; ?>

<?php


$company_id = $_SESSION['companyid'];
$data=[];

  //get connection
  $mysqli = getConnection();


  $query="SELECT awardType as type, awardDetails as details, level,t_completion as alliance,t_winner as warriors,p_completion as league,p_winner as champion,p_cutoff as elite FROM company_longterm WHERE company_id = $company_id";

  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        $data [] = $row;
    }
  }else{
    $data = "false";
  }
  $mysqli->close();
  echo json_encode($data, JSON_NUMERIC_CHECK);
  ?>
