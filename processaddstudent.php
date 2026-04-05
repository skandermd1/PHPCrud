<?php
include_once "connexionBD.php";
session_start();
$bdd = ConnexionBD::getInstance();
if (isset($_POST['nom1'])) {
    $nom = $_POST['nom1'];

    $stmt = $bdd->prepare("INSERT INTO etudiant  VALUES (:nom)");
    $stmt->bindParam(':nom', $nom);
    $stmt->execute();

    header("Location: listeetudiants.php");
    exit();
} else {
    echo "Please enter name.";
}
?>