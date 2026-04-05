<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    
    <link href="node_modules/bootswatch/dist/cyborg/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand text-white">My App</span>

    <div class="d-flex">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>


<div class="container mt-5">

    
    <div class="card shadow p-4 mb-4">
        <h2 class="mb-3">
            Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋
        </h2>

        <p class="text-muted">Role: <?php echo $_SESSION['role']; ?></p>
    </div>

    
    <div class="row g-3">

        <?php if ($_SESSION['role'] === 'admin'): ?>
        <div class="col-md-4">
            <div class="card p-3 text-center shadow">
                <h5>Gestion Étudiants</h5>
                <a href="listeetudiants.php" class="btn btn-primary mt-2">
                    Liste Étudiants
                </a>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'user'): ?>
        <div class="col-md-4">
            <div class="card p-3 text-center shadow">
                <h5>Voir Étudiants</h5>
                <a href="ulisteetudiant.php" class="btn btn-success mt-2">
                    Liste Étudiants
                </a>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-md-4">
            <div class="card p-3 text-center shadow">
                <h5>Filières</h5>
                <a href="listefiliere.php" class="btn btn-warning mt-2">
                    Liste Filières
                </a>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>