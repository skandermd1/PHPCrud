<?php
session_start();
include_once "connexionBD.php";
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];

    $bdd = ConnexionBD::getInstance();
    $stmt = $bdd->prepare("DELETE FROM etudiant WHERE nom = :nom");
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();

    header("Location: listeetudiants.php");
    exit();
} else {
    echo "Please provide a name.";
}