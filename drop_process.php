<?php
  include './database_conn.php';
  include_once './session_check.php';

  foreach($_POST['List'] as $SubjectID) {
    if (!$sth = $database->prepare("DELETE FROM student_subject WHERE StudentID=? AND SubjectID =?;")) // prepare statement
      header("location: ./drop_subject.php?error=1");

    $sth->bind_Param("ss", $_SESSION['id'], $SubjectID); // bind_param is used for modify records

    if (!$sth->execute())
      header("location: ./drop_subject.php?error=1");

    $sth->close();
  }
  $database->close();

  header("location: ./index.php?drop=1");
?>
