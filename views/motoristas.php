<?php
$title = "Motoristas";
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Motoristas</h2>
    <a href="motoristas_novo.php" class="btn btn-primary">+ Novo Motorista</a>
</div>

<?php if(isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?php if($_GET['msg']=="criado") echo "Motorista criado com sucesso!";
              if($_GET['msg']=="editado") echo "Motorista atualizado!";
              if($_GET['msg']=="excluido") echo "Motorista excluído!";
        ?>
    </div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>CNH</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
            require "../database/connection.php";
            $st = $pdo->query("SELECT * FROM motoristas ORDER BY id DESC");

            foreach($st as $m):
        ?>
            <tr>
                <td><?= $m['nome'] ?></td>
                <td><?= $m['cpf'] ?></td>
                <td><?= $m['cnh'] ?></td>
                <td><?= $m['telefone'] ?></td>
                <td>
                    <a href="motoristas_editar.php?id=<?= $m['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../controllers/motoristas.php?acao=excluir&id=<?= $m['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Excluir motorista?')">
                       Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include "layout.php";
