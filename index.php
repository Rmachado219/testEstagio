<?php
    require_once("./config/conexao.php");

    if(isset($_POST) && $_POST){
        $nome = $_POST["inputNome"];
        $sobrenome = $_POST["inputSobrenome"];
        $telefone = $_POST["inputTelefone"];
        $dataDeNascimento = $_POST["inputNascimento"];
        $cep = $_POST["inputCep"];
        $endereco = $_POST["inputEndereco"];
        $bairro = $_POST["inputBairro"];
        $referencia = $_POST["inputReferencia"];
        $email = $_POST["inputEmail"];

        $query = $dbh->prepare('insert into clientes (nome, sobrenome, telefone, dataDeNascimento, cep, endereco, bairro, referencia, email) values (:nome, :sobrenome, :telefone, :dataDeNascimento, :cep, :endereco, :bairro, :referencia, :email)');

        $cadastro = $query->execute([
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
    <h3 class="text-center mt-5">Seja Bem Vindx!</h3>
    <main class="container">
        <article class="row">
            <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="cadastroform">
                <h3 class="col-12 text-center my-3">Cadastro de Cliente</h3>
                    <form action="index.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sobrenome">Sobrenome:</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefone">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dataDeNascimento">Data Nascimento:</label>
                                <input type="text" class="form-control" id="dataDeNascimento" name="dataDeNascimento" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cep">Cep:</label>
                                <input type="text" class="form-control" id="cep" name="cep" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="referencia">Referência:</label>
                                <input type="text" class="form-control" id="referencia" name="referencia" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
                        <div class="form-group">

                        </div>
                    </form>

            </section>

        </article>
    </main>


<?php require_once("./inc/footer.php"); ?>   