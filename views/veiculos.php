<?php
$title = "Veículos";
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Veículos</h2>
    <a href="veiculos_novo.php" class="btn btn-primary">+ Novo Veículo</a>
</div>

<?php if(isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?php if($_GET['msg']=="criado") echo "Veículo cadastrado!";
              if($_GET['msg']=="editado") echo "Veículo atualizado!";
              if($_GET['msg']=="excluido") echo "Veículo removido!";
        ?>
    </div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ano</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php
            require "../database/connection.php";
            $st = $pdo->query("SELECT * FROM veiculos ORDER BY id DESC");

            foreach($st as $v):
        ?>
            <tr>
                <td><?= $v['modelo'] ?></td>
                <td><?= $v['placa'] ?></td>
                <td><?= $v['ano'] ?></td>
                <td>
                    <span class="badge bg-<?= $v['status'] == 'ativo' ? 'success' : 'secondary' ?>">
                        <?= ucfirst($v['status']) ?>
                    </span>
                </td>
                <td>
                    <a href="veiculos_editar.php?id=<?= $v['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../controllers/veiculos.php?acao=excluir&id=<?= $v['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Excluir este veículo?')">
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
