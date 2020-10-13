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

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='../styles/datepicker.min.css'>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/menu.css">
    <!-- Script -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/greyed.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#myform :input").prop("disabled", true);
        });
    </script>
  </head>
  <body> 
      <?php

            $resultrap= mysqli_query($mysqli,"SELECT * FROM rapport_visite WHERE RAP_NUM=3");
            while($res= mysqli_fetch_array($resultrap)){    
            ?>
  <div class="container containeroffre">
   <div class="row">
<?php include ("../inc/sidemenu.php")?> 
    <div class="col-md-9" data-spy="scroll" data-target="#navbar-example" data-offset="0" class="scrollspy-example">
        <div class="jumbotron formulaire">
            <h1 class="titreform">Rapport de visite numéro <?php echo $res['RAP_NUM']?></h1>
                        <form id="myform" class="form-row mt-4">
                        <div class="col-sm-3 pb-3">
                            <label class="label" for="exampleSt">Praticien</label>
                            <select class="form-control" id="exampleSt">
                                <option><?php echo utf8_encode($res['PRA_NP']) ?></option>
                            </select>
                        </div>
                                        <div class="form-group">
                            <label class="label" style="margin-left: 350px" for="exampleSt">Date du rapport</label>
                <div class='input-group date dateselect' id='datetimepicker1'>
                    <span type="text" class="form-control"><?php echo $res['RAP_DATE']?></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

                        <div class="col-md-6 pb-3 label">
                            <label for="exampleMessage">Bilan</label>
                            <span class="form-control form-bilan" id="exampleMessage"><?php echo utf8_encode($res['RAP_BILAN'])?></textarea>
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label class="label med" for="exampleSt">Médicament</label>
                            <select class="form-control" id="exampleSt" style="margin-left: 30px">
                                <option><?php echo utf8_encode($res['MED_NOMCOMMERCIAL']) ?></option>
                            </select>
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label class="label échantillon" for="exampleSt">Quantité d'échantillons</label>
                            <select class="form-control" id="exampleSt" style="width:100px; margin-left: 80px">
                                <option><?php echo utf8_encode($res['OFF_QTE']) ?></option>
                            </select>
                        </div>
                            <i class="fas fa-notes-medical"></i>
                        <div class="col-sm-3 pb-3 motif">
                            <label class="label" for="exampleSt">Motif de la visite</label>
                            <select class="form-control " id="exampleSt">
                                <option><?php echo utf8_encode($res['RAP_MOTIF']) ?></option>
                            </select>
                        </div>
                        
                        </form>
                    </div>
        <?php
        }
        ?>
        </div>
                </div> <!--row-->
              </div> <!--container-->
