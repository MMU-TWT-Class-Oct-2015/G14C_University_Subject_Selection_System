<?php
  function login($id, $password, $mysqli) {

    // connect database + query
    $query = "SELECT Name, Password FROM student WHERE id = " . $id . " LIMIT 1";

    if (!($database = mysql_connect("localhost", "root")))
      return false;

    if (!mysql_select_db("twt", $database))
      return false;

    if (!($result = mysql_query($query, $database)))
      return false;

    mysql_close($database);
    
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
 ?>
