<?php
session_start() ?>
<!DOCTYPE html>
<html lang="fr" charset=UTF-8>

<head>
    <link rel="stylesheet" href="../style/all.css">
    <title>Cycle d'etude</title>
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
                <div class="container-select-cycle">
                    <h1>SELECTIONNER UN CYCLE</h1>
                    <form action="" method="POST">
                        <select name="Niveau">
                            <option value="" selected disabled>--- Selectionner ---</option>
                            <option value="LICENCE (I, II, III)">LICENCE (I, II, III)</option>
                            <option value=" "> </option>
                            <option value="MASTER (I, II)">Master (I, II)</option>
                        </select>
                        <button type="submit" name="submit" class="btn btn-danger">Suivant</button>
                    </form>
                    <?php
                    if (isset($_POST["submit"])) {
                        if (empty($_POST["Niveau"])) {
                            echo "<strong>Erreur!!</strong> Selectionner un Cycle.";
                        } else {
                            if(isset($_POST["Niveau"])){
                                $_SESSION['niveau'] = $_POST["Niveau"];
                                
                                header("location:dash.php");
                            }
                        }
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