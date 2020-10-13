 <!DOCTYPE html>
<html>
    <head>
        <title>Portfolio Tomas GAVREL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row">
                    <div class="sectionstageppe col-xs-10 col-sm-14 col-lg-12">
        <?php include("header.php");
        ?>
        <?php include("menu.php");
        ?>
        <div class="content container">

                    <h2>Présentation de l'entreprise:</h2>
                    <div class="paragraphe">
                        <b>VENIXXIA TECHNOLOGIE</b>, société à responsabilité limitée est active depuis 13 ans.
                        Établie à SEVRES (92310), elle est spécialisée dans le secteur d'activité des portails internet.
                        Son effectif est compris entre 1 et 2 salariés.
                    </div>
                    <div class="paragraphe">
                    Sur l'année 2013 elle réalise un chiffre d'affaires de 32 000,00 €.
                    Le total du bilan a diminué de 26,39 % entre 2012 et 2013.
                    Societe.com recense 1 établissement actif et le dernier événement notable de cette entreprise date du 23-08-2004.
                    </div>
                    <div class="paragraphe">
                    Philippe THEPAUT, est gérant de l'entreprise VENIXXIA TECHNOLOGIE.
                    </div>
                    <a href="http://www.venixxia.com//" class="liensite">Lien vers le site </a>
                    <h3>Journal de bord:</h3>

                    <h4>1ère semaine:</h4>
                    <div class="paragraphe">
                    Mon objectif a été de constituer un tableau comparatif de solutions de gestion de
                    sources afin de trouver la solution la plus adéquate.
                    </div>
                    <h4>Production associée:</h4>
                    <div class="intitule">Aperçu du tableau comparatif:</div>
                    <div>
                        <img src="./images/tableaucomparatif.png" class="imagestyle">
                                        </div>
                    <a href="./fichiers pdf/TableaucomparatifSolutionsGestiondeSources.pdf" target="_blank"><button>Voir la version PDF</button></a>
                                       <h4>Compétences mises en oeuvre:</h4>
                    <div class="competences">
                    <b>A.1.1.2, Étude de l'impact de l'intégration d'un service sur le système informatique.</b>
                    <br>
                    <b>A.1.1.3, Étude des exigences liées à la qualité attendue d'un service.</b>
                    <br>
                    <b>A.1.2.1, Élaboration et présentation d'un dossier de choix de solution technique.</b>
                    <br>
                    <b>A.4.1.1, Proposition d'une solution applicative.</b>
                    <br>
                    <b>A.5.1.2, Recueuil d'informations sur une configuration et ses éléments.</b>
                    <br>
                    <b>A.5.1.5, Évaluation d'un investissement informatique.</b>
                    </div>
                                        <br><br>
                    <hr>
                    <div class="paragraphe">
                    Ensuite il convenait de choisir parmi les solutions retenues celle qui
                    conviendrait le mieux au projet mis en oeuvre dans
                    le cadre de mon stage.
                    </div>
                    <div class="paragraphe">
                    Pour le développement du projet, j'ai donc choisi d'utiliser l'environnement
                    de développement Visual Studio Code qui intègre Git en natif.
                    </div>
                    <img src="./images/vscode-logo.png">
                    <img src="./images/git-logo.png">
                    <div class="paragraphe">
                    L'extension Git de Visual Studio Code permet de comparer la nouvelle version
                    à l'ancienne que l'on souhaite déployer. Elle intègre de plus un historique des
                    différentes versions utilisées tout le long du développement.
                    </div>
                    <img src="./images/comparaison_git_history.png" class="imagestyle">
                    <img src="./images/githistory.png" class="imagestyle">

                    <div class="paragraphe">
                    Il était également convenu de créer un dépot du projet sur la plateforme
                    github afin de faciliter la récupération du code source et d'avoir un
                    aperçu global de l'avancement du projet durant son développement
                    </div>
                    <img src="./images/githubhistory.png" class="imagestyle">
                    <h4>Compétences mises en oeuvre:</h4>
                    <div class="competences">
                    <b>A.1.3.4, Déploiement d'un service.</b>
                    <br>
                    <b>A.3.2.1, Installation et configuration d'élément infrastructure.</b>
                    </div>
                    <br><br>
                    <hr>
                    <h4>2ème à 5ème semaine:</h4>
                    <div class="paragraphe">
                    Le projet consistait à mettre en place un comparatif de fournisseur d'énergies en électricité
                    , en gaz, en électricité verte et en gaz et éléctricité(dual).
                    </div>
                    <div class="paragraphe">
                    L'objectif était de rendre la page "responsive" afin qu'elle puisse s'adapter à toute
                    les tailles d'écrans (tablettes/smartphones).
                    </div>
                    <div class="paragraphe">
                    Pour se faire j'ai donc utilisé durant le développement du projet,
                    la librairie Bootstrap 4 qui m'a permi de répondre à cet objectf.
                    </div>
                    <img src="./images/bootstrap4-logo.png" class="imagestyle">
                    <div class="paragraphe">
                    J'ai également choisi d'utiliser la bibliothèque Javascript jQuery
                    afin de rendre l'interface de la page plus agréable d'utilisation pour l'utilisateur.
                    </div>
                    <img src="./images/jquery-logo.png" class="imagestyle">
                     <div class="paragraphe">
                     L'utilisateur choisi la liste des fournisseurs en fonction du type d'énergie
                     en cliquant sur l'un des boutons du menu qui filtre les templates
                     de la page.
                    </div>
                    <img src="./images/comparateur.png" class="imagestyle">
                    <div class="paragraphe">
                    Après avoir selectionné l'une des offres, l'utilisateur est redirigé
                    vers une page affichant les détails de l'offre en question.
                    </div>
                    <img src="./images/detailoffre.png" class="imagestyle">
                    <br><br>
                    <hr>
                    <h4>6ème semaine:</h4>
                    <div class="paragraphe">
                    Il m'a ensuite été demandé de créer un questionnaire qui permettrait de
                    faciliter le choix de l'utilisateur sur l'offre la plus adaptée à ses besoins.
                    </div>
                     <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="./images/questionnaire1.png" width="970" height="500">
                  </div>
                  <div class="carousel-item">
                      <img src="./images/questionnaire2.png" width="970" height="500">
                  </div>
                  <div class="carousel-item">
                      <img src="./images/questionnaire3.png" width="970" height="500">
                  </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon carousel-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon carousel-icon"></span>
                </a>
              </div>
                            </div>

                <a href="./fichiers pdf/script_emc.pdf" target="_blank"><button>Voir le script du questionnaire</button></a>
                    <h4>Compétences mises en oeuvre:</h4>
                    <div class="competences">
                    <b>A.1.3.1, Test d'intégration et d'acceptation d'un service</b>
                    <br>
                    <b>A.1.3.4, Déploiement d'un service.</b>
                    <br>
                    <b>A.1.4.1, Participation à un projet.</b>
                    <br>
                    <b>A.4.2.2, Adaptation d'une solution applicative aux évolutions de ses composants.</b>
                    <br>
                    <b>A.4.2.3, Réalisation des tests nécessaires à la mise en production d'éléments mis à jour.</b>
                    <br>
                    <b>A.5.2.3, Repérage des compléménts de formation ou d'auto-formation.</b>
                    </div>

                    <br><br>
                    <hr>
                    <h3>Conclusion:</h3>
                    <div class="paragraphe">
                    Ce stage m'a permi d'avoir une première expérience dans la gestion et le suivi
                    de l'évolution d'un projet.
                    </div>
                    <div class="paragraphe">
                    Durant ce stage, les missions qui m'ont été confiées m'ont permi d'affiner mes compétences
                    en développement front-end et m'ont donné l'opportunité d'utiliser des outils de
                    développement récent.
                    </div>
        </div>

                                            </div>
                    </div>

    </body>
</html>
