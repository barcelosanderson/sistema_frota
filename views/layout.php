<!-- views/layout.php -->
<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['user'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Sistema de Frota" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #1e1e2d;
            position: fixed;
            top: 0; left: 0;
            color: #fff;
            padding-top: 60px;
        }
        .sidebar a {
            color: #d1d1d1;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #34344e;
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 25px;
        }
        .navbar {
            margin-left: 250px;
            background: #fff;
            box-shadow: 0 0 10px #ccc;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px #ddd;
        }
    </style>
</head>
<body>

<!-- MENU LATERAL -->
<div class="sidebar">
    <h4 class="text-center mb-4">🚖 Frota</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="motoristas.php">Motoristas</a>
    <a href="veiculos.php">Veículos</a>
    <a href="viagens.php">Viagens</a>
    <a href="../logout.php" class="text-danger">Sair</a>
</div>

<!-- TOPBAR -->
<nav class="navbar navbar-expand-lg px-4 py-3">
    <span class="navbar-brand">Painel Administrativo</span>
</nav>

<!-- CONTEÚDO -->
<div class="content">
    <?= $content ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
