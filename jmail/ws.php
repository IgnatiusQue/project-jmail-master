
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("configuration.php");

require_once("../geo/clientIp.php");

if(isset($_POST['email'])) {
 
$MOD_LANG=$_POST['mod_lang'];
switch($MOD_LANG){
case "en":require_once('lang/en.php');break;
case "es":require_once('lang/es.php');break;
case "pt":require_once('lang/pt.php');break;
case "ru":require_once('lang/ru.php');break;
case "it":require_once('lang/it.php');break;
case "de":require_once('lang/de.php');break;
case "fr":require_once('lang/fr.php');break; 
}

 
    function died() {
        // your error code can go here
        echo $JM_ERROR;
         die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died();       
    }
 
    $mod_lang = $_POST['mod_lang'];// hidden
    $mod_ori = $_POST['mod_ori'];// hidden
    $email_subject = $_POST['mod_ori'].' Web contact form';// hidden
    $first_name = $_POST['first_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
 
 
 


 
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
	$email_message .= "Site origin: ".clean_string($mod_ori)."\n";
	$email_message .= "Site lang: ".clean_string($mod_lang)."\n";
     $email_message .= "Ip: ".clean_string(clientIp())."\n";
	
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($EMAIL_TO, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <script>
 alert('<?php echo $JM_THANKS;?>');
window.open('../../'+ '<?php echo $mod_ori;?>', "_self");
 </script>
 
<?php

}
?>


