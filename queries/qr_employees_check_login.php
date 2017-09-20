<?php include '../../../functions.php'; ?>
<?php


if(isset($_SESSION['userid'])){
  echo json_encode(true);
}else{
  echo json_encode(false);
}

?>
