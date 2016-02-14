<?php
  include './session.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Add Subject</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">
    
    <script type="text/javascript">
      // if checked box + registered subject is more than 5, button will be disabled
      function atLeastOne(val) {
        var totalSubj = document.querySelectorAll("input[type='checkbox']:checked").length + val;

        if ( totalSubj > 1 && totalSubj < 6 )
          document.myForm.addSubj.disabled = false;
        else
          document.myForm.addSubj.disabled = true;
      }

      function confirmation() {
        var checkboxes = document.getElementsByName('List[]');
        var vals = "";

        for (var i=0; i<checkboxes.length; i++) {
          if (checkboxes[i].checked)
            vals += "\n" + checkboxes[i].value;
        }
        return confirm("Adding subject(s):" + vals);
      }

      function goBck() {
        window.location = "./index.php";
      }
    </script>
  </head>

  <body>
    <h1 align =center>Subject Registration</h1>

    <?php
      print("<p>Welcome " . $_SESSION['name'] . "</p>");
      print("<p>Your student ID:  " . $_SESSION['id'] . "</p>");

      if (isset($_GET['error']))
        print("<p style=color:red>Error adding subject</p>");

      $database = new mysqli("localhost","root","","twt");
      if (mysqli_connect_errno())
        printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());

      /********  SUBJECT NAME AND SUBJECT CODE according to STUDENT's YEAR *********/
      $sth = $database->prepare("SELECT subject.ID,subject.Name FROM subject
                                 WHERE subject.YearOffered = (SELECT Year FROM student
                                   WHERE student.ID = " . $_SESSION['id'] . ")
                                 AND subject.ID NOT IN(
  		                             SELECT student_subject.SubjectID FROM student_subject
     		                           WHERE student_subject.StudentID = " . $_SESSION['id'] . ");");
      $sth->execute();
      $sth->bind_result($SubjectID,$SubjectName);
    ?>

    <form name=myForm method="POST" action=./add_process.php>
      <table border=1>
        <?php
          /***********   DISPLAY TABLE **************/
          print("<tr>    <th colspan =2 >#</th>   <th>Subject Code</th>   <th>Subject</th>   <th>Select</th>  </tr>");

          $countSub=0;

          while ($sth->fetch()) { // found items stored in variable subject
            $countSub++;
            print("<tr><td colspan=2>$countSub</td>");
            print("<td><a href='./subject_info.php?subject=$SubjectID&path=add_subject'>$SubjectID</a></td><td>$SubjectName</td>");
            print("<td><input type='checkbox' name='List[]' value='$SubjectID' onClick='atLeastOne($_SESSION[totalSubj])'> </td></tr>");
          }
        ?>
      </table>

      <table>
        <tr>
          <td><input type="submit" name="addSubj" value="Confirm" onClick="return confirmation();" disabled></td>
          <td><input type="button" value="Back" onClick="goBck()"></td>
        </tr>
      </table>
    </form>
  </body>

</html>
