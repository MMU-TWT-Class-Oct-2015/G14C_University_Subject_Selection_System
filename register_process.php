<!DOCTYPE html>
<?php
  include_once 'functions.php';
?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>Register Validation</title>
  </head>

  <script>
    function successful(){
      alert("Register successful!");
      window.location="./login.php";;

    }
  </script>

  <body>
    <?php
      /***** Get ID & PASSWD *****/
      $userid = mysql_escape_string($_POST['userid']);
      $passw1 = mysql_escape_string($_POST['passw1']);
      $username=$_POST['username'];
      $year=$_POST['year_study'];

      /***** hashed password *****/
      $password = hash('sha512', $passw1);

      /****** Insert Data *******/
      $query ="INSERT INTO student( `ID`,`Name`,`Year`,`Password`) VALUES ('".$userid."', '".$username."','".$year."','".$password."' )";

       if (!($database = mysql_connect("localhost", "root")))
         die(mysql_error() . "<br>Could not connect to database</body></html>");

       if (!mysql_select_db("twt", $database))
         die(mysql_error() . "<br>Could not open database</body></html>");

       if (!($result = mysql_query($query, $database))) {
         print("<p>User ID not found!</p>");
         die("</body></html>");
       }

       mysql_close($database);
       print("<p> Register successful </p>");
       print("<script language='javascript' type='text/javascript'>");
       print("successful()");
       print("</script>");
     ?>
  </body>
</html>
