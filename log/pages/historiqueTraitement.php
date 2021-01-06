<?php
session_start();
require("../script/db.php"); ?>
<!DOCTYPE html>

<html lang="fr" charset=UTF-8>

<head>
    <link rel="stylesheet" href="../style/all.css">
    <title>Historique </title>
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
            <br>
            <div class="large-12 columns">
                <h4> HISTORIQUE REQUETS TRAITER    <?php
              echo  $_SESSION["niveau"] ?></h4>
            </div>
            <br>
            <?php
            $niv =  $_SESSION['niveau'];
            $id_Departement = $_SESSION["id_Depart"];
            // gestion du niveau d'etude selectionner
            switch ($niv) {
                case "LICENCE (I, II, III)":
                    $niveauEtudeSelectionner = 3;
                    break;
                case "MASTER (I, II)":
                    $niveauEtudeSelectionner  = 5;
                    break;
            }
            //Requete récupération des requete non traiter par rapport au departement et par rapport au 
            //niveau d'etude selectionner
            $reque = "SELECT DISTINCT requete.`id_Requete`, requete.`code_UE`, 
     requete.`Objet_Req`, requete.`Commentaire_Req`, requete.`PiecesJust_Req`, 
     requete.`DateDepot_Req`, requete.`id_Etudiant`, requete.`id_Depart` FROM `requete`, 
     etudiant WHERE EXISTS ( SELECT NULL FROM resultat WHERE resultat.id_Requete = requete.id_Requete 
     AND `requete`.`id_Depart` = $id_Departement ORDER BY resultat.id_Result DESC )
     AND etudiant.Niveau_Etudiant = $niveauEtudeSelectionner ";

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
                    <th>Action </th>

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
                        <center><a href="historiqueDetail.php?id_Requete=<?php echo $res["id_Requete"] ?>&id_Etudiant=<?php echo $idEtudiant ?>">
                                <button type="button" class="btn btn-danger">Détail</button></a></center>
                    </td>
                </tr>
            <?php


            }
            echo '</table>';


            ?>
        </div>
    </div>
    </div>
    </div>

    </main>



    <footer>
        <div class="footer-left">
            Copyright (c) 2020, Universite de Maroua All rights reversed
        </div>
    </footer>

</body>
<style>
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
</style>

</html>