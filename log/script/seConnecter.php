<?php
session_start();
require_once('db.php');

$login = isset($_POST['login']) ? $_POST['login'] : "";

$password = isset($_POST['password']) ? $_POST['password'] : "";


$requete = "SELECT `Nom_ChefDep`, `NTel_ChefDep`, `id_Depart`, `id_Utilisateur`, `login`, `password` FROM
`chef_departement` WHERE `login` = '$login' AND `password` = '$password'";

$resultat = $bdd->query($requete);

if ($user = $resultat->fetch()) {
    $_SESSION["userName"]  = $user["Nom_ChefDep"];
    $_SESSION["id_Depart"] = $user["id_Depart"];
    header('location:../pages/mainPage.php');
} else {
    $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
    header('location:../pages/login.php');
}
?>


