<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Ludo - CV</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ludo - CV">
	<meta name="keywords" content="cv, html, php, sql, css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

</head>
<body id="accueil">
	
<?php
  require('recaptcha/autoload.php');
    if(isset($_POST['g-recaptcha-response'])) {
      $recaptcha = new \ReCaptcha\ReCaptcha('6LcBLasaAAAAAO00sIgh1OdOwPspebjs-bYMEWxU');
      $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
      if ($resp->isSuccess()) {
          echo('<h2>Votre message a été envoyé.</h2>');
          $verifier = true;
      } else {
          $errors = $resp->getErrorCodes();
          echo('<h2>Remplissez le Captcha.</h2>');
      }
    }

if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']) AND $verifier == true)
	{
		$header='MIME-Version: 1.0\r\n';
		$header.='From:"VOTRE NOM"<halilcan17@hotmail.fr>'.'\n';
		$header.='Content-Type:text/html; charset="uft-8"'.'\n';
		$header.='Content-Transfer-Encoding: 8bit';

		$message=
		'Nom de l\'expediteur :'.$_POST['nom'].'<br />Mail de l\'expediteur :'.$_POST['mail'].'<br />'.nl2br($_POST['message']).'';
		mail("halilcan17@hotmail.fr", "CONTACT - Mon CV en ligne", $message, $header);
		$msg='<div style="width:250px;background-color:white;border-radius:20px;color:black;">Votre message a bien été envoyé !</div>';
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
	
?>



    <!-- FORM GOES HERE -->
    <section style="filter:drop-shadow(0 0 0.75rem white);" id="contact" class="contact-section spad">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div class="section-title">
							<h2 style="margin-bottom: 0px;" id="form">Contactez moi</h2>
						</div>
						<form class="contact-form" method="POST" action="index.php#form">
							<div class="row">
								<div class="col-md-6">
									<input required type="text" name="nom" placeholder="Nom et prénom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" />
								</div>
								<div class="col-md-6">
									<input required type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" />
								</div>
								<div class="col-md-12">
									<textarea required name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
								</div>
								<div style="margin-left: auto;margin-right: auto;" required class="g-recaptcha" data-sitekey="6LcBLasaAAAAAF0sl4HU72eQqXm394UAeUfixpaS" ></div>
							</div>
							<div class="text-md-right">
								<input type="submit" value="Envoyer !" name="mailform" class="btn btn-primary btn-md text-white"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		</section>

	
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    
		<!-- Contact section end -->

		
	</div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/progressbar.js"></script>
	<script src="js/ecriture.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="app.js"></script>

	<script>
		let progress = document.getElementById('progressbar');
		let totalHeight = document.body.scrollHeight - window.innerHeight;
		window.onscroll = function(){
			let progressHeight = (window.pageYOffset / totalHeight) * 100;
			progress.style.height = progressHeight + "%";
		}
	</script>
	<script>
            var typed = new Typed('.typed-words', {
            strings: [" Developpeur web junior","/ Bienvenue","/ Developpeur web junior","/ Mon CV en ligne"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
</script>
</body>
</html>
