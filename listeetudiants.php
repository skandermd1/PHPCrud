<?php
include_once "connexionBD.php";
session_start();
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
    <title>Liste des Étudiants</title> 
    <link href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand text-white">Gestion Étudiants</span>
        <a href="acceuil.php" class="btn btn-light">Accueil</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card p-4 shadow mb-4">
        <h4 class="mb-3">Ajouter un étudiant</h4>
        <form action="processaddstudent.php" id='addstudent' method="POST" class="d-flex gap-2">
            <input type="text" class="form-control" name="nom1" id='nom1' placeholder="Nom" required>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>

    <div >
        <h3 >Liste des Étudiants</h3>

        <table class="table">
            
                <tr>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant['nom']); ?></td>
                    <td >
                        <form action="deletestudent.php" class='deleteForm' method="POST">
                            <input type="hidden" name="nom" id='nom' class='nom' value="<?= $etudiant['nom'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <form action="editstudent.php" method="POST">
                            <input type="hidden" name="nom" value="<?= $etudiant['nom'] ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </table>

    </div>

</div>
<script>
    document.getElementById('addstudent').addEventListener('submit', function(e) {
        e.preventDefault();
        let nom=document.getElementById('nom1').value;
        fetch('processaddstudent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'nom1=' + encodeURIComponent(nom)
        })        .then(response => response.text())
        .then(data=>{
            let table=document.querySelector('table');
            let newRow=table.insertRow(1);
            newRow.innerHTML=`<td>${nom}</td><td>
                        <form action="deletestudent.php" method="POST">
                            <input type="hidden" name="nom" value="${nom}">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <form action="editstudent.php" method="POST">
                            <input type="hidden" name="nom" value="${nom}">
                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        </form>
                    </td>`;
            document.getElementById('nom1').value='';

        })
    });
    document.addEventListener('submit', function(e) {

    if (e.target.classList.contains('deleteForm')) {

        e.preventDefault();

        // Get nom safely
        let nom = e.target.querySelector('.nom').value;

        fetch('deletestudent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'nom=' + encodeURIComponent(nom)
        })
        .then(response => response.text())
        .then(data => {

            // Remove row
            let row = e.target.closest('tr');
            row.remove();

        });

    }

});
</script>

</body>
</html>