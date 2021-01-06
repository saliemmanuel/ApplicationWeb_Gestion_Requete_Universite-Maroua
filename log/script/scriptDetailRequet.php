<?php
require("db.php");


$id_Etu = $_GET["id_Etudiant"];
$etu = "SELECT `id_Etudiant`, `matricule_Etudiant`, `NomComplet_Etudiant`, `password`,
`NTel_Etudiant`, `Niveau_Etudiant`, `Email_Etudiant`, `id_Depart` FROM `etudiant` WHERE `id_Etudiant` = ?";

$infoEtudiant = $bdd->prepare($etu);
$infoEtudiant->execute(array($id_Etu));
$user = $_SESSION["userName"];
$reque = "SELECT * FROM `requete` WHERE `id_Requete` = ?";
$a = $bdd->prepare($reque);
$a->execute(array($_GET["id_Requete"]));
?>
<br>
<fieldset>

  <?php while ($value = $infoEtudiant->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="containerInfoEtudiant">
      <fieldset>
        <legend>
          <div class="legand">Informations de l'étudiant</div>
        </legend>
        Nom de l'étudiant : <b> <?php echo $value["NomComplet_Etudiant"] ?></b> <br>
        <br>
        Niveau : <b> <?php echo $value["Niveau_Etudiant"] ?></b> <br> <br>
        Matricule : <b><?php echo $value["matricule_Etudiant"] ?></b> <br> <br><?php
                                                                                $fi = $value["id_Depart"];
                                                                                $filiere = "SELECT  `Nom_Depart` FROM `departement` WHERE `id_Depart` = ?";
                                                                                $infoEtudiant = $bdd->prepare($filiere);
                                                                                $infoEtudiant->execute(array($fi));
                                                                                while ($vfil = $infoEtudiant->fetch(PDO::FETCH_ASSOC)) {
                                                                                ?>
          Filiere : <b><?php echo $vfil["Nom_Depart"] ?></b><br><br>
      </fieldset>
    </div>

</fieldset>
<?php  }
?>
</b>
</div><?php } ?>
<?php while ($res = $a->fetch(PDO::FETCH_ASSOC)) {
?><br><br>
  <fieldset>
    <legend>
      <div class="legand"> Corps de la requête</div>
    </legend>
    <div class="corp_requete">
      <div class="container_objet">Objet Requpête : <b><?php echo $res["Commentaire_Req"] ?></b></div><br>
      <div class="code_ue"> Nom et code de UE : <b> <?php echo $res["code_UE"] ?></b></div><br>
      <div class="plus"> Requête déclarer sur : <b><?php echo $res["Objet_Req"] ?></b></div>
      <div class="dateEnvoi">Envoyé le : <b><?php echo $res["DateDepot_Req"] ?> </b></div>
      <hr>
      <div class="piece_justificatif">Pieces Justificatif Requête </div><br>
      <div class="piece">
        <img src="./<?php echo $res["PiecesJust_Req"] ?>" alt="non suportée" width="200">
      </div><br><br>
  </fieldset>
  <br><br>
  <form method="POST" action="#">
    <fieldset>
      <legend>
        <div class="legand">Zone de traitement</div>
      </legend>
      <textarea name="post" placeholder="Votre observation ici...."></textarea>
      <?php

      if (isset($_POST['fonde'])) {
        if (!empty(htmlspecialchars($_POST['post']))) {
          $com = "Fondé, Observation : " . htmlspecialchars($_POST['post']);
          header('location:../script/statutReq.php?id_Requete=' . $res["id_Requete"] .
            '&resultat=fonde&user=' . $user . '&observation=' . $com);
        } else {
          $com = 'Fondé, Observation: non spécifié';
          header('location:../script/statutReq.php?id_Requete=' . $res["id_Requete"] .
            '&resultat=fonde&user=' . $user . '&observation=' . $com);
        }
      }

      if (isset($_POST['nonfonde'])) {
        if (!empty(htmlspecialchars($_POST['post']))) {
          $com = "Non Fondé, Observation : " . htmlspecialchars($_POST['post']);
          header('location:../script/statutReq.php?id_Requete=' . $res["id_Requete"] .
            '&resultat=nonfonde&user=' . $user . '&observation=' . $com);
        } else {
          $com = 'Non Fondé, Observation: non spécifié';
          header('location:../script/statutReq.php?id_Requete=' . $res["id_Requete"] .
            '&resultat=nonfonde&user=' . $user . '&observation=' . $com);
        }
      }
      ?>
      <div class="action_button">
        <button type="submit" name="fonde" class="btn btn-success">Fondé</button>
        <button type="submit" name="nonfonde" class="btn btn-danger">Non Fondé</button></a>
        <!-- <button class="btn btn-danger"> Transférer</button> -->
      </div>
    </fieldset>
  </form>
  </div>

<?php
}
?>