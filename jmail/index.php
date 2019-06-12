 


 
<?php
// Module configuration
$MOD_LANG="en";
$MOD_ORI="rhou";
$MOD_CAPTCHA=true;
 

switch($MOD_LANG){
case "en":require_once('../tools/jmail/lang/en.php');break;
case "es":require_once('../tools/jmail/lang/es.php');break;
case "pt":require_once('../tools/jmail/lang/pt.php');break;
case "ru":require_once('../tools/jmail/lang/ru.php');break;
case "it":require_once('../tools/jmail/lang/it.php');break;
case "de":require_once('../tools/jmail/lang/de.php');break;
case "fr":require_once('../tools/jmail/lang/fr.php');break; 
}



$ca=rand ( 0, 6 );
$cb=rand ( 0, 6 );

  ?>
  
  <style>
.width{
width:100%;
}
.height{
height:80%;
}
.label{
color:black;
}
</style>
 <div>
 
 
 
<form id="cfm" action="../tools/jmail/ws.php" method="post" class="width" name="contactform">
 
<input name="mod_lang" type="hidden" value="<?php echo $MOD_LANG; ?>" />
<input name="mod_ori"   type="hidden" value="<?php echo $MOD_ORI; ?>" />
<input name="mod_captcha"   type="hidden" value="<?php echo $MOD_CAPTCHA; ?>" />
 
<input class="width" maxlength="50" name="first_name"   type="text" placeholder="<?php echo $JM_NAME; ?>" /><br>
<input class="width"  maxlength="50" name="email" type="text" placeholder="<?php echo $JM_MAIL; ?>" /><br>
<input onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="width"  maxlength="50" name="telephone"  type="text" placeholder="<?php echo $JM_PHON; ?>" /><br>
<textarea class="width height"  maxlength="1000" name="comments" rows="5" placeholder="<?php echo $JM_CONT; ?>" ></textarea><br>
<?php if($MOD_CAPTCHA==1){echo '<input class="width" maxlength="50" name="captcha"   type="text" placeholder="'.$ca.' + '.$cb.'" /><br>';
echo '<input name="cc"   type="hidden" value="'.($ca+$cb).'"/>';
} 

?>
<a class="btn btn-primary submit-button" onclick="send();" style="float:right;"><?php echo $JM_SEND; ?></a>
 
</form>
</div>
<script>
 


function send(){

if('<?php echo $MOD_CAPTCHA;?>'=='1'){
var c=document.getElementsByName("captcha")[0].value;
var cc=document.getElementsByName("cc")[0].value;
if(c!=cc){alert('<?php echo $JM_INCAPT;?>');return;}
 
}
var n=document.getElementsByName("first_name")[0].value;
var e=document.getElementsByName("email")[0].value;
var t=document.getElementsByName("telephone")[0].value;
var m=document.getElementsByName("comments")[0].value;
if(n==""){alert('<?php echo $JM_INNAME;?>');return;}
if(e==""){alert('<?php echo $JM_INMAIL;?>');return;}
if(ve(e)==false){alert('<?php echo $JM_INMAIL;?>');return;}
if(t==""){alert('<?php echo $JM_INTELE;?>');return;}
if(m==""){alert('<?php echo $JM_INCOMM;?>');return;}





document.getElementById("cfm").submit();
}

function ve(email) {
   //var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
     var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


if (regexEmail.test(email)) {
   return true;
} else {
   return false;
}}
</script>
 

 