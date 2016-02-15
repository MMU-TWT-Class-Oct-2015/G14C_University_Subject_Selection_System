<!DOCTYPE html>

<html>

  <head>
    <meta charset = "utf-8">
    <title>Register Student Account</title>

    <link rel="stylesheet" type="text/css" href="beauty.css">

    <script type="text/javascript">
    </script>
  </head>

  <body class="background">
    <div class="register">
      <h2 >Student Registration</h2>

        <div class="register_content">
          <form method="post"  action="./register_process.php" >
            <!-- pattern: exactly 10 alphanumeric -->
            <p>User ID              <input type="text" name="userid" required pattern="[A-Za-z0-9]{10}" title="10 characters excluding symbols &amp spaces"/> </p>
            <!-- pattern: any characters(byte) from 6-20 -->
            <p>New Password        <input type="password" name="passw1"  required pattern=".{6,20}" title="Password must be 6 to 20 characters long" onchange="
              if (this.checkValidity())
                form.passw2.pattern = this.value;
            "/></p>
            <!-- on change, if passw1 pattern is correct, passw2's pattern condition is replaced with the value entered in passw1 -->
            <p>Confirm Password    <input type="password" name="passw2" required title="Enter same password"/></p>
            <p>Name                <input type="text" name="username" required title="Enter your name"/></p>
            <p>Current Level       <select name="year_study"/>
                                     <option value="1">Beta Year</option>
                                     <option value="2">Gamma Year</option>
                                     <option value="3">Delta Year</option>
                                   </select></p>

            <input type='submit' name="Submit" value="Register" style="float: left";  >
          </form>

        <form action="./login.php">
          <input type="submit" value="Back"  >
          <input type="submit" value="Back" class="botRight">
        </form>
      </div>
    </div>
  </body>

</html>
