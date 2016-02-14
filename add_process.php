<?php
  include './session.php';

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

  foreach($_POST['List'] as $SubjectID) {
    if (!$sth = $database->prepare("INSERT INTO student_subject (StudentID, SubjectID) VALUES (?,?)")) // prepare statement
      header("location: ./add_subject.php?error=1");

    $sth->bind_Param("ss", $_SESSION['id'], $SubjectID); // bind_param is used for modify records
    //2 parameter, "ss" - 1st para= string, 2nd para = string
    if (!$sth->execute())
      header("location: ./add_subject.php?error=1");

    $sth->close();
  }
  $database->close();

  header("location: ./index.php?add=1");
?>
