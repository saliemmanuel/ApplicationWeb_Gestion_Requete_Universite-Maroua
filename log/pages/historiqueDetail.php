<?php
session_start();
require_once('../script/identifier.php') ?>
<?php //include("../script/statutReq.php") 
?>

<!DOCTYPE html>
<html lang="fr" charset=UTF-8>

<head>
    <link rel="stylesheet" href="../style/all.css">
    <title>Détail requête traité</title>
</head>

<body class="howto">
    <div class="navbar">
        <a href="" class="logo">REQUEST</a>
        <div class="header-right">
            <a href="#"> <img src="../img/b_docs.png" alt="aide"> Help</a>
        </div>
    </div>
    <div id="wrapper">

        <div class="row">

            <div class="large-12 columns">
                <div class="container_detail">
                    <?php
                    require("../script/db.php");

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
                                    Niveeau : <b> <?php echo $value["Niveau_Etudiant"] ?></b> <br> <br>
                                    Matricule : <b><?php echo $value["matricule_Etudiant"] ?></b> <br> <br><?php
                                                                                                            $fi = $value["id_Depart"];
                                                                                                            $filiere = "SELECT  `Nom_Depart` FROM `departement` WHERE `id_Depart` = ?";
                                                                                                            $infoEtudiant = $bdd->prepare($filiere);
                                                                                                            $infoEtudiant->execute(array($fi));
                                                                                                            while ($vfil = $infoEtudiant->fetch(PDO::FETCH_ASSOC)) {
                                                                                                            ?>
                                        Filiere : <b><?php echo $vfil["Nom_Depart"] ?></b><br><br>
                                </fieldset>

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
                        <?php
                        $getId_Req = $_GET['id_Requete'];
                        $observationReq = 'SELECT  `observation` FROM `resultat` WHERE `id_Requete`= ' . $getId_Req . ' ';
                        $v = $bdd->prepare($observationReq);
                        $v->execute(array());
                        while ($obs = $v->fetch(PDO::FETCH_ASSOC)) {
                            echo $obs["observation"];
                        }
                        ?>
                    </fieldset>
                </form>
            </div>

        <?php
            }
        ?>
        </div>
    </div>
    </div>

    </div>

    <footer>
        <div class="footer-left">
            Copyright (c) 2020, Universite de Maroua All rights reversed
        </div>
    </footer>

</body>
<style>
    .legand {
        color: red;
    }

    .header-right {
        float: right;
    }

    .header a.logo {
        margin-left: 100px;
    }

    /* Navbar container */
    .navbar {
        overflow: hidden;
        background-color: #2a5d84;
        padding: 8px 20px;
    }

    /* Links inside the navbar */
    .navbar a {
        float: left;
        font-size: 15px;
        color: white;
        text-align: center;
        padding: 15px 15px;
        text-decoration: none;
    }

    .navbar dropdown {
        float: left;
        font-size: 15px;
        color: white;
        text-align: center;
        padding: 15px 15px;
        text-decoration: none;
    }


    /* The dropdown container */
    .dropdown {
        float: left;
        overflow: hidden;
    }

    /* Dropdown button */
    .dropdown .dropbtn {
        border: none;
        color: white;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        float: none;
        color: black;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    /* Add a grey background color to dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .logo {
        margin-left: 100px;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    textarea {
        min-height: 100px;
    }
</style>

</html>