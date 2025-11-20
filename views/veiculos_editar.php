<?php
require "../database/connection.php";

$id = $_GET['id'];
$st = $pdo->prepare("SELECT * FROM veiculos WHERE id=?");
$st->execute([$id]);
$v = $st->fetch();

$title = "Editar Veículo";
ob_start();
?>

<h2 class="mb-4">Editar Veículo</h2>

<div class="card p-4">
    <form action="../controllers/veiculos.php" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $v['id'] ?>">

        <label>Modelo</label>
        <input type="text" name="modelo" class="form-control mb-3" value="<?= $v['modelo'] ?>" required>

        <label>Placa</label>
        <input type="text" name="placa" class="form-control mb-3" value="<?= $v['placa'] ?>" required>

        <label>Ano</label>
        <input type="number" name="ano" class="form-control mb-3" value="<?= $v['ano'] ?>" required>

        <label>Status</label>
        <select name="status" class="form-control mb-4">
            <option value="ativo"   <?= $v['status']=='ativo' ? 'selected' : '' ?>>Ativo</option>
            <option value="inativo" <?= $v['status']=='inativo' ? 'selected' : '' ?>>Inativo</option>
        </select>

        <button class="btn btn-primary">Salvar Alterações</button>
        <a href="veiculos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
