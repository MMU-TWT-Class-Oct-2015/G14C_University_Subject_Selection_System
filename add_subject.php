<?php
  session_start();

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection failed: ", mysqli_connect_error());

  foreach($_POST['List'] as $subjectID) {
    if (!$sth = $database->prepare("INSERT INTO student_subject (StudentID, SubjectID) VALUES (?,?)")) // prepare statement
      header('Location: ./add_subject.php?error=1');

    $sth->bind_Param('ss', $_SESSION['id'], $subjectID); // bind_param is used for modify records

    if (!$sth->execute())
      header('Location: ./add_subject.php?error=1');

    $sth->close();
  }
  $database->close();

  header('Location: ./index.php?success=1');
?>
