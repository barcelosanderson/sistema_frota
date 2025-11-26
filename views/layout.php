<?php
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['user'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? "Sistema de Frota" ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    <?php include 'layout_style.css'; ?>
    </style>
</head>
<body>

<div class="sidebar">
    <img src="logo.svg">
    <div class="menu-links">
    <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : '' ?>" ><i class="bi bi-speedometer2 me-1"></i> Dashboard</a>
    <a href="motoristas.php" class="<?= basename($_SERVER['PHP_SELF']) === 'motoristas.php' ? 'active' : '' ?>"><i class="bi bi-person-vcard" me-1></i> Motoristas</a>
    <a href="veiculos.php" class="<?= basename($_SERVER['PHP_SELF']) === 'veiculos.php' ? 'active' : '' ?>"><i class="bi bi-taxi-front me-1"></i> Veículos</a>
    <a href="viagens.php" class="<?= basename($_SERVER['PHP_SELF']) === 'viagens.php' ? 'active' : '' ?>"><i class="bi bi-geo-alt me-1"></i> Viagens</a>
    </div>
    <a href="../logout.php" class="logout-link"><i class="bi bi-box-arrow-right me-1"></i> Sair</a>
</div>

<div class="content">
    <?= $content ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('graficoFaturamento');

if (ctx) {
    new Chart(ctx, {
        type: 'line',
        data: {
    labels: <?= json_encode($dias) ?>,
    datasets: [{
        label: 'Faturamento diário (R$)',
        data: <?= json_encode(array_map('floatval', $totais)) ?>,
        borderWidth: 3,
        tension: 0.3
    }]
}
,
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
}
</script>

</body>
</html>
