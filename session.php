<?php
  session_start();

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

  $sth = $database->prepare("SELECT ID FROM student WHERE ID='$_SESSION[id]';");
  $sth->execute();

  // redirect to login page if user access page w/o loggin in
  if (!$sth->fetch())
    header("Location: ./login.php");
?>
