<?php include '../../../functions.php'; ?>
<?
  $mysqli = getConnection();
  $employee_id = $_SESSION['userid'];
  $xp = $_POST["xp"];

  $stmt =  $mysqli->stmt_init();
  if ($stmt->prepare("UPDATE employees_stats SET xp = xp + $xp WHERE employee_id = $employee_id")){
    $stmt->execute();

    /* close statement */
    $stmt->close();
  }
  $mysqli->close();
?>
