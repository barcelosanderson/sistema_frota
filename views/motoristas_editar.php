<?php
require "../database/connection.php";

$id = $_GET['id'];
$st = $pdo->prepare("SELECT * FROM motoristas WHERE id=?");
$st->execute([$id]);
$m = $st->fetch();

$title = "Editar Motorista";
ob_start();
?>

<h2 class="mb-4">Editar Motorista</h2>

<div class="card p-4">
    <form action="../controllers/motoristas.php" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?= $m['id'] ?>">

        <label>Nome</label>
        <input type="text" name="nome" class="form-control mb-3" value="<?= $m['nome'] ?>" required>

        <label>CPF</label>
        <input type="text" name="cpf" class="form-control mb-3" value="<?= $m['cpf'] ?>" required>

        <label>CNH</label>
        <input type="text" name="cnh" class="form-control mb-3" value="<?= $m['cnh'] ?>" required>

        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control mb-3" value="<?= $m['telefone'] ?>">

        <button class="btn btn-primary">Salvar Alterações</button>
        <a href="motoristas.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
