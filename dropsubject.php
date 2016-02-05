<?php
  session_start();
?>


<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>ADD_DROP Subject</title>
  </head>

  <body>

<?php

  $dropsub = $_POST['dropsub'];
  $query  = "";

  if (!($database = mysql_connect("localhost", "root")))
    die(mysql_error() . "<br>Could not connect to database</body></html>");

  if (!mysql_select_db("twt", $database))
    die(mysql_error() . "<br>Could not open database</body></html>");

  if (!($result = mysql_query($query, $database))) {
    print("<p> drop not successful </p>");
    die("</body></html>");
  }

  mysql_close($database);

  print("<p> drop successful </p>");
?>



 </body>

</html>
