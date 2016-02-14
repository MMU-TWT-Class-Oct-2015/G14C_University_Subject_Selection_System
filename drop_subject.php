<?php
  include './database_conn.php';
  include_once './session_check.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Drop Subject</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">

    <script type="text/javascript">
      // if no subject registered, button will be disabled
      // function might not be useful, as if there's no subject registered,
      // students are not allowed to access drop_subject.php
      function atLeastOne() {
        var totalSubj = document.querySelectorAll('input[type="checkbox"]:checked').length;

        if (totalSubj)
          document.myForm.addSubj.disabled = false;
        else
          document.myForm.addSubj.disabled = true;
      }

      function confirmation() {
        var checkboxes = document.getElementsByName('List[]');
        var totalSubjects = "";

        for (var i=0; i<checkboxes.length; i++) {
          if (checkboxes[i].checked)
          totalSubjects += "\n"+checkboxes[i].value;
        }
        return confirm("Dropping subject(s):" + totalSubjects);
      }

      function goBck() {
        window.location = "./index.php";
      }
    </script>
  </head>

  <body>
    <div class="top">
      <h class="title">Drop Subject</h>
      <input type="button" class= "logout topRight" onclick="window.location='./logout.php'" value="Log out">
    </div>

    <?php
      print("<br><br><p>Welcome " . $_SESSION['name'] . "</p>");
      print("<p>Your student ID:  " . $_SESSION['id'] . "</p>");

      if (isset($_GET['error']))
        print("<p style=color:red>Error adding subject</p>");

      /********  SUBJECT NAME AND SUBJECT CODE according to STUDENT's YEAR *********/
      $sth = $database->prepare("SELECT student_subject.SubjectID, subject.Name FROM subject, student_subject WHERE
                          student_subject.StudentID = " . $_SESSION['id'] . " AND
                          student_subject.SubjectID = subject.ID;");
      $sth->execute();
      $sth->bind_result($SubjectID,$SubjectName);
    ?>

    <form name=myForm method="POST" action=./drop_process.php>
      <table class="table1">
        <?php
          /***********   DISPLAY TABLE **************/
          print("<tr>    <th colspan =2 >#</th>   <th>Subject Code</th>   <th>Subject</th>   <th>Select</th>  </tr>");

          $countSub=0;

          while ($sth->fetch()) { // found items stored in variable subject
            $countSub++;
            print("<tr><td colspan=2>$countSub</td>");
            print("<td><a href='./subject_info.php?subject=$SubjectID&path=drop_subject'>$SubjectID</a></td><td>$SubjectName</td>");
            print("<td><input type='checkbox' name='List[]' value='$SubjectID' onClick='atLeastOne()'> </td></tr>");
          }

          $sth->close();
        ?>
      </table>

      <input type="submit" name="addSubj" value="Confirm" onClick="return confirmation();" disabled>
      <input type="button" value="Back" onClick="goBck()">


    </form>
  </body>

</html>
