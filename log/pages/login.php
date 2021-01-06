<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>
<!DOCTYPE html>

<html lang="fr" charset=UTF-8>

<head>
    <link rel="stylesheet" href="../style/all.css">
    <title>Connexion</title>
</head>

<body class="howto">
    <div id="fb-root"></div>
    <div class="navbar">
        <a href="" class="logo">REQUEST</a>

    </div>
    <main>
        <article>
            <div id="wrapper">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="container_connexion">
                            <h1>CONNEXION</h1><br>
                            <form action="../script/seConnecter.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="login" placeholder="Login" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" placeholder="Mot de Passe" class="form-control"></div>
                                <p class="forgot-password-link">
                                    <input type="checkbox" name="" id=""> Retenir mon mot de passe pendant deux semaines
                                </p>
                                <button type="submit" class="btn btn-danger">Se Connecter</button>
                                </a>
                                <button type="reset" class="btn btn-danger">Reinitialiser</button>


                            </form>
                            <?php if (!empty($erreurLogin)) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $erreurLogin ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>

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