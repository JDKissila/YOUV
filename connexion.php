<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
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
        <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Produits</a>
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
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <button type="submit" name="inscription">Connexion</button>
                <button type="button"><a href="inscription.php">pas encore inscrit ? Inscrivez-vous</button></a>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>