<?php include '../../../functions.php'; ?>
<?php

  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $username = $_POST['username'];
  $company = $_POST['company'];
  $password = $_POST['password'];
  $response = 'failed';
    $mysqli = getConnection();
    /* create a prepared statement */
    $stmt =  $mysqli->stmt_init();

    if ($stmt->prepare("INSERT INTO user_company (email, username, company, password)
     VALUES (?,?,?,?)")){

       //bind parameters
       $stmt->bind_param("ssss", $email, $username, $company, $password);

       //execute query
       $stmt->execute();

       /* close statement */
       $stmt->close();
       $response = 'success';
    }
    $user_id = $mysqli->insert_id;
    $_SESSION['userid'] = $user_id;

    /* close connection */
    $mysqli->close();

    echo $response;
  ?>
