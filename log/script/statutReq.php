<?php
//Index 7
require('db.php');
if (isset($_GET['id_Requete']) and isset($_GET["resultat"]) and isset($_GET["user"]) and 
    isset($_GET['observation'])
) {
    $idRequete = $_GET['id_Requete'];
    $statut = $_GET["resultat"] == "fonde" ? 2 : 1;
    $idEtudiant = $_SESSION["id_Etudiant"];
    $user = $_GET["user"];
    $dateTraitement = date("Y-m-d");
    $observation = $_GET['observation'];
    $req = 'INSERT INTO `resultat`(`Statut_Req`, `Traiteur_Req`, `DateTrai_Req`, `id_Requete`, `observation`) 
    VALUES (?,"'.$user.'","'.$dateTraitement.'",?,"'.$observation.'")';
    $a = $bdd->prepare($req);
    $a->execute(array($statut, $idRequete));
    header('location:'.$_SERVER['HTTP_REFERER']);
} else if(isset($_POST['idRequete'])){
    $idRequete = $_POST['idRequete'];
    $req = 'SELECT `Statut_Req`, `Traiteur_Req`, `DateTrai_Req`  FROM `resultat` WHERE `id_Requete` = "' . $idRequete . '"';
    $a = $bdd->prepare($req);
    $a->execute();
    $res = $a->fetchAll(PDO::FETCH_ASSOC);
    $val = json_encode($res);
    echo $val;
}
