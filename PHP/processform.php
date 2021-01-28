<?php
  

// Read the form values

$success = false;

$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";

$projectname = isset( $_POST['projectname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['projectname'] ) : "";

$projectdescription = isset( $_POST['projectdescription'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['projectdescription'] ) : "";

$timeframe = isset( $_POST['timeframe'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['timeframe'] ) : "";

$budget = isset( $_POST['budget'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['budget'] ) : "";

$formTitle = $_POST['sendMessage'];

$emailErr = "";
 
if (empty($_POST["email"]))
    {
         $email = "ferreira1235@gmail.com";
         
    } else {
         
        $email = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
         
    }
 
 
// Email format
$msg = "
 
<html>
 
<body style=\" background-color:#efefef; font-family: arial, helvetica, sans-serif; \">
<table width=\"600\" border=\"0\" bordercolor=\"#ffffff\" align=\"center\" cellpadding=\"10\" cellspacing=\"10\" bgcolor=\"#ffffff\" style=\"padding:0 20px;\">
 
    <tr>
        <td colspan=\"2\"><h2>$formTitle</h2></td>
    </tr>
    <tr>
        <td colspan=\"2\" style=\"border-bottom:1px solid #898989;\">The following visitor would like you to contact them.</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Name:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989; text-transform:capitalize\">$name</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Project Name:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989; \">$projectname</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Email:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989;\">$email</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Project Description:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989;\">$projectdescription</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Time Frame:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989;\">$timeframe</td>
    </tr>
    <tr>
        <td width=\"30%\" style=\"border-bottom:1px solid #898989;\">Budget:</td>
        <td width=\"60%\" style=\"border-bottom:1px solid #898989;\">$budget</td>
    </tr>
    <tr>
        <td colspan=\"2\">&nbsp;</td>
    </tr>
 
</table>
</body>
</html>
";
 
 
 
// If all values exist, send the email
if ( $name && $email && $projectdescription && $timeframe && $budget) {
  $to = "ferreira1235@gmail.com";
  $subject = $_POST['sendMessage'];
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= "From:" . $email . "\r\n";
  $success = mail($to, $subject, $msg, $headers);
}
 
 
 
// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
  echo $success ? "success" : "error";
} else {
/* Redirect browser */
    header("Location: thanks.html");
/* Make sure that code below does not get executed when we redirect. */
}
?>