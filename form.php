<!DOCTYPE html>

<html>

  <head>
    <meta charset = "utf-8">
    <title>Form Validation</title>
  </head>

  <body>
    <?php
      /*
        ...
        login password verification (take hashed pasword from database and compare)
        ...
      */

      $select = $_POST["userid"];
      $query = "SELECT * FROM student WHERE id = " . $select;

      if (!($database = mysql_connect("localhost", "root")))
        die(mysql_error() . "<br>Could not connect to database</body></html>");

      if (!mysql_select_db("twt", $database))
        die(mysql_error() . "<br>Could not open database</body></html>");

      if (!($result = mysql_query($query, $database))) {
        print("<p>User ID not found!</p>");
        die("</body></html>");
      }

      mysql_close($database);
    ?>

    <table>
      <?php
        /* user[0] = ID
           user[1] = Name
           user[2] = Year
           user[3] = Hashed Password */
        $user = mysql_fetch_row($result);
        print("<p>Welcome " . $user[1] . "</p");
       ?>
     </table>





  </body>

</html>
