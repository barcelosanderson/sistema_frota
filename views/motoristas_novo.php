<?php
$title = "Novo Motorista";
ob_start();
?>

<h2 class="mb-4">Cadastrar Motorista</h2>

<div class="card p-4">
    <form action="../controllers/motoristas.php" method="POST">
        <input type="hidden" name="acao" value="criar">

        <label>Nome</label>
        <input type="text" name="nome" class="form-control mb-3" required>

        <label>CPF</label>
        <input type="text" name="cpf" class="form-control mb-3" required>

        <label>CNH</label>
        <input type="text" name="cnh" class="form-control mb-3" required>

        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control mb-3">

        <button class="btn btn-success">Salvar</button>
        <a href="motoristas.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
