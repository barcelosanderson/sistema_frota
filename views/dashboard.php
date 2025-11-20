<?php
require "../database/connection.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$totalMotoristas = $pdo->query("SELECT COUNT(*) FROM motoristas")->fetchColumn();
$totalVeiculos  = $pdo->query("SELECT COUNT(*) FROM veiculos")->fetchColumn();
$totalViagens   = $pdo->query("SELECT COUNT(*) FROM viagens")->fetchColumn();

$title = "Dashboard";
ob_start();
?>

<div class="row">

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h4>Motoristas</h4>
            <h3><?= $totalMotoristas ?></h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h4>Veículos</h4>
            <h3><?= $totalVeiculos ?></h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <h4>Viagens</h4>
            <h3><?= $totalViagens ?></h3>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
include "layout.php";
