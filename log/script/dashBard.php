<?php
require("db.php");
$niv =  $_SESSION['niveau'];
$id_Departement = $_SESSION["id_Depart"];
// gestion du cycle d'etude selectionner
//Requete récupération des requete non traiter par rapport au departement et par rapport au 
//niveau d'etude selectionner
switch ($niv) {
    case "LICENCE (I, II, III)":
        $reque = "SELECT DISTINCT requete.`id_Requete`, requete.`code_UE`, 
        requete.`Objet_Req`, requete.`Commentaire_Req`, requete.`PiecesJust_Req`, 
        requete.`DateDepot_Req`, requete.`id_Etudiant`, requete.`id_Depart` FROM `requete`, 
        etudiant WHERE NOT EXISTS ( SELECT NULL FROM resultat WHERE resultat.id_Requete = requete.id_Requete 
        AND `requete`.`id_Depart` = $id_Departement ) ORDER BY requete.id_Requete DESC";
        break;
    case "MASTER (I, II)":
        $reque = "SELECT DISTINCT requete.`id_Requete`, requete.`code_UE`, 
        requete.`Objet_Req`, requete.`Commentaire_Req`, requete.`PiecesJust_Req`, 
        requete.`DateDepot_Req`, requete.`id_Etudiant`, requete.`id_Depart` FROM `requete`, 
        etudiant WHERE NOT EXISTS ( SELECT NULL FROM resultat WHERE resultat.id_Requete = requete.id_Requete 
        AND `requete`.`id_Depart` = $id_Departement )
        AND etudiant.Niveau_Etudiant = 5 ORDER BY requete.id_Requete DESC";
        break;
}
// $nomEtuRequete = 'SELECT `NomComplet_Etudiant` FROM `etudiant`, requete WHERE etudiant.`id_Etudiant` = requete.id_Etudiant';
//appel de l'exécution de la requete
$a = $bdd->prepare($reque);
$a->execute();
echo '<table class="table" >';

?>
<thead>
    <tr>

        <th> Unité Enseignement </th>
        <th> Problème déclarer sur </th>
        <th>Envoyé le </th>
        <th>
            <center>Action</center>
        </th>
    </tr>
</thead>
<?php
while ($res = $a->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
        <td>
            <?php echo $res["code_UE"] ?> </td>
        <td> <?php echo $res["Objet_Req"] ?> </td>
        <td> <?php echo $res["DateDepot_Req"] ?> </td>
        <?php $idEtudiant = $res["id_Etudiant"] ?>
        <td>
            <center><a href="detailRequete.php?id_Requete=<?php echo $res["id_Requete"] ?>&id_Etudiant=<?php echo $idEtudiant ?>">
                    <button type="button" class="btn btn-danger">Détail</button></a></center>
        </td>
    </tr>
<?php


}
echo '</table>';
