<?php
  include_once 'functions.php';
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Adding or Dropping Subject</title>
    <link rel="stylesheet" type="text/css" href="beauty.css">
  </head>

  <body>
  	<?php
    	 $result = sqlCon("SELECT * FROM subject");
  	?>
    <!-- OUTPUT/DISPLAY STARTS HERE -->
  	<table border = 1>
  		<?php
        print("<p>List of Subjects</p>");

        while ($subject = mysql_fetch_row($result)) { // found items stored in variable subject

          print("<tr>");
          foreach ($subject as $key => $value)
            print("<td>$value</td>");
          print("</tr>");
        }
  	  ?>
  	</table>

    <table class="center">
      <form method="post" action="./addsubject.php" >
        <tr>
          <td align="right">Add Subject</td> <!-- pattern: exactly 10 alphanumeric -->
          <td><input type="text" name="addsub" required pattern = "[A-Z0-9]{7}" title="please input the correct subject ID" </td>
        </tr>

        <tr>
          <td height="35">&nbsp;</td>
          <td height="35"><input type="submit" name="Submit" value="Add Subject"></td>
        </tr>
      </form>

      <form method="post" action="./dropsubject.php" >
        <tr>
          <td align="right">Drop Subject</td> <!-- pattern: exactly 10 alphanumeric -->
          <td><input type="text" name="dropsub" required pattern = "[A-Z0-9]{7}" title="please input the correct subject ID" </td>
        </tr>

        <tr>
          <td height="35">&nbsp;</td>
          <td height="35"><input type="submit" name="Submit" value="Drop Subject"></td>
        </tr>
      </form>

      <form action="./index.php">
        <tr>
          <td height="35"><input type="submit" value="Back"></td>
        </tr>
      </form>
    </table>    
  </body>
</html>
