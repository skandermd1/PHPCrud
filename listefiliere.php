<?php
include_once "connexionBD.php";
session_start();
$bdd = ConnexionBD::getInstance();
$stmt = $bdd->prepare("SELECT * FROM filiere");
$stmt->execute();
$filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
    <link href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand text-white">Gestion Filières</span>
        <a href="acceuil.php" class="btn btn-light">Accueil</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card p-4 shadow">
        <h3 class="mb-4">Liste des Filières</h3>

        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filieres as $filiere): ?>
                <tr>
                    <td><?= htmlspecialchars($filiere['nom']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
            