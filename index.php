<?php

    if(isset($_POST) && $_POST){
        $nome = $_POST["inputNome"];
        $telefone = $_POST["inputTelefone"];
        $nascimento = $_POST["inputNascimento"];
        $cep = $_POST["inputCep"];
        $endereco = $_POST["inputEndereco"];
        $bairro = $_POST["inputBairro"];
        $referencia = $_POST["inputReferencia"];
        $email = $_POST["inputEmail"];


    }

?>


<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
    <h3>Cadastro Cliente</h3>
    <main class="container">
        <article class="row">
            <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="cadastroform">
                <h3 class="col-12 text-center my-3"></h3>

            </section>

        </article>
    </main>


<?php require_once("./inc/footer.php"); ?>   