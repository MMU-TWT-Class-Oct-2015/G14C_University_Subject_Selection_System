<?php
  include_once 'functions.php';

  session_start();

    if (login($_POST['userid'], $_POST['passw'], $mysqli))
        header('Location: ./index.php');
    else
        header('Location: ./login.php?error=1');
 ?>
