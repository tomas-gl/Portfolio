<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom'];            
    ?>
         <h3><i class="fas fa-user-circle"></i>
    <?php  
            echo $nom . " " . $prenom ;
    ?>
        </h3>
        <h4>Agent comptable</h4>        
    <?php
       }
    ?>  
      </div>  
<?php      
  if (estVisiteurConnecte() ) {
?>
        <ul id="menuList">
           <li class="smenu">
              <a href="cAccueilComptable.php" title="Page d'accueil" style="border-top:2px blue solid"><i class="fas fa-home"></i>Accueil</a>
           </li>
           <li class="smenu">
              <a href="cSuivisPaiementFichesFrais.php" title="Suivi fiches de frais"><i class="fas fa-edit"></i>Suivre le paiement des fiches frais</a>
           </li>
           <li class="smenu">
              <a href="cValidationFichesFrais.php" title="Validation des fiches de frais"><i class="fas fa-check-square"></i>Validation des fiches de frais</a>
           </li>
                      <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
           </li>
         </ul>
        <?php
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
    