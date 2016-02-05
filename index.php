<?php
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

      // display only subject id for now haha
      $query = "SELECT student_subject.SubjectID FROM student_subject WHERE student_subject.StudentID =  " . $_SESSION['id'];

      if (!($database = mysql_connect("localhost", "root")))
        die(mysql_error() . "<br>Could not connect to database</body></html>");

      if (!mysql_select_db("twt", $database))
        die(mysql_error() . "<br>Could not open database</body></html>");

      if (!($result = mysql_query($query, $database))) {
        print("<p>User ID not found!</p>");
        die("</body></html>");
      }

      mysql_close($database);
      print("<p>Welcome " . $_SESSION["name"] . "</p>");
    ?>

    <!-- OUTPUT/DISPLAY STARTS HERE -->
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

    <!-- ADDING & DROPPING SUBJECTS  -->
    <table class="center">

      <form action="add_drop.php" >
      <tr>
        <td height="35">&nbsp;</td>
        <td height="35"><input type="submit" value="Add/Drop Subject"></td>
      </tr>
      </form>
    </table>




  </body>

</html>
