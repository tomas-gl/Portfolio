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
    <!-- Script -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
              
  </head>
  <body> 

<?php

      if(isset($_POST['submit'])) {	
	$praticien = $_POST['praticien'];
	$date = $_POST['date'];
	$bilan = $_POST['bilan'];
        $medicament = $_POST['medicament'];
	$quantite = $_POST['quantite'];
	$motif = $_POST['motif'];
	$loginId = $_SESSION['id'];
        
	if($bilan == "" || $date == "") {
            ?>
            <script>alert('Veuillez renseigner tous les champs');</script>
            <?php
	} else {
            
		$result = mysqli_query($mysqli, "INSERT INTO rapport_visite(VIS_MATRICULE, PRA_NP, MED_NOMCOMMERCIAL, OFF_QTE, RAP_DATE, RAP_BILAN, RAP_MOTIF) VALUES('$loginId', '$praticien', '$medicament', '$quantite', '$date', '$bilan', '$motif')")
					or die("La requête n'a pas pu être éxécutée.");
		
            ?>
            <script>alert('Compte-rendu créé avec succès');</script>
            <?php
            header('Location: accueil.php');
	}
}
?>            
  <div class="container containeroffre">
   <div class="row">
<?php include ("../inc/sidemenu.php")?> 
    <div class="col-md-9" data-spy="scroll" data-target="#navbar-example" data-offset="0" class="scrollspy-example">
        <div class="jumbotron formulaire">
            <h1 class="titreform">Rapport de visite</h1>
                        <div class="form-row mt-4">
                        <div class="col-sm-3 pb-3">
                            <label class="label" for="exampleSt">Praticien</label>
                            <select onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.size=0" class="form-control" id="exampleSt" name="praticien">
                                <?php
                                $resultpra= mysqli_query($mysqli,"SELECT * FROM praticien ORDER BY PRA_NP ASC");
                                while($res=mysqli_fetch_array($resultpra)){
                                echo "<option>".utf8_encode($res['PRA_NP'])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                                        <div class="form-group">
                            <label class="label label-date" for="exampleSt">Date du rapport</label>
                <div class="input-group date dateselect" id="datetimepicker1">
                    <input type="text" class="form-control" name="date"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

                        <div class="col-md-6 pb-3 label">
                            <label for="exampleMessage">Bilan</label>
                            <textarea class="form-control form-bilan" id="exampleMessage" placeholder="Rédiger le bilan ici..." name="bilan"></textarea>
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label class="label med" for="exampleSt">Médicament</label>
                            <select onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.size=0" class="form-control form-med" id="exampleSt" name="medicament">
                                <?php
                                $resultmed= mysqli_query($mysqli,"SELECT * FROM medicament ORDER BY MED_NOMCOMMERCIAL ASC");
                                while($res=mysqli_fetch_array($resultmed)){
                                    ?>
                                <option><?php echo utf8_encode($res['MED_NOMCOMMERCIAL'])?></option>;
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label class="label échantillon" for="exampleSt">Quantité d'échantillons</label>
                                   <select onmousedown="if(this.options.length>5){this.size=5;}" onchange="this.size=0" class="form-control form-quant" id="exampleSt" name="quantite">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                        </div>
                            <i class="fas fa-notes-medical"></i>
                        <div class="col-sm-3 pb-3 motif">
                            <label class="label" for="exampleSt">Motif de la visite</label>
                            <select class="form-control " id="exampleSt" name="motif">
                                <option>Périodicité</option>
                                <option>Actualisation</option>
                                <option>Relance</option>
                                <option>Solicitation</option>
                                <option>Autres</option>
                                
                            </select>
                        </div>
                            <input class="boutonvalider" type="submit" name="submit" value="Valider ➤">
                        </div>
                    </div>
        </div>
                </div> <!--row-->
              </div> <!--container-->
  <script src='../js/jquerydatepicker.js'></script>
  <script src='../js/momentwithlocales.js'></script>
  <script src='../js/datepicker.js'></script>
<script > $(function () {
   var bindDatePicker = function() {
		$(".date").datetimepicker({
        format:'YYYY-MM-DD',
			icons: {
				time: "far fa-clock",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
</script>
  </body>
</html>