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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#recherche").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
</script>
              
  </head>
  <body> 
  <div class="container containeroffre">
                      <div class="row">
                        <?php include ("../inc/sidemenu.php")?> 
<div class="col-md-10" data-spy="scroll" data-target="#navbar-example" data-offset="0" class="scrollspy-example">
    <div class="input-group">
  <input id="recherche" class="form-control"
         placeholder="Rechercher parmi les médicaments..." style="font-size: 12px">
  <div class="input-group-addon" ><i class="fa fa-search"></i></div>
</div>
                    <table class="table table-dark table-hover  table-vert">
                      <thead>
                        <tr>
                            <th></th>
                            <th>Nom du médicament</th>
                          <th>Composition</th>
                          <th>Effet</th>
                          <th>Contre-indication</th>        
                        </tr>
                      </thead> 

    <tbody id="myTable">
<?php
            $resultmed= mysqli_query($mysqli,"SELECT * FROM medicament ORDER BY MED_NOMCOMMERCIAL ASC");
            while($res=mysqli_fetch_array($resultmed)){
            ?>
        <tr>
            <td><i class="fas fa-pills"></i></td>
            <td><?php echo utf8_encode($res['MED_NOMCOMMERCIAL'])?></td>
            <td><?php echo utf8_encode($res['MED_COMPOSITION'])?></td>
            <td><?php echo utf8_encode($res['MED_EFFETS'])?></td>
            <td><?php echo utf8_encode($res['MED_CONTREINDIC'])?></td>
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