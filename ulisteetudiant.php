<?php
session_start();
include_once "connexionBD.php";
$bdd = ConnexionBD::getInstance();
$stmt = $bdd->prepare("SELECT * FROM etudiant");
$stmt->execute();
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Etudiants</title>
    <link href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand text-white">Étudiants</span>
        <a href="acceuil.php" class="btn btn-light">Accueil</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card p-4 shadow">
        <h3 class="mb-4">Liste des Étudiants</h3>

        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['nom']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>