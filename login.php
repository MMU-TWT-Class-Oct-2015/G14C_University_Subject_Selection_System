<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Subject Registration Sign-in</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">
  </head>

  <body>
    <p>Subject Registration</p>

    <form method="POST" action="./login_process.php">
      <table class="center">
        <tr>
          <td align="right">User ID</td> <!-- pattern: exactly 10 alphanumeric -->
          <td><input type="text" name="userid" required pattern="[A-Za-z0-9]{10}" title="10 characters excluding symbols &amp spaces"></td>
        </tr>

        <tr>
          <td align="right">Password</td>  <!-- no pattern, but cannot submit when no password provided -->
          <td><input type="password" name="passw"  required title="Please enter your password"></td>
          <?php

            if (isset($_GET['error'])) {
            //Determine if a variable ('error') is set and is not NULL
              if ($_GET['error'] == 1)
                echo '<td style=color:red>Log in failed!</td>';
              else if ($_GET['error'] == 2)
                echo '<td style=color:red>Please log in to proceed!</td>';
            }

            /*
            if(!($_SERVER["HTTPS"])) { // reload using https header if browser not using https connection
              header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
              exit();
            } */
          ?>
        </tr>

        <tr>
          <td height="35">&nbsp;</td>
          <td height="35"><input type="submit" name="Submit" value="Sign In"></td>
        </tr>
      </table>
    </form>

    <form action="./register.php">
      <input type="submit" value="Register" class="botRight">
    </form>
  </body>

</html>
