<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
             
        <!--Styles-->
        <link type="text/css" rel="stylesheet" href="../styles/materialize.min.css" media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../styles/main.css" media="screen,projection"/>
        
        
    </head>
<body class="blue lighten">

<?php

include("../inc/connexion.php");
		$errormessage="";
if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['login']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['mdp']);
        
	if($user == "" || $pass == "") {
            ?>
            <script>alert('Veuillez renseigner tous les champs');</script>
            <?php
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM visiteur WHERE VIS_NOM='$user' AND VIS_MDP=md5('$pass')")
					or die("La requête n'a pas pu être éxécutée.");
		
		$row = mysqli_fetch_assoc($result);

		if(is_array($row) && !empty($row)) {
			$validuser = $row['VIS_NOM'];
			$_SESSION['valid'] = $validuser;
                        $_SESSION['nom'] = $row['VIS_NOM'];
                        $_SESSION['prenom'] = $row['VIS_PRENOM'];
			$_SESSION['id'] = $row['VIS_MATRICULE'];
		} else {
                    $errormessage = 'Utilisateur ou mot de passe incorrect';
		}
		if(isset($_SESSION['valid'])) {
			header('Location: accueil.php');			
		}
	}
}
?>
<div class="container" style="margin-top:90px;">
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card-panel">
                <h5 class="center" style="padding-bottom: 5%">Appli comptes-rendus</h5>
                <img src="../images/logoDefault.png" alt="" class="responsive-img center-block">
                <div class="row">
                    <div class="errormessage">
                    <?php echo $errormessage; ?>
                    </div>
                    <form id="loginForm" name="Form" class="col s12 m10" method="post" action="">
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <i class="fa fa-user-circle prefix" style="padding-right: 15px"></i>
                                <input id="icon_login" name="login" type="text" class="validate">
                                <label for="icon_login">Login</label>
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="fa fa-unlock-alt prefix" style="padding-right: 15px"></i>
                                <input id="icon_password" name="mdp" type="password" class="validate">
                                <label for="icon_password">Mot de passe</label>
                            </div>
                        </div>
                        <input class="boutonconnexion" type="submit" name="submit" value="S'identifier ➤">
                    </form>
                </div><!--row-->

            </div><!--card-->


        </div><!--col-->
    </div><!--row-->
</div>
                   <!--Script-->
       <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
       <script type="text/javascript" src="../js/jquery.min.js"></script>
       <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>
</html>