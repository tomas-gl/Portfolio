<?php
/** 
 * Regroupe les fonctions d'accés aux données.
 * @package default
 * @author Arthur Martin
 * @todo Fonctions retournant plusieurs lignes sont � r��crire.
 */

/** 
 * Se connecte au serveur de données MySql.                      
 * Se connecte au serveur de données MySql à partir de valeurs
 * pr�d�finies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succ�s obtenu, le bool�en false 
 * si probl�me de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() {
    $bd = "gsb_frais";
    $hote = "127.0.0.1";
    $login = "root";
    $mdp = "";
    return mysqli_connect($hote, $login, $mdp, $bd); 
}

/**
 * Sélectionne (rend active) la base de donn�es.
 * Sélectionne (rend active) la BD pr�d�finie gsb_frais sur la connexion
 * identifiée par $idCnx. Retourne true si succ�s, false sinon.
 * @param resource $idCnx identifiant de connexion
 * @return boolean succ�s ou �chec de s�lection BD 
 */

function activerBD($idCnx) {
    $bd = "gsb_frais";
    $query = "SET CHARACTER SET utf8";
    $res = mysqli_query($idCnx,$query);
    $ok = mysqli_select_db($idCnx,$bd);
    return $ok;
}

/** 
 * Ferme la connexion au serveur de donn�es.
 * Ferme la connexion au serveur de donn�es identifi�e par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */

function deconnecterServeurBD($idCnx) {
    mysqli_close($idCnx);
}

/**
 * Echappe les caract�res sp�ciaux d'une cha�ne.
 * Envoie la cha�ne $str �chapp�e, c�d avec les caract�res consid�r�s sp�ciaux
 * par MySql (tq la quote simple) pr�c�d�s d'un \, ce qui annule leur effet sp�cial
 * @param string $str cha�ne � �chapper
 * @return string cha�ne �chapp�e 
 */    

function filtrerChainePourBD($str) {           
    if ( ! get_magic_quotes_gpc() ) {                         
        $str = mysqli_real_escape_string(connecterServeurBD(),$str); 
    }
    return $str;
}

/** 
 * Fournit les informations sur un visiteur demand�. 
 * Retourne les informations du visiteur d'id $unId sous la forme d'un tableau
 * associatif dont les cl�s sont les noms des colonnes(id, nom, prenom).
 * @param resource $idCnx identifiant de connexion
 * @param string $unId id de l'utilisateur
 * @return array  tableau associatif du visiteur
 */

function obtenirDetailVisiteur($idCnx, $unId) {
    $id = filtrerChainePourBD($unId);
    $requete = "SELECT id, nom, prenom FROM Visiteur WHERE id='" . $unId . "'";
    $idJeuRes = mysqli_query($idCnx, $requete);
    $ligne = false;     
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
        mysqli_free_result($idJeuRes);
    }
    return $ligne ;
}

/** 
 * Fournit les informations d'une fiche de frais. 
 * Retourne les informations de la fiche de frais du mois de $unMois (MMAAAA)
 * sous la forme d'un tableau associatif dont les cl�s sont les noms des colonnes
 * (nbJustitificatifs, idEtat, libelleEtat, dateModif, montantValide).
 * @param resource $idCnx identifiant de connexion
 * @param string $unMois mois demand� (MMAAAA)
 * @param string $unIdVisiteur id visiteur  
 * @return array tableau associatif de la fiche de frais
 */
function obtenirDetailFicheFrais($idCnx, $unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    $ligne = false;
    $requete="SELECT IFNULL(nbJustificatifs,0) as nbJustificatifs, Etat.id as idEtat, libelle as libelleEtat, dateModif, montantValide 
    FROM FicheFrais INNER JOIN Etat on idEtat = Etat.id 
    WHERE idVisiteur='" . $unIdVisiteur . "' AND mois='" . $unMois . "'";
    $idJeuRes = mysqli_query($idCnx,$requete);  
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
    }        
    mysqli_free_result($idJeuRes);
    
    return $ligne;
}
              
/** 
 * V�rifie si une fiche de frais existe ou non. 
 * Retourne true si la fiche de frais du mois de $unMois (MMAAAA) du visiteur 
 * $idVisiteur existe, false sinon. 
 * @param resource $idCnx identifiant de connexion
 * @param string $unMois mois demand� (MMAAAA)
 * @param string $unIdVisiteur id visiteur  
 * @return bool�en existence ou non de la fiche de frais
 */
function existeFicheFrais($idCnx, $unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    $requete = "SELECT idVisiteur FROM FicheFrais WHERE idVisiteur='" . $unIdVisiteur . 
              "' AND mois='" . $unMois . "'";
    $idJeuRes = mysqli_query($idCnx,$requete);  
    $ligne = false ;
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
        mysqli_free_result($idJeuRes);
    }        
    
    // si $ligne est un tableau, la fiche de frais existe, sinon elle n'exsite pas
    return is_array($ligne) ;
}

/** 
 * Fournit le mois de la derni�re fiche de frais d'un visiteur.
 * Retourne le mois de la derni�re fiche de frais du visiteur d'id $unIdVisiteur.
 * @param resource $idCnx identifiant de connexion
 * @param string $unIdVisiteur id visiteur  
 * @return string dernier mois sous la forme AAAAMM
 */
function obtenirDernierMoisSaisi($idCnx, $unIdVisiteur) {
	$requete = "SELECT max(mois) as dernierMois FROM FicheFrais WHERE idVisiteur='" .
            $unIdVisiteur . "'";
	$idJeuRes = mysqli_query($idCnx,$requete);
    $dernierMois = false ;
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
        $dernierMois = $ligne["dernierMois"];
        mysqli_free_result($idJeuRes);
    }        
	return $dernierMois;
}

/** 
 * Ajoute une nouvelle fiche de frais et les �l�ments forfaitis�s associ�s, 
 * Ajoute la fiche de frais du mois de $unMois (MMAAAA) du visiteur 
 * $idVisiteur, avec les �l�ments forfaitis�s associ�s dont la quantit� initiale
 * est affect�e � 0. Cl�t �ventuellement la fiche de frais pr�c�dente du visiteur. 
 * @param resource $idCnx identifiant de connexion
 * @param string $unMois mois demand� (MMAAAA)
 * @param string $unIdVisiteur id visiteur  
 * @return void
 */
function ajouterFicheFrais($idCnx, $unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    // modification de la derni�re fiche de frais du visiteur
    $dernierMois = obtenirDernierMoisSaisi($idCnx, $unIdVisiteur);
	$laDerniereFiche = obtenirDetailFicheFrais($idCnx, $dernierMois, $unIdVisiteur);
	if ( is_array($laDerniereFiche) && $laDerniereFiche['idEtat']=='CR'){
		validerEtatFicheFrais($idCnx, $dernierMois, $unIdVisiteur, 'VA');
	}
    
    // ajout de la fiche de frais � l'�tat Cr��
    $requete = "INSERT INTO FicheFrais (idVisiteur, mois, nbJustificatifs, montantValide, idEtat, dateModif)
                VALUES ('" .$unIdVisiteur."','" .$unMois. "',0,NULL, 'CR', '" .date("Y-m-d"). "')";
    mysqli_query($idCnx,$requete);
    
    // ajout des �l�ments forfaitis�s
    $requete = "SELECT id FROM FraisForfait";
    $idJeuRes = mysqli_query($idCnx,$requete);
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
        while ( is_array($ligne) ) {
            $idFraisForfait = $ligne["id"];
            // insertion d'une ligne frais forfait dans la base
            $requete = "INSERT INTO LigneFraisForfait (idVisiteur, mois, idFraisForfait, quantite)
                        VALUES ('" .$unIdVisiteur. "','" .$unMois. "','" .$idFraisForfait. "',0)";
            mysqli_query($idCnx,$requete);
            // passage au frais forfait suivant
            $ligne = mysqli_fetch_assoc ($idJeuRes);
        }
        mysqli_free_result($idJeuRes);       
    }        
}

/**
 * Retourne le texte de la requ�te select concernant les mois pour lesquels un 
 * visiteur a une fiche de frais. 
 * 
 * La requ�te de s�lection fournie permettra d'obtenir les mois (AAAAMM) pour 
 * lesquels le visiteur $unIdVisiteur a une fiche de frais. 
 * @param string $unIdVisiteur id visiteur  
 * @return string texte de la requ�te select
 */                                                 
function obtenirReqMoisFicheFrais() {
    $req = "SELECT FicheFrais.mois FROM  FicheFrais ORDER BY FicheFrais.mois desc ";
    return $req ;
}  
   
function obtenirReqUsers() {
    $req = "select  prenom, nom, id from Visiteur where admin = 0;";
    return $req ;
}

/**
 * Retourne le texte de la requ�te select concernant les �l�ments forfaitis�s 
 * d'un visiteur pour un mois donn�s. 
 * 
 * La requ�te de s�lection fournie permettra d'obtenir l'id, le libell� et la
 * quantit� des �l�ments forfaitis�s de la fiche de frais du visiteur
 * d'id $idVisiteur pour le mois $mois    
 * @param string $unMois mois demand� (MMAAAA)
 * @param string $unIdVisiteur id visiteur  
 * @return string texte de la requ�te select
 */                                                 
function obtenirReqEltsForfaitFicheFrais($unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    $requete = "SELECT idFraisForfait, libelle, quantite FROM LigneFraisForfait
              INNER JOIN FraisForfait on FraisForfait.id = LigneFraisForfait.idFraisForfait
              WHERE idVisiteur='" . $unIdVisiteur . "' AND mois='" . $unMois . "'";
    return $requete;
}

/**
 * Retourne le texte de la requ�te select concernant les �l�ments hors forfait 
 * d'un visiteur pour un mois donn�s. 
 * 
 * La requ�te de s�lection fournie permettra d'obtenir l'id, la date, le libell� 
 * et le montant des �l�ments hors forfait de la fiche de frais du visiteur
 * d'id $idVisiteur pour le mois $mois    
 * @param string $unMois mois demand� (MMAAAA)
 * @param string $unIdVisiteur id visiteur  
 * @return string texte de la requ�te select
 */                                                 
function obtenirReqEltsHorsForfaitFicheFrais($unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    $requete = "SELECT id, date, libelle, montant FROM LigneFraisHorsForfait
              WHERE idVisiteur='" . $unIdVisiteur 
              . "' and mois='" . $unMois . "'";
    return $requete;
}

/**
 * Supprime une ligne hors forfait.
 * Supprime dans la BD la ligne hors forfait d'id $unIdLigneHF
 * @param resource $idCnx identifiant de connexion
 * @param string $idLigneHF id de la ligne hors forfait
 * @return void
 */
function supprimerLigneHF($idCnx, $unIdLigneHF) {
    $requete = "DELETE FROM LigneFraisHorsForfait WHERE id = " . $unIdLigneHF;
    mysqli_query($idCnx,$requete);
}

function refuserLigneHF($idCnx, $unIdLigneHF) {
    $requeteTake = "select libelle from LigneFraisHorsForfait where id =" . $unIdLigneHF;
    $refuse = mysqli_query($idCnx, $requeteTake);
    $libelle= mysqli_fetch_assoc($refuse);
    if (preg_match('/REFUSE: /',$libelle["libelle"])){
      $texte = $libelle["libelle"];
    }else{
      $texte = "REFUSE: " . $libelle["libelle"];
    }
    $requetePut = "update LigneFraisHorsForfait set libelle = '" . $texte
                . " ' where id = " . $unIdLigneHF;
    mysqli_query($idCnx, $requetePut);
    return $texte;
}
/**
 * Ajoute une nouvelle ligne hors forfait.
 * Ins�re dans la BD la ligne hors forfait de libell� $unLibelleHF du montant 
 * $unMontantHF ayant eu lieu � la date $uneDateHF pour la fiche de frais du mois
 * $unMois du visiteur d'id $unIdVisiteur
 * @param resource $idCnx identifiant de connexion
 * @param string $unMois mois demand� (AAMMMM)
 * @param string $unIdVisiteur id du visiteur
 * @param string $uneDateHF date du frais hors forfait
 * @param string $unLibelleHF libell� du frais hors forfait 
 * @param double $unMontantHF montant du frais hors forfait
 * @return void
 */
function ajouterLigneHF($idCnx, $unMois, $unIdVisiteur, $uneDateHF, $unLibelleHF, $unMontantHF) {
    $unLibelleHF = filtrerChainePourBD($unLibelleHF);
    $uneDateHF = filtrerChainePourBD(convertirDateFrancaisVersAnglais($uneDateHF));
    $unMois = filtrerChainePourBD($unMois);
    $requete = "INSERT INTO LigneFraisHorsForfait(idVisiteur, mois, date, libelle, montant) 
                VALUES ('" . $unIdVisiteur . "','" . $unMois . "','" . $uneDateHF . "','" . $unLibelleHF . "'," . $unMontantHF .")";
    mysqli_query($idCnx,$requete);
}

/**
 * Modifie les quantit�s des �l�ments forfaitis�s d'une fiche de frais. 
 * Met � jour les �l�ments forfaitis�s contenus  
 * dans $desEltsForfaits pour le visiteur $unIdVisiteur et
 * le mois $unMois dans la table LigneFraisForfait, apr�s avoir filtr� 
 * (annul� l'effet de certains caract�res consid�r�s comme sp�ciaux par 
 *  MySql) chaque donn�e   
 * @param resource $idCnx identifiant de connexion
 * @param string $unMois mois demand� (MMAAAA) 
 * @param string $unIdVisiteur  id visiteur
 * @param array $desEltsForfait tableau des quantit�s des �l�ments hors forfait
 * avec pour cl�s les identifiants des frais forfaitis�s 
 * @return void  
 */
function modifierEltsForfait($idCnx, $unMois, $unIdVisiteur, $desEltsForfait) {
    $unMois=filtrerChainePourBD($unMois);
    $unIdVisiteur=filtrerChainePourBD($unIdVisiteur);
    foreach ($desEltsForfait as $idFraisForfait => $quantite) {
        $requete = "UPDATE LigneFraisForfait SET quantite = " . $quantite 
                    . " WHERE idVisiteur = '" . $unIdVisiteur . "' AND mois = '"
                    . $unMois . "' AND idFraisForfait='" . $idFraisForfait . "'";
      mysqli_query($idCnx,$requete);
    }
}

function validerEltsForfait($idCnx, $unMois, $unIdVisiteur) {
  $unMois = date("Y-m-d");
  $requete = "UPDATE FicheFrais SET idEtat = 'VA' and dateModif = '". $unMois ."'
               where idVisiteur = '" . $unIdVisiteur . "' and mois = '"
              . $unMois . "'";
  mysqli_query($idCnx, $requete);
  return $requete;
}
/**
 * Contr�le les informations de connexionn d'un utilisateur.
 * V�rifie si les informations de connexion $unLogin, $unMdp sont ou non valides.
 * Retourne les informations de l'utilisateur sous forme de tableau associatif 
 * dont les cl�s sont les noms des colonnes (id, nom, prenom, login, mdp)
 * si login et mot de passe existent, le bool�en false sinon. 
 * @param resource $idCnx identifiant de connexion
 * @param string $unLogin login 
 * @param string $unMdp mot de passe 
 * @return array tableau associatif ou bool�en false 
 */
function verifierInfosConnexion($idCnx, $unLogin, $unMdp) {
    $unLogin = filtrerChainePourBD($unLogin);
    $unMdp = filtrerChainePourBD($unMdp);
    // le mot de passe est crypt� dans la base avec la fonction de hachage md5
    $req = "SELECT id, nom, prenom, login, mdp FROM Visiteur WHERE login='".$unLogin."' AND mdp='" . $unMdp . "'";
    $idJeuRes = mysqli_query($idCnx,$req);
    $ligne = false;
    if ( $idJeuRes ) {
        $ligne = mysqli_fetch_assoc($idJeuRes);
        mysqli_free_result($idJeuRes);
    }
    return $ligne;
}

/**
* V�rifie le n° admin de la personne qui se connecte dans la base de donn�es
*@param ressource $unLogin
*@param ressource $unMdp
*@return la valeur du admin (0 ou 1)
*/
function verifierAdminNo($idCnx, $unLogin, $unMdp) {
	$unLogin = filtrerChainePourBD($unLogin);
	$unMdp = filtrerChainePourBD($unMdp);
	$req = "SELECT admin FROM Visiteur WHERE login='".$unLogin."' AND mdp='" . $unMdp . "'";
	$reponse = mysqli_query($idCnx, $req);
	$donnees = mysqli_fetch_assoc($reponse);
	if($donnees["admin"] == '1'){
		return 1;
	}elseif($donnees["admin"] == '0'){
		return 0;
	}
}
/**
 * Modifie l'�tat et la date de modification d'une fiche de frais
 
 * Met � jour l'�tat de la fiche de frais du visiteur $unIdVisiteur pour
 * le mois $unMois � la nouvelle valeur $unEtat et passe la date de modif � 
 * la date d'aujourd'hui
 * @param resource $idCnx identifiant de connexion
 * @param string $unIdVisiteur 
 * @param string $unMois mois sous la forme aaaamm
 * @return void 
 */
function validerEtatFicheFrais($idConnexion, $unMois, $unIdVisiteur, $unEtat) {
    $requete = "UPDATE FicheFrais SET idEtat = '" . $unEtat . 
               "', dateModif = now() WHERE idVisiteur ='" .
               $unIdVisiteur . "' and mois = '". $unMois . "'";
    mysqli_query($idConnexion,$requete);
      return $requete;
}             

function SelectMois($current_month, $current_year, $month, $sSelect, $sOption, $selectedDate = null)
{
    $options = sprintf($sOption, '-1', 'Sélectionnez un mois');
    for($i = 0, $m = $current_month, $y = $current_year; $i < 12; $i++, $m++)
    {
        if($m < 1)
        {
            $m = 12;
            $y--;
        }
        $value = sprintf("%02d",$m) .''. $y;
        if(!is_null($selectedDate) && $selectedDate == $value)
        {
            $value .= '" selected="selected';
        }
        $label = $month[(int)$m] ." - ". $y;
        $options .= sprintf($sOption, $value, $label);
    }
    $select = sprintf($sSelect, $options);
    return $select;
}
$month = array(
     1 => 'Janvier',
     2 => 'Février',
     3 => 'Mars',
     4 => 'Avril',
     5 => 'Mai',
     6 => 'Juin',
     7 => 'Juillet',
     8 => 'Août',
     9=> 'Septembre',
    10=> 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
); 

function obtenirIdEtatFicheFrais($idConnexion, $unMois, $unIdVisiteur) {
    $unMois = filtrerChainePourBD($unMois);
    $requete= "SELECT idEtat FROM FicheFrais WHERE idVisiteur = '" . $unIdVisiteur . "' and mois = '"
              . $unMois . "'";
  return $requete;
}