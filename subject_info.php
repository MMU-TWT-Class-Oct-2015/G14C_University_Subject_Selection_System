<?php
  include './session.php';

  $subject = $_GET['subject'];
  $path = $_GET['path'];

  $database = new mysqli("localhost","root","","twt");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

  $sth = $database->prepare("SELECT * FROM subject WHERE ID='$subject' LIMIT 1;");
  $sth->execute();

  $sth->bind_result($SubjectID,$SubjectName,$SubjectYear);

  if ($sth->fetch())
    print("<table border=0>
             <tr><td>Subject Code</td> <td>$SubjectID</td></tr>
             <tr><td>Subject Name</td> <td>$SubjectName</td></tr>
             <tr><td>Year Offered</td> <td>$SubjectYear</td><tr>
           </table>");

  print ("<br><input type='button' value='Back' onclick=window.location='./$path.php'>");
?>
