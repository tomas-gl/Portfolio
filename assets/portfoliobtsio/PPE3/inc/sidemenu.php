                     <!--Styles-->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="../styles/main.css" media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../styles/menu.css" media="screen,projection"/>
        
       <!--Script-->
              <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
        <?php
        $errormessage="Vous devez être connecté pour accéder à cette page <br> <a href='index.php'>Se connecter</a>";
      if(isset($_SESSION['valid'])){
          include ("../inc/connexion.php");
          $result = mysqli_query($mysqli, "SELECT * FROM visiteur");
      ?>
                        <div class="col-md-2 sidebar">
                            <div id="navbar-example" class="list-group-hover sidebar-widget-1 list-group">
                                <ul class="list-unstyled"><br>
                                    <img src="../images/logoDefault.png" alt="" style="height: 120px; margin-left: 20px; margin-bottom: 20px">
                                <a class="list-titre"><i class="fas fa-user"></i><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></a><br><br>
                                <a class="list-group-item list-group-item-action" href="accueil.php"><i class="fas fa-home"></i>Accueil</a>
                                <a class="list-group-item list-group-item-action" href="praticiens.php"><i class="fas fa-list-alt"></i>Liste des praticiens</a>
                                <a class="list-group-item list-group-item-action" href="visiteurs.php"><i class="far fa-list-alt"></i>Liste des visiteurs</a>
                                <a class="list-group-item list-group-item-action" href="medicaments.php"><i class="fas fa-clipboard-list"></i>Liste des médicaments</a>
                                <a class="list-group-item list-group-item-action" href="../inc/logout.php"></i>Se déconnecter<i class="fas fa-sign-out-alt"></i></a>                              
                                </ul>
                            </div>
                        </div>
  <?php
      }else{
          echo $errormessage;
      }