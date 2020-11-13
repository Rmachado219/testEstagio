<?php 
    require_once("./config/conexao.php");

    if(isset($_GET) && $_GET){
        $id = $_GET["id"];
        $query = $dbh->prepare('select * from clientes where id = :id');
        $query->execute([
            ":id"=> $id
        ]);

        $clienteEncontrado = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST) && $_POST){
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $telefone = $_POST["telefone"];
        $dataDeNascimento = $_POST["dataDeNascimento"];
        $cep = $_POST["cep"];
        $endereco = $_POST["endereco"];
        $bairro = $_POST["bairro"];
        $referencia = $_POST["referencia"];
        $email = $_POST["email"];
    
      $query = $dbh->prepare("update clientes set nome = :nome, sobrenome = :sobrenome, telefone = :telefone, dataDeNascimento = :dataDeNascimento, cep = :cep, endereco = :endereco, bairro = :bairro, referencia = :referencia, email = :email");

        $editar = $query->execute([
            ":nome" => $nome,
            "sobrenome" => $sobrenome,
            ":telefone" => $telefone,
            ":dataDeNascimento"=> $dataDeNascimento,
            ":cep" => $cep,
            ":endereco" => $endereco,
            ":bairro" => $bairro,
            ":referencia" => $referencia,
            ":email" => $email
        ]);
    }

?>

<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
    <main class="container">
        <article class="row">
            <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="cadastroform">
                <h3 class="col-12 text-center my-3">Alterar Dados Clientes</h3>
                    <form action="edit.php" method="post">
                        <input type="hidden" class="form-control" id="id" value="<?= isset($_GET["id"]) ? $_GET["id"] : $_POST["id"] ?>" required>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($_GET["id"]) ? $clienteEncontrado["nome"] : $_POST["nome"] ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sobrenome">Sobrenome:</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?= isset($_GET["id"]) ? $clienteEncontrado["sobrenome"] : $_POST["sobrenome"] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= isset($_GET["id"]) ? $clienteEncontrado["telefone"] : $_POST["telefone"] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dataDeNascimento">Data Nascimento:</label>
                                <input type="text" class="form-control" id="dataDeNascimento" name="dataDeNascimento" value="<?= isset($_GET["id"]) ? $clienteEncontrado["dataDeNascimento"] : $_POST["dataDeNascimento"] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cep">Cep:</label>
                                <input type="text" class="form-control" id="cep" name="cep" value="<?= isset($_GET["id"]) ? $clienteEncontrado["cep"] : $_POST["cep"] ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= isset($_GET["id"]) ? $clienteEncontrado["endereco"] : $_POST["endereco"] ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" value="<?= isset($_GET["id"]) ? $clienteEncontrado["bairro"] : $_POST["bairro"] ?>" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="referencia">Referência:</label>
                                <input type="text" class="form-control" id="referencia" name="referencia" value="<?= isset($_GET["id"]) ? $clienteEncontrado["referencia"] : $_POST["referencia"] ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= isset($_GET["id"]) ? $clienteEncontrado["email"] : $_POST["email"] ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger" id="btnEditar">Editar</button>
                        <div class="form-group">
                            <?php
                                if(isset($_POST) && $_POST){
                                    if($editar){
                                        echo '<div class="col-md-6 mt-2 alert alert-success">Usuário alterado com sucesso</div>';
                                    } else {
                                        echo '<div class="col-md-6 mt-2 alert alert-danger">Falha ao processar requisição</div>';
                                    }
                                }
                        ?>
                        </div>
                    </form>

            </section>

        </article>
    </main>
<?php require_once("./inc/footer.php"); ?>   