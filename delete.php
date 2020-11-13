<?php

require_once("./config/conexao.php");

if (isset($_GET) && $_GET) {
    $query = $dbh->prepare('delete from clientes where id = :id');
    $excluir = $query->execute([
        ":id" => $_GET["id"]
    ]);
}
$query = $dbh->prepare('select * from clientes');
$query->execute();

$arrayClientes = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
<main class="container">
    <h3 class="col-12 text-center my-3">Deletar Cliente</h3>
    <article class="row">
        <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="clientesTb">
            <table class="table my-5">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($arrayClientes as $clientes) : ?>
                        <tr>
                            <th scope="row"><?= $clientes["nome"] ?></th>
                            <td><?= $clientes["sobrenome"] ?></td>
                            <td><?= $clientes["email"] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $clientes["id"] ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modal<?= $clientes["id"] ?>">
                                    <i class="fas fa-trash"></i>
                                </a>

                                <div class="modal fade" id="modal<?= $clientes["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Deseja realmente excluir ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Usuário: <?= $clientes["nome"] ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="clientes.php?id=<?= $clientes["id"] ?>">
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <div class="col-md-12">
            <?php
            if (isset($_GET) && $_GET) {
                if ($excluir) {
                    echo '<div class="col-md-12 alert-success">Usuário exclúido com sucesso</div>';
                } else {
                    echo '<div class="col-md-12 alert-danger">Falha ao processar requisição</div>';
                }
            }
            ?>
        </div>
    </article>
</main>
<?php require_once("./inc/footer.php"); ?>