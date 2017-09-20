<?php include '../../../functions.php'; ?>
<?
  $mysqli = getConnection();
  $employee_id = $_SESSION['userid'];
  $type = $_POST["type"];

  $stmt =  $mysqli->stmt_init();
  // if($type == "individual"){
  //   $query = "UPDATE employees_stats SET badge_ind_completion = badge_ind_completion + 1 WHERE employee_id = $employee_id"
  // }else{
  //   $query = "UPDATE employees_stats SET badge_ind_completion = badge_ind_completion + 1 WHERE employee_id = $employee_id"
  // }
  if ($stmt->prepare("UPDATE employees_stats SET $type = $type + 1 WHERE employee_id = $employee_id")){
    $stmt->execute();

    /* close statement */
    $stmt->close();
  }
  $mysqli->close();
?>
