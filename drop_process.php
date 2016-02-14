<?php
  session_start();

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection failed: ", mysqli_connect_error());

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
