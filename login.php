<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Subject Registration Sign-in</title>

    <link rel="stylesheet" type="text/css" href="./beauty.css">
  </head>

  <body class="login_page">

  <div class="content">
    <div class="row1">
    <form  method="POST" action="./login_process.php">


        	<h1>STUDENT LOGIN FORM</h1>

          <p>Student ID  <!-- pattern: exactly 10 alphanumeric -->
          <input type="text" name="userid" required pattern="[A-Za-z0-9]{10}" title="10 characters excluding symbols &amp spaces"></p>

          <p>Password  <!-- no pattern, but cannot submit when no password provided -->
          <input type="password" name="passw"  required title="Please enter your password"></p>
          <?php

            if (isset($_GET['error'])) {
            //Determine if a variable ('error') is set and is not NULL
              if ($_GET['error'] == 1)
                echo '<p class="warning">Log in failed!</p>';
              else if ($_GET['error'] == 2)
                echo '<p class="warning">Please log in to proceed!</p>';
            }

            /*
            if(!($_SERVER["HTTPS"])) { // reload using https header if browser not using https connection
              header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
              exit();
            } */
          ?>
    </div>

        <div class ="row2">
          	<a href="./register.php">REGISTER</a>
          <input type="submit" name="Submit" value="Sign In">
        </div>

    </form>

</div>


  </body>

</html>
