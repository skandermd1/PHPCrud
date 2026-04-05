<?php
session_start();
include_once "connexionBD.php";
$bdd = ConnexionBD::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand text-white">Edit Student</span>
        <a href="listeetudiants.php" class="btn btn-light">Back</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card p-4 shadow mx-auto" style="max-width: 500px;">
        <h3 class="mb-4 text-center">Update Student</h3>

        <form action="processeditstudent.php" method="POST">
            <input type="hidden" name="old_nom" value="<?= $_POST['nom'] ?>">

            <div class="mb-3">
                <label class="form-label" >New Name</label>
                <input type="text" name="new_nom" class="form-control" value="<?php echo $_POST['nom']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>