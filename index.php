<?php header("Location: views/login.php"); ?>
case "viagens":
    require "./controllers/viagens.php";
    $c = new ViagensController();

    if ($action == "novo") $c->novo();
    elseif ($action == "salvar") $c->salvar();
    elseif ($action == "editar") $c->editar($_GET["id"]);
    elseif ($action == "atualizar") $c->atualizar($_GET["id"]);
    elseif ($action == "excluir") $c->excluir($_GET["id"]);
    else $c->index();
break;
