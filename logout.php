<?php
  session_start();
  session_unset();
  header("Location: ./login.php?logout=1");
?>
