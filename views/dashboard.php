<?php
require "../database/connection.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$totalMotoristas = $pdo->query("SELECT COUNT(*) FROM motoristas")->fetchColumn();
$totalVeiculos  = $pdo->query("SELECT COUNT(*) FROM veiculos")->fetchColumn();
$totalViagens   = $pdo->query("SELECT COUNT(*) FROM viagens")->fetchColumn();
$totalValor = $pdo->query("SELECT SUM(valor) FROM viagens")->fetchColumn();

$sql = $pdo->query("
    SELECT DATE(data_viagem) AS dia, SUM(valor) AS total
    FROM viagens
    WHERE MONTH(data_viagem) = MONTH(CURRENT_DATE())
    AND YEAR(data_viagem) = YEAR(CURRENT_DATE())
    GROUP BY DATE(data_viagem)
    ORDER BY dia
");

$dias = [];
$totais = [];

while ($row = $sql->fetch()) {
    $dias[] = $row['dia'];
    $totais[] = floatval($row['total']);

}

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

<div class="row mt-3">

    <div class="col-md-12">
        <div class="card p-3 text-center">
            <h4>Faturamento Total (mês atual)</h4>
            <h3>R$ <?= $totalValor ?></h3>
        </div>
    </div>

</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card p-3">
            <h4 class="text-center">Faturamento diário (mês atual)</h4>
            <canvas id="graficoFaturamento" height="300"></canvas>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
include "layout.php";
