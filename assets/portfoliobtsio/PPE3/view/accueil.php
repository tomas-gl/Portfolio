<!doctype html>
<?php session_start();?>

<?php
if(!isset($_SESSION['valid'])){
    header('Location: index.php');
}
?>

<?php include_once("../inc/connexion.php");
?>
<html lang="en">
  <head>
    <title>GSB Compte-rendus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <!-- jQuery files -->
       <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       <script type="text/javascript" src="../js/recherche.min.js"></script>
              
  </head>
  <body> 
  <div class="container containeroffre">
                      <div class="row">
                        <?php include ("../inc/sidemenu.php")?> 
<div class="col-md-10" data-offset="0" class="scrollspy-example">
        <div class="jumbotron form entete">
            <div class="entetetitre">
                    <h1 class="titreaccueil">Bienvenue sur le site de gestion de comptes-rendu de visite</h1>
            </div>
                                <i class="fas fa-medkit"></i>
                    <div class="creer">
                        <a class="boutoncreer" href="creer.php"><span>Nouveau compte-rendu</span></a>
                    </div>
                                      </div>
                    <h2 id="list-item-1" style="margin:30px">Liste des rapports de visite:</h2>
                       
                    <table class="table table-dark table-hover  table-vert">
                      <thead>
                        <tr>
                            <th></th>
                          <th>Praticien</th>
                          <th>Date de visite</th>
                          <th>Motif</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead> 
                    <h2 ></h2>

    <tbody>
        <tr>
<?php
            /*
            $id= $_SESSION['id'];
            */
            $resultrap= mysqli_query($mysqli,"SELECT * FROM rapport_visite ORDER BY RAP_NUM ASC");
            while($res=mysqli_fetch_array($resultrap)){
                
            ?>
        <tr>
            <td><i class="fas fa-file-medical"></i></td>
            <td><?php echo utf8_encode($res['PRA_NP'])?></td>
            <td><?php echo utf8_encode($res['RAP_DATE'])?></td>
            <td><?php echo utf8_encode($res['RAP_MOTIF'])?></td>
    <td><a class="boutonop" href="consulter.php?rap_num=<?php echo $res['RAP_NUM'] ?>">Consulter ➤</a></td>
    <td><a class="boutonop" href="../inc/delete.php?rap_num=" onCLick="return confirm('Voulez-vous vraiment effacer ce compte-rendu?')">Supprimer</a></td>
        </tr>
        <?php
                }
            ?>
  </tbody> 
                    </table>
              </div>
  </div>

  </body>
</html>