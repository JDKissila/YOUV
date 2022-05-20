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
        <h2>YO<span>UV</span></h2>
        <p>Adopt your E-style.</p>
    </div>
    <!----barre de navigation---->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
        <a href="about.html"><i class="fa fa-info" aria-hidden="true"></i> A propos</a>
        <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produits</a>
        <a href="connexion.php"><i class="fa fa-user" aria-hidden="true"></i> Connexion</a>
		<a href="contact.html"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
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
        <!--Direction vers la page de connexion-->
        <section class="about">
            <div id="main"> 
                <div class="about-text">
                <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bienvenue sur YOUV, $user";
                }
            ?>
                </div>
            </div>
        </section> 
</body>
</html>