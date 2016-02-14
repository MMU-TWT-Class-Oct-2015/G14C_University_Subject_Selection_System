<?php
  include './database_conn.php';
  include_once './session_check.php';
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Add Subject</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">

    <script type="text/javascript">
      // if checked box + registered subject is more than 5, button will be disabled
      // function is called each time checkbox is being ticked
      // val supplied $_SESSION[totalSubj]
      function atLeastOne(val) {
        var totalSubj = document.querySelectorAll("input[type='checkbox']:checked").length + val;

        if ( totalSubj > 1 && totalSubj < 6 )
          document.myForm.addSubj.disabled = false;
        else
          document.myForm.addSubj.disabled = true;
      }

      //function is called when confirm button is pressed
      function confirmation() {
        var checkboxes = document.getElementsByName('List[]');
        var totalSubjects = "";

        for (var i=0; i<checkboxes.length; i++) {
          if (checkboxes[i].checked) //checkboxes -- ticked
            totalSubjects += "\n" + checkboxes[i].value; //stored "ticked - subject name" into vals
        }
        return confirm("Adding subject(s):" + totalSubjects); //display confirmation msg - "ticked - subject name"
      }

      //function is called when Back button is pressed
      function goBck() {
        window.location = "./index.php";
      }
    </script>
  </head>

  <body>
    <div>
      <h>Subject Enrollment</h>
      <input type="button" class= "logout topRight" onclick="window.location='./logout.php'" value="Log out">
    </div>

    <?php
      print("<br><br><p>Welcome " . $_SESSION['name'] . "</p>");
      print("<p>Your student ID:  " . $_SESSION['id'] . "</p>");

      if (isset($_GET['error']))
        print("<p style=color:red>Error adding subject</p>");

      /********  SUBJECT NAME AND SUBJECT CODE according to STUDENT's YEAR *********/
      //added subjects will not be displayed
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
            //print the "1", "2", "3"
            print("<td><a href='./subject_info.php?subject=$SubjectID&path=add_subject'>$SubjectID</a></td><td>$SubjectName</td>");
            //SubjectID linked to subject_info providing more info
            print("<td><input type='checkbox' name='List[]' value='$SubjectID' onClick='atLeastOne($_SESSION[totalSubj])'> </td></tr>");
            //array List to stored $subjectID value
            //Each time checkbox is clicked, function atleastOne($_SESSION[totalSubj]) is called
            //$_SESSION[totalSubj] --> index.php, (after displaying all the registered subject)

          }

          $sth->close();
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
