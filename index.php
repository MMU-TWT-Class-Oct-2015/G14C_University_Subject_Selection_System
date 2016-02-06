<?php
  include_once 'functions.php';
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>home</title>
  </head>

  <body>
    <?php
      $result = sqlCon("SELECT student_subject.SubjectID FROM student_subject WHERE student_subject.StudentID =  " . $_SESSION['id']);
      print("<p>Welcome " . $_SESSION["name"] . "</p>");
    ?>

    <table border=1>
      <?php
        print("<p>Registered Subject</p>");
        while ($subject = mysql_fetch_row($result)) { // found items stored in variable subject

          print("<tr>");
          foreach ($subject as $key => $value)
            print("<td>$value</td>");
          print("</tr>");
        }
      ?>
    </table>

    <table class="center">
      <form action="./add_drop.php" >
        <tr>
          <td height="35">&nbsp;</td>
          <td height="35"><input type="submit" value="Add/Drop Subject"></td>
        </tr>
      </form>
    </table>
  </body>
</html>
