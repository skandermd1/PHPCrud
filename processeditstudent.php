<?php
session_start();
include_once "connexionBD.php";
$bdd = ConnexionBD::getInstance();
if (isset($_POST['old_nom']) && isset($_POST['new_nom'])) {
    $nom = $_POST['old_nom'];
    $new_nom = $_POST['new_nom'];

    $stmt = $bdd->prepare("UPDATE etudiant SET nom = :new_nom WHERE nom = :nom");
    $stmt->bindParam(':new_nom', $new_nom);
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();

    header("Location: listeetudiants.php");
    exit();
}
?>