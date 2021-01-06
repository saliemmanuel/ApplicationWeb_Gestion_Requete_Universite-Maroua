<?php
session_start();
include('../script/identifier.php');
?>

<!DOCTYPE html>
<html lang="fr" charset=UTF-8>

<head>
  <link rel="stylesheet" href="../style/all.css">
  <title>Requete non Traiter</title>
</head>

<body class="howto">

  <div class="navbar">
    <a href="" class="logo">REQUEST</a>
    <div class="header-right">
      <div class="dropdown"><a class="dropbtn"> Génerer <img src="../img/more.png" alt="aide"> </a>
        <div class="dropdown-content">
          <a href="../script/FPDF/fpdf-ReqFonde.php">Les Résultats des requêtes Fondés</a>
          <a href="#">Les Résultats des requêtes non Fondés</a>
          <a href="#">Les Résultats des toutes requêtes </a>
        </div>
      </div>
      <a href="recherche.php">Rechercher </a>
      <div class="dropdown"><a class="dropbtn"> Paramètre <img src="../img/more.png" alt="aide"> </a>
        <div class="dropdown-content">
          <a href="#">Profil</a>
          <a href="historiqueTraitement.php">Historique </a>
          <a href="../script/deconnection.php">Déconnexion </a>
        </div>
      </div>
      <a href="#"> <img src="../img/b_docs.png" alt="aide"> Help</a>
    </div>
  </div>
  <div id="wrapper">
    <div class="row">
      <div class="large-12 columns">
        <div class="container-table-requete">
          <div>
            <h4>REQUETS NON TRAITER
              <?php
              echo  $_SESSION["niveau"]; ?>
            </h4>
          </div>
          <br>
          <?php
          require("../script/dashBard.php"); ?>
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
  .row {
    background-image: "../img/bj.jpg";
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


  /* The dropdown container */
  .dropdown {
    float: left;
    overflow: hidden;
  }

  /* Dropdown button */
  .dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    /* Important for vertical align on mobile phones */
    margin: 0;
    /* Important for vertical align on mobile phones */
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
    padding: 12px 16px;
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