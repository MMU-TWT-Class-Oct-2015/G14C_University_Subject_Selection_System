<html>

  <head>
    <meta charset = "utf-8">

  </head>
<body>
  <h1 align =center>Subject Registration</h1>

<?php
  include_once 'functions.php';
  session_start();
?>




<?php

    print("<p>Welcome " . $_SESSION["name"] . "</p>");
    print("<p>Your student ID:  " . $_SESSION["id"] . "</p>");


  /********  STUDENT's YEAR  ********/
   $select = $_SESSION["id"];
   $query ="SELECT Year FROM student where student.ID =".$_SESSION["id"];


    if (!($database = mysql_connect("localhost", "root")))
      die(mysql_error() . "<br>Could not connect to database</body></html>");

    if (!mysql_select_db("twt", $database))
      die(mysql_error() . "<br>Could not open database</body></html>");

    if (!($result = mysql_query($query, $database))) {
      print("<p>User ID not found!</p>");
      die("</body></html>");
    }

?>




<?php
    /********  SUBJECT NAME AND SUBJECT CODE according to STUDENT's YEAR *********/
    $rows = mysql_fetch_array($result);
    $query =  "SELECT subject.Name, subject.ID FROM subject, student WHERE subject.YearOffered = ". $rows['Year']." AND student.Year = subject.YearOffered";

    if (!($database = mysql_connect("localhost", "root")))
      die(mysql_error() . "<br>Could not connect to database</body></html>");

    if (!mysql_select_db("twt", $database))
      die(mysql_error() . "<br>Could not open database</body></html>");

    if (!($result = mysql_query($query, $database))) {
      print("<p>User ID not found!</p>");
      die("</body></html>");
    }

?>
<table border=1>

<?php
      /***********   DISPLAY TABLE **************/
      print("<tr>    <th colspan =2 >#</th>   <th>Subject</th>   <th>Subject Code</th>   <th>Select</th>  </tr>");
      $countSub=0;
      while ($subject = mysql_fetch_row($result)) { // found items stored in variable subject
          $countSub=$countSub+1;
          print("<tr><td colspan=2>$countSub</td>");
          foreach ($subject as $key => $value)

          print("<td> $value </td>");
          print("<td><input type=checkbox name=List value = $value> </td></tr>");



          }

?>

</table>

<form action=enroll.php method="post">
<input type="submit" value="ADD NEW" align=left>
</form>

</body>
</html>
