<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Adding Subject</title>
  </head>

  <body>

<?php
  $addsub = $_POST['addsub'];
  $query = "";
  //echo addsub;
  if (!($database = mysql_connect("localhost", "root")))
    die(mysql_error() . "<br>Could not connect to database</body></html>");
  if (!mysql_select_db("twt", $database))
    die(mysql_error() . "<br>Could not open database</body></html>");
  if (!($result = mysql_query($query, $database))) {
    print("<p> add not successful </p>");
    die("</body></html>");
  }
  mysql_close($database);
  print("<p> add successful </p>");
?>



 </body>

</html>
