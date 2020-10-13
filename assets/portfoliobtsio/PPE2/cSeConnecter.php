<?php  
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Se connecter"
 * @package default
 * @todo  RAS
 */
  $repInclude = './Includes/';
  require($repInclude . "_init.inc.php");
  
  // est-on au 1er appel du programme ou non ?
  $etape=(count($_POST)!=0)?'validerConnexion' : 'demanderConnexion';
  
  if ($etape=='validerConnexion') { // un client demande à s'authentifier
      // acquisition des données envoyées, ici login et mot de passe
      $login = lireDonneePost("txtLogin");
      $mdp = lireDonneePost("txtMdp");   
      $lgUser = verifierInfosConnexion($idConnexion, $login, $mdp) ;
      // si l'id utilisateur a été trouvé, donc informations fournies sous forme de tableau
      if ( is_array($lgUser) ) { 
          affecterInfosConnecte($lgUser["id"], $lgUser["login"]);
      }
      else {
          ajouterErreur($tabErreurs, "Pseudo et/ou mot de passe incorrects");
      }
  $adminNo = verifierAdminNo($idConnexion, $login, $mdp);
}
if ($etape == "validerConnexion" && nbErreurs($tabErreurs) == 0 && $adminNo == 0) {
  header("Location: cAccueil.php");
}
if ($etape == "validerConnexion" && nbErreurs($tabErreurs) == 0 && $adminNo == 1) {
  header("Location: cAccueilComptable.php");
}
 
  require($repInclude . "_entete.inc.php");
  require($repInclude . "_sommaire.inc.php");  
?>
<!-- Division pour le contenu principal -->
    <div id="contenu">
      <h2>Identification utilisateur</h2>
<?php
          if ( $etape == "validerConnexion" ) 
          {
              if ( nbErreurs($tabErreurs) > 0 ) 
              {
                echo toStringErreurs($tabErreurs);
              }
          }
?>               
      <form id="frmConnexion" action="" method="post">
      <div class="corpsForm">
        <input type="hidden" name="etape" id="etape" value="validerConnexion" />
      <p style="margin-top: 15px;">
        <label class="logintxt" for="txtLogin" accesskey="n"><i style="margin-right: 10px"class="fas fa-user"></i>Login : </label>
        <input type="text" id="txtLogin" name="txtLogin" maxlength="20" size="15" value="" title="Entrez votre login" />
      </p>
      <p>
        <label class="logintxt" for="txtMdp" accesskey="m"><i style="margin-right: 10px"class="fas fa-unlock-alt"></i>Mot de passe : </label>
        <input type="password" id="txtMdp" name="txtMdp" maxlength="8" size="15" value=""  title="Entrez votre mot de passe"/>
      </p>
            <div class="piedForm">
                      <p>
                      <input class = "btn btn-primary"  id="ok" type="submit" name="validerfiche" value="Valider"/>
                      </p>
            </div>
      </div>
      </form>
    </div>
<?php
    require($repInclude . "_pied.inc.html");
    require($repInclude . "_fin.inc.php");
?>