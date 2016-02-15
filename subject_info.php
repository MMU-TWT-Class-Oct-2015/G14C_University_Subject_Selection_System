<!DOCTYPE html>

<html>

  <head>
    <meta charset = "utf-8">
    <title>Subject Information</title>

    <link rel="stylesheet" type="text/css" href="beauty.css">
  </head>

  <body>
    <?php
      include './database_conn.php';
      include_once './session_check.php';

      $subject = $_GET['subject'];
      $path = $_GET['path'];

      $sth = $database->prepare("SELECT * FROM subject WHERE ID='$subject' LIMIT 1;");
      $sth->execute();

      $sth->bind_result($SubjectID,$SubjectName,$SubjectYear);

      if ($sth->fetch())
        print("<div class='top'>
                 <h class='title'>$SubjectName</h>
                 <input type='button' class='logout topRight' onclick=window.location='./logout.php' value='Log out'>
              </div>

              <br><br><br>

              <table class='table1'>
                <tr><td>Subject Code</td> <td>$SubjectID</td></tr>
                <tr><td>Subject Name</td> <td>$SubjectName</td></tr>
                <tr><td>Year Offered</td> <td>$SubjectYear</td><tr>
              </table>

              <br>

              <input type='button' value='Back' onclick=window.location='./$path.php'>");

      $sth->close();
    ?>
  </body>

</html>
