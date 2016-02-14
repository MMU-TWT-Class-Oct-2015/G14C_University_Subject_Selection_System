<?php
  session_start();

  $sth = $database->prepare("SELECT ID FROM student WHERE ID='$_SESSION[id]';");
  $sth->execute();

  // redirect to login page if user access page w/o loggin in
  if (!$sth->fetch())
    header("Location: ./login.php?error=2");

  $sth->close();
?>
