<?php
  session_start();

  $id = $_POST['userid'];
  $password = $_POST['passw'];

  // establish connection + error handling
  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

  if (!$sth = $database->prepare("SELECT Name, Password FROM student WHERE id = " . $id . " LIMIT 1")) // if user doesn't exists
    header("location: ./login.php?error=1");

  $sth->execute();
  //execute: run query (prepare statement)
  $sth->bind_result($Name,$hashedPw);
  //bind variables to a prepared statement for result storage
  $sth->fetch();
  //fetch results from the prepared statement into the bound variables
  //store name --> $name & Password --> $hashedPw

  $password = hash("sha512", $password); // hash entered password

  if ($hashedPw == $password) { // compares both hashed password
    // session variables storing info. of users
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $Name;

    header("location: ./index.php");
  } else
    header("location: ./login.php?error=1"); //login failed
 ?>
