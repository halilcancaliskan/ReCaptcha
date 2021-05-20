<?php 
    
    if(isset($_POST['mailform']))
    { 
        require_once 'recaptcha/autoload.php';
        $recaptcha = new \ReCaptcha\ReCaptcha('6LcBLasaAAAAAO00sIgh1OdOwPspebjs-bYMEWxU');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            $verifier=true;
            // Verified!
        } else {
            $errors = $resp->getErrorCodes();
            $verifier=false;
        }
        
        if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['message']) AND $verifier==true)
        {
          $nom = $_POST['nom'];
          $email = $_POST['email'];
          $message1 = $_POST['message'];
          
          $msg="Votre message est bien envoyé, nous vous répondrons dans les plus brefs délais.";
          $header="MINE-Version: 1.0\r\n";
          $header.='From:"cabinet-infirmier-stage" <halilcan17@hotmail.fr>'."\n";
          $header.='Content-Type:text/html; charset="uft-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';
    
          $message= '
             <html>
                <body>
                   <div align="center">
                     <u>Nom de l\'expéditeur : </u>'.$nom.'<br />
                     <u>Mail de l\'expéditeur : </u>'.$email.'<br />
                     <br />
                     '.nl2br($message1).'
                   </div>
                </body>
            </html>
             ';
    
           mail("", "CONTACT - cabinet-infirmier-stage.com", $message, $header);
        
        }
        else
        {
         $msg="Veuillez cocher le reCaptcha ";
        }
        
    
    }

 

 

?>
<div class="row">
<div class="col-lg-8 col-lg-offset-2 centered">
<p>Pour toute demande particulière (hors prise de rendez-vous), veuillez nous envoyer un message en utilisant cette section, en donnant un maximum d'information possible. Merci.</p>
<form action="" id="contact" method="POST" class="form" role="form">
<div class="row">
<div class="col-xs-6 col-md-6 form-group">
<input class="form-control" id="nom" name="nom" placeholder="Nom-Prénom" type="text" required />
</div>
<div class="col-xs-6 col-md-6 form-group">
<input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
</div>
</div>
<textarea class="form-control" id="message" name="message" placeholder="Message" rows="5" required></textarea>
<div class="g-recaptcha" data-sitekey="6LcBLasaAAAAAF0sl4HU72eQqXm394UAeUfixpaS" required></div>
<div class="row">
<div class="col-xs-12 col-md-12">
<button class="btn btn btn-lg" type="submit" name="mailform">Envoyez le message</button>
</div>
</div>
</form>
<html>
<title>reCAPTCHA demo: Simple page</title>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
if(isset($msg))
{
echo $msg;
}
?>