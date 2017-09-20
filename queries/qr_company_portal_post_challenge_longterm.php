<?php include '../../../functions.php'; ?>
<?
  $response = "fail";
  $mysqli = getConnection();
  $object = $_POST['object'];
  $company_id = $_SESSION["userid"];

  $stmt = $mysqli->stmt_init();

  if($stmt->prepare("INSERT INTO company_longterm (company_id, awardType, awardDetails, level, t_completion, t_winner, p_completion, p_winner, p_cutoff) VALUES (?,?,?,?,?,?,?,?,?)")){

    $stmt->bind_param("issiiiiii", $company_id, $object["awardType"], $object["awardDetails"], $object["level"], $object["n_t_completion"], $object["n_t_winner"], $object["n_p_completion"], $object["n_p_winner"], $object["n_p_cutoff"]);

    if($stmt->execute()){
      $response = 'success';
    }

    $stmt->close();
  }
  $mysqli->close();
  echo $response;
?>
