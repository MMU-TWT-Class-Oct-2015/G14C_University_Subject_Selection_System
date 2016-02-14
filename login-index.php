<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">
  </head>

  <body>
    <?php
      // display ALERT BOX when redirected from other page
      if (isset($_GET["add"])) // enrolled successfully
        echo "<script language='javascript'>
                alert('Subject successfully enrolled! :D');
              </script>";

      if (isset($_GET["drop"])) // enrolled successfully
        echo "<script language='javascript'>
                alert('Subject successfully dropped! :D');
              </script>";

      print("<p>Welcome " . $_SESSION['name'] . "</p>");
    ?>

    <table border=1>
      <?php
        print("<caption>Registered Subject</caption>");

        $database = new mysqli("localhost","root","","twt");
        if (mysqli_connect_errno())
          printf("<p style=color:red>Connection failed: ", mysqli_connect_error());

        $sth = $database->prepare("SELECT student_subject.SubjectID, subject.Name FROM subject, student_subject WHERE
                            student_subject.StudentID = " . $_SESSION['id'] . " AND
                            student_subject.SubjectID = subject.ID;");
        $sth->execute();
        $sth->bind_result($SubjectID,$SubjectName);

        while ($sth->fetch()) {
          print("<tr>
                  <td>$SubjectID</td><td>$SubjectName</td>
                 </tr>");
        }

        print"</table>";

        // session subj contain total number of subject student has registered
        // it is used to add with total number of checked subject(s) in registerform.php to ensure
        // to ensure selected subject(s) not more than 5
        $_SESSION['totalSubj'] = $sth->num_rows;

        print("<table>
                <tr>
                  <form action='./add_subject.php' >
                    <td height='35'><input type='submit' value='Add Subject'></td>
                  </form>

                  <form action='./drop_subject.php'>
                    <td height='35'><input type='submit' value='Drop Subject'></td>
                  </form>
                </tr>
               </table>");
      ?>
  </body>
</html>