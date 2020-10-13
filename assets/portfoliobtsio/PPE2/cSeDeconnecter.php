<?php  
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Se d�connecter"
 * @package default
 * @todo  RAS
 */
  $repInclude = './Includes/';
  require($repInclude . "_init.inc.php");
  
  deconnecterVisiteur() ;  
  header("Location:cSeConnecter.php");
  
?>