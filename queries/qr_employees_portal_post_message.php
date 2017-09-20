<?php include '../../../functions.php'; ?>
<?
  $response = "fail";
  $mysqli = getConnection();
  $message = $_POST['message'];
  $company_id = $_SESSION["companyid"];
  $employee_id = $_SESSION["userid"];
  $goal_id = $_SESSION["goalid"];
  $group_id = $_SESSION["groupid"];

  $stmt = $mysqli->stmt_init();

  if($stmt->prepare("INSERT INTO employees_chat (employee_id, name, company_id, goal_id, group_id, message, date) VALUES (?,?,?,?,?,?,NOW())")){

    $stmt->bind_param("isiiis", $employee_id, $message["name"], $company_id, $goal_id, $group_id, $message["message"]);

    if($stmt->execute()){
      $response = 'success';
    }

    $stmt->close();
  }
  $mysqli->close();
  echo $response;
?>
