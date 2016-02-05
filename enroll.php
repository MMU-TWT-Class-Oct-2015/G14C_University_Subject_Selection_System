<html>
<body>
<?php
  include_once 'functions.php';
  session_start();

?>
<script type="text/javascript">
<!--
  function confirmation() {
      var answer = confirm("You are required to reset subjects")
          if (answer){
            window.location = "/nima/registerform.php";;
          }
          else{
            alert("Please fulfill the requirement inorder to proceed ")
          }
}

  function goBck(){
    window.location = "/nima/registerform.php";;
  }

</script>
<table border=1>

<?php
if(isset($_POST['submit'])){//to run PHP script on submit
  print("<tr><th>Selected Subjects</th></tr>");
  // Loop to store and display SUBJECTS of individual checked checkbox.
  foreach($_POST['List'] as $selected){

  print("<tr><td>$selected</td></tr>");

  }



$List=$_POST['List'];
$count = count($List);

if ($count<2){
  print("<p style=color:red> Report :Minimum 2 subjects!<br>You selected $count subjects!</p> ");
  print("<script language='javascript' type='text/javascript'>");
  print("confirmation()");
  print("</script>");


}
else if ($count >5){
  print("<p style=color:red> Report :Maximum 5 subjects!<br>You selected $count subjects!</p> ");
  print("<script language='javascript' type='text/javascript'>");
  print("confirmation()");
  print("</script>");

}

}



?>
</table>
<input type=button name=goBack value=Back onclick="goBck();"/>
<input type=submit name=registerSub value=Enroll >

</body>
</html>
