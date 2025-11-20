<?php
$title = "Nova Viagem";
ob_start();
require "../database/connection.php";

$motoristas = $pdo->query("SELECT * FROM motoristas ORDER BY nome")->fetchAll();
$veiculos   = $pdo->query("SELECT * FROM veiculos ORDER BY modelo")->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nova Viagem</h2>
    <a href="viagens.php" class="btn btn-secondary">Voltar</a>
</div>

<div class="card p-4">

    <form method="POST" action="../controllers/viagens.php?acao=criar">

        <div class="mb-3">
            <label class="form-label">Motorista</label>
            <select name="motorista" class="form-control" required>
                <?php foreach($motoristas as $m): ?>
                    <option value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Veículo</label>
            <select name="veiculo" class="form-control" required>
                <?php foreach($veiculos as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= $v['modelo'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Data da Viagem</label>
            <input type="date" name="data_viagem" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Origem</label>
            <input type="text" name="origem" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Destino</label>
            <input type="text" name="destino" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" name="valor" class="form-control" required>
        </div>

        <button class="btn btn-success">Salvar</button>

    </form>

</div>

<?php
$content = ob_get_clean();
include "layout.php";
?>
