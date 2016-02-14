<?php
  include './session.php'
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">
  </head>

  <body>
    <div>
      <h>Home</h>
      <input type="button" class= "button topRight" onclick="window.location='./logout.php'" value="Log out">
    </div>

    <?php
      // display ALERT BOX when redirected from other page
      if (isset($_GET['add'])) // enrolled successfully
        echo "<script language='javascript'>
                alert('Subject successfully enrolled! :D');
              </script>";

      if (isset($_GET['drop'])) // enrolled successfully
        echo "<script language='javascript'>
                alert('Subject successfully dropped! :D');
              </script>";

      print("<br><br><p>Welcome " . $_SESSION['name'] . "</p>");

      $database = new mysqli("localhost","root","","twt");
      if (mysqli_connect_errno())
        printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

      $sth = $database->prepare("SELECT student_subject.SubjectID, subject.Name FROM subject, student_subject WHERE
                            student_subject.StudentID = " . $_SESSION['id'] . " AND
                            student_subject.SubjectID = subject.ID;");
      $sth->execute();
      $sth->bind_result($SubjectID,$SubjectName);

      // disable button if no subject registered
      $disabled = "disabled";

      // unable to use num_rows before fetch
      if ($sth->fetch()) {
        print("<table border=1>");
        print("<caption>Registered Subject</caption>");
        print("<tr>
               <td><a href='./subject_info.php?subject=$SubjectID&path=index'>$SubjectID</a></td><td>$SubjectName</td>
               </tr>");
        //subjectID is a link to subject_info (provide more info on the subject)
        //parameter send through link subject=$subjectID & path=index
        //path is use for back purposes, when back is called, header will change back to index.php

        while ($sth->fetch()) {
          print("<tr>
                 <td><a href='./subject_info.php?subject=$SubjectID&path=index'>$SubjectID</a></td><td>$SubjectName</td>
                 </tr>");
        }
        print"</table>";
        $disabled = "";
      } else
        print("You have not enrolled in any of the subjects");
        // session subj contain total number of subject student has registered
        // it is used to add with total number of checked subject(s) in registerform.php
        // to ensure selected subject(s) not more than 5
        $_SESSION['totalSubj'] = $sth->num_rows;

        print("<table>
                <tr>
                  <form action='./add_subject.php' >
                    <td height='35'><input type='submit' value='Add Subject'></td>
                  </form>

                  <form action='./drop_subject.php'>
                    <td height='35'><input type='submit' value='Drop Subject' $disabled></td>
                  </form>
                </tr>
               </table>");
      ?>
  </body>
</html>
