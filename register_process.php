<!DOCTYPE html>
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
      //string mysql_escape_string ( string $unescaped_string )
      //escape string = JavaScript%20is%20fun%21
      //unescape      = JavaScript is fun!
      //process escape string then send to mysql query to enhance security and prevent sql injection
      $userid = mysql_escape_string($_POST['userid']);
      $passw1 = mysql_escape_string($_POST['passw1']);
      $username=$_POST['username'];
      $year=$_POST['year_study'];

      /***** hashed password *****/
      $password = hash('sha512', $passw1);

      if (!($database = mysql_connect("localhost", "root")))
        die(mysql_error() . "<br><p>Could not connect to database</p>
                             <input type='button' value='Back' onclick=window.location='./register.php'></body></html>");

      if (!mysql_select_db("twt", $database))
        die(mysql_error() . "<br><p>Could not open database</p>
                             <input type='button' value='Back' onclick=window.location='./register.php'></body></html>");

      $query="SELECT ID FROM student WHERE ID ='" . $userid . "';";

      // check if user exists
      $result = mysql_query($query, $database);
      if (mysql_num_rows($result))
        header("Location: ./register.php?userexists=1");

      $query ="INSERT INTO student( `ID`,`Name`,`Year`,`Password`) VALUES ('".$userid."', '".$username."','".$year."','".$password."' )";

      if (!($result = mysql_query($query, $database))) {
        die(mysql_error() . "<br><p>Error registering user</p>
                             <input type='button' value='Back' onclick=window.location='./register.php'></body></html>");
       }

       mysql_close($database);
       echo "<script language='javascript' type='text/javascript'>
               successful();
             </script>";
     ?>
  </body>
</html>
