<?php
  function login($id, $password, $mysqli) {

    $result = sqlCon("SELECT Name, Password FROM student WHERE id = " . $id . " LIMIT 1");
    /* user[0] = Name
       user[1] = Hashed Password */
    $user = mysql_fetch_row($result);

    $password = hash('sha512', $password); // hash entered password

      if ($user[1] == $password) { // compares both hashed password
        // session variables storing info. of users
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $user[0];

        return true;
      }
      else
        return false;
  }
  
  function sqlCon($query) {

    if (!($database = mysql_connect("localhost", "root")))
      die(mysql_error() . "<br>Could not connect to database</body></html>");

    if (!mysql_select_db("twt", $database))
      die(mysql_error() . "<br>Could not open database</body></html>");

    if (!($result = mysql_query($query, $database))) {
      print("<p>User ID not found!</p>");
      die("</body></html>");
    }

    mysql_close($database);

    return $result;
  }
 ?>
