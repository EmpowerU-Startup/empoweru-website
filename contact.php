<?php
if(isset($_POST['submit'])) {
$email_to = "meeraskurup19@gmail.com";
$email_subject = "Email about EmpowerU ";
function died($error) {
echo "We are very sorry, but there were error(s) found with the form you submitted. ";
echo "These errors appear below.<br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}
if(!isset($_POST['fname']) ||
!isset($_POST['email']) ||
!isset($_POST['lname']) ||
!isset($_POST['comment']))  {
died('We are sorry, but there appears to be a problem with the form you submitted.'); 
}
$fname = $_POST['fname']; // required
$lname = $_POST['lname']; // required
$email = $_POST['email']; // required
$comment = $_POST['comment']; // required
$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email)) {
$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$name)) {
$error_message .= 'The First Name you entered does not appear to be valid.<br />';
}

if(strlen($error_message) > 0) {
died($error_message);
}
$email_message = "\n\n";
function clean_string($string) {
	$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}
$email_message .= "First Name: ".clean_string($fname)."\n";
$email_message .= "Last Name: ".clean_string($lname)."\n";
$email_message .= "Email: ".clean_string($email)."\n";


$email_message .= "Message: ".clean_string($comment)."\n";


$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<h2>Thank you for contacting us. We will be in touch with you very soon.</h2>
 <script>
         setTimeout(function(){
            window.location.href = 'index.html';
       }, 5000);
  </script>
<?php
}
?>