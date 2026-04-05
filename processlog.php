<?php
include_once "connexionBD.php";
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $bdd = ConnexionBD::getInstance();
    $stmt = $bdd->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['username'] = $username;
        $role = $stmt->fetch(PDO::FETCH_ASSOC)['role'];
        $_SESSION['role'] = $role;
        header("Location: acceuil.php");
        exit();
    } else {
    
    header("Location: login.php?error=1");
    exit();
}
} 
?>