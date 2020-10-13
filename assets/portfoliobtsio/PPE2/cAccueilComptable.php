<?php
/** 
 * Page d'accueil de l'application web AppliFrais
 * @package default
 * @todo  RAS
 */
  $repInclude = './Includes/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si visiteur non connecté
  if ( ! estVisiteurConnecte() ) 
  {
        header("Location: cSeConnecter.php");  
  }
  require($repInclude . "_entete.inc.php");
  require($repInclude . "_sommaireC.inc.php");
?>
  <!-- Division principale -->
    <div id="contenu">
      <h2>Bienvenue sur l'intranet GSB des comptables</h2>
      <i style="font-size:280px;float:right;"class="fas fa-clipboard-list"></i>
  </div>
<?php        
  require($repInclude . "_pied.inc.html");
  require($repInclude . "_fin.inc.php");
?>