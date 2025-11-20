<?php
$title = "Viagens";
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Viagens</h2>
    <a href="viagens_novo.php" class="btn btn-primary">+ Nova Viagem</a>
</div>

<?php if(isset($_GET['msg'])): ?>
    <div class="alert alert-success">
        <?php if($_GET['msg']=="criado") echo "Viagem registrada!";
              if($_GET['msg']=="editado") echo "Viagem atualizada!";
              if($_GET['msg']=="excluido") echo "Viagem excluída!";
        ?>
    </div>
<?php endif; ?>

<div class="card p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Motorista</th>
                <th>Veículo</th>
                <th>Data</th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php
            require "../database/connection.php";

            $sql = $pdo->query("
                SELECT v.*, 
                       m.nome AS motorista, 
                       ve.modelo AS veiculo
                FROM viagens v
                INNER JOIN motoristas m ON v.motorista_id = m.id
                INNER JOIN veiculos ve ON v.veiculo_id = ve.id
                ORDER BY v.id DESC
            ");

            foreach($sql as $vi):
        ?>
            <tr>
                <td><?= $vi['motorista'] ?></td>
                <td><?= $vi['veiculo'] ?></td>
                <td><?= date('d/m/Y', strtotime($vi['data_viagem'])) ?></td>
                <td><?= $vi['origem'] ?></td>
                <td><?= $vi['destino'] ?></td>
                <td>R$ <?= number_format($vi['valor'], 2, ',', '.') ?></td>

                <td>
                    <a href="viagens_editar.php?id=<?= $vi['id'] ?>" 
                       class="btn btn-sm btn-warning">Editar</a>

                    <a href="../controllers/viagens.php?acao=excluir&id=<?= $vi['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Excluir esta viagem?')">
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
?>
