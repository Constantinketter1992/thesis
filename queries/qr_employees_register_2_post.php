<?php include '../../../functions.php'; ?>
<?php

  $username = $_POST['user'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $id = $_SESSION['userid'];
  $response = 'failed';
    $mysqli = getConnection();
    /* create a prepared statement */
    $stmt =  $mysqli->stmt_init();

    if ($stmt->prepare("UPDATE user_employees SET  name=?, username=?, password=?
     WHERE id = ?")){

       //bind parameters
       $stmt->bind_param("sssi", $name, $username, $password, $id);

       //execute query
       $results = $stmt->execute();

       if($results){
         $response = 'success';
       }
       /* close statement */
       $stmt->close();
    }
    /* close connection */
    $mysqli->close();

    echo $response;
  ?>
