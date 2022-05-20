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
<?php
    
    /* page: inscription.php */
//connexion à la base de données:
$BDD = array();
$BDD['host'] = "mysql-youv.alwaysdata.net";
$BDD['user'] = "youv";
$BDD['pass'] = "Jdk77340!";
$BDD['db'] = "youv_database";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
}
//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
$AfficherFormulaire=1;
//traitement du formulaire:
if(isset($_POST['username'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['username'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ utilisateur est vide.";
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['username'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
        echo "L'utilisateur doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['username'])>25){//le pseudo est trop long, il dépasse 25 caractères
        echo "L'utilisateur est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['password'])){//le champ mot de passe est vide
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM utilisateur WHERE nom_utilisateur='".$_POST['username']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo "Cet utilisateur est déjà utilisé.";
    } else {
        //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
        if(!mysqli_query($mysqli,"INSERT INTO utilisateur SET nom_utilisateur='".$_POST['username']."', mot_de_passe='".$_POST['password']."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        } else {
            echo "Vous êtes inscrit avec succès!";
            //on affiche plus le formulaire
            $AfficherFormulaire=0;
            header('Location: connexion.php');
        }
    }
}
if($AfficherFormulaire==1){
    ?>
    <br />
    <div id="container">
    <form method="post" action="inscription.php">
        Nom Utilisateur (a-z0-9) : <input type="text" name="username">
        <br />
        Mot de passe : <input type="password" name="password">
        <br />
        <input type="submit" value="S'inscrire">
    </form>
</div>
</body>
</html>
    <?php
}
?>
