<?php
  session_start();

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection failed: ", mysqli_connect_error());

  var $fail=false;

  foreach($_POST['List'] as $subjectID) {
    if (!$sth = $database->prepare("DELETE FROM student_subject WHERE StudentID=? AND SubjectID =?;"))  {// prepare statement
      print("<p> drop unsuccessful </p>");
      $fail = true;
    }

    $sth->bind_Param("ss", $_SESSION['id'], $subjectID); // bind_param is used for modify records

    if (!$sth->execute()) {
      print("<p> drop unsuccessful </p>");
      $fail = true;
    }

    $sth->close();
  }
  $database->close();

  if ($fail == false)
    print("<p> drop successful </p>");
?>

<!DOCTYPE html>
<html>
  <input type="button" onclick="location.href='./index.php';" value="home" />
</html>
