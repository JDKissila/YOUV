<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOUV</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Oswald:wght@200;300&family=Overlock:ital@1&family=Rokkitt:wght@500&display=swap" rel="stylesheet">

</head>
<body>
	<div class="header">
        <h2>YO<span>U-V</span></h2>
        <p>Adoptez votre E-style.</p>
    </div>
    <!----barre de navigation---->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
        <a href="about.html"><i class="fa fa-info" aria-hidden="true"></i> A propos</a>
        <a href="produit.html"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produits</a>
        <a href="connexion.php"><i class="fa fa-user" aria-hidden="true"></i> Connexion</a>
		<a href="contact.php"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
        <a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i> panier</a>
      </div>
      
      <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Menu</button>  
        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
    </div>
<section id="contact">
	<form action class="form">
        <h1 class="heading">Contact</h1>
		<input type="email" name="email" class="input" placeholder="Entrez votre adresse mail">
		<textarea name="message" id="message" cols="40" rows="20" placeholder="Saisissez votre message"></textarea>
		<input type="submit" value="Envoyer"id="Envoyer">
	</form>

</section>
<?php
    if (isset($_POST['message'])) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: webmaster@monsite.fr' . "\r\n";
        $entete .= 'Reply-to: ' . $_POST['email'];

        $message = '<h1>Message envoyé depuis la page Contact de youv</h1>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

        $retour = email('youv.paris@gmail.com', 'Envoi depuis page Contact', $message, $entete);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
    ?>
</body>
</html>