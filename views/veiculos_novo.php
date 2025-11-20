<?php
$title = "Novo Veículo";
ob_start();
?>

<h2 class="mb-4">Cadastrar Veículo</h2>

<div class="card p-4">
    <form action="../controllers/veiculos.php" method="POST">
        <input type="hidden" name="acao" value="criar">

        <label>Modelo</label>
        <input type="text" name="modelo" class="form-control mb-3" required>

        <label>Placa</label>
        <input type="text" name="placa" class="form-control mb-3" required>

        <label>Ano</label>
        <input type="number" name="ano" class="form-control mb-3" required>

        <label>Status</label>
        <select name="status" class="form-control mb-4">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>

        <button class="btn btn-success">Salvar</button>
        <a href="veiculos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
