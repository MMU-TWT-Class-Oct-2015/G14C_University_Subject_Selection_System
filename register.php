<!DOCTYPE html>

<html>

<head>
  <meta charset = "utf-8">
  <title>Register Student Account</title>

  <link rel="stylesheet" type="text/css" href="beauty.css">

  <script type="text/javascript">
  </script>
</head>

<body>
  <p>Student Registration</p>

  <form method="post" action="form.php">
    <table class="center">
      <tr>
        <td align="right">User ID</td> <!-- pattern: exactly 10 alphanumeric -->
        <td><input type="text" name="userid" required pattern="[A-Za-z0-9]{10}" title="10 characters excluding symbols &amp spaces"></td>
      </tr>

      <tr>
        <td align="right">New Password</td> <!-- pattern: any characters(byte) from 6-20 -->
        <td><input type="password" name="passw1"  required pattern=".{6,20}" title="Password must be 6 to 20 characters long" onchange="
          if (this.checkValidity())
            form.passw2.pattern = this.value;
        "></td> <!-- on change, if passw1 pattern is correct, passw2's pattern condition is replaced with the value entered in passw1 -->
      </tr>

      <tr>
        <td align="right">Confirm Password</td>
        <td><input type="password" name="passw2" required title="Enter same password"></td>
      </tr>

      <tr>
        <td align="right">Name</td>
        <td><input type="text" name="username" required title="Enter your name"></td>
      </tr>

      <tr>
        <td height="35">&nbsp;</td>
        <td height="35"><input type='submit' name="Submit" value="Register" onclick="return verification(this)"></td>
      </tr>
    </table>
  </form>

  <form action="login.html">
    <input type="submit" value="Back" class="botRight">
  </form>
</body>

</html>