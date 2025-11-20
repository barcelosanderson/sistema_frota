<?php
require "../database/connection.php";

class ViagensController {

    public function criar() {
        global $pdo;

        $sql = $pdo->prepare("
            INSERT INTO viagens (motorista_id, veiculo_id, data_viagem, origem, destino, valor)
            VALUES (?, ?, ?, ?, ?, ?)
        ");


        $sql->execute([
            $_POST['motorista'],
            $_POST['veiculo'],
            $_POST['data_viagem'],
            $_POST['origem'],
            $_POST['destino'],
            $_POST['valor']
        ]);

        header("Location: ../views/viagens.php?msg=criado");
    }

    public function atualizar($id) {
        global $pdo;

        $sql = $pdo->prepare("
            UPDATE viagens SET
                motorista_id = ?,
                veiculo_id = ?,
                data_viagem = ?,
                origem = ?,
                destino = ?,
                valor = ?
            WHERE id = ?
        ");

        $sql->execute([
            $_POST['motorista'],
            $_POST['veiculo'],
            $_POST['data_viagem'],
            $_POST['origem'],
            $_POST['destino'],
            $_POST['valor'],
            $id
        ]);

        header("Location: ../views/viagens.php?msg=editado");
    }

    public function excluir($id) {
        global $pdo;

        $pdo->prepare("DELETE FROM viagens WHERE id = ?")->execute([$id]);

        header("Location: ../views/viagens.php?msg=excluido");
    }
}


// ---- ROTEADOR SIMPLES ----
$acao = $_GET['acao'] ?? '';
$id = $_GET['id'] ?? null;
//aaa
$controller = new ViagensController();

if ($acao == "criar") $controller->criar();
if ($acao == "atualizar") $controller->atualizar($id);
if ($acao == "excluir") $controller->excluir($id);

