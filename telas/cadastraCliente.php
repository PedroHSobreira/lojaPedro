<?php
    namespace Projeto\telas;
    require_once('../php/cliente.php');
    require_once('../php/endereco.php');
    require_once('../DAO/conexao.php');
    require_once('../DAO/cadastrar.php');
    use Projeto\php\Cliente;
    use Projeto\php\Endereco;
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Cadastrar;
    //instanciar as classes
    $conexao = new Conexao();
    $cadastrar = new Cadastrar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Cadastrar Cliente</title>
</head>
<body>
    <form class="align-middle" method="POST">
        <h1> Cadastrar Cliente</h1>

        <h5> Informe os seguintes dados </h5>
        <br>
        <div class="row">
                <div class="col">
                <label for="lCpf" class="form-label">CPF: </label>
                <input type="text" class="form-control" id="lCpf" name="tCpf">
            </div>

            <div class="col">
                <label for="lNome" class="form-label">Nome: </label>
                <input type="text" class="form-control" id="lNome" name="tNome">
            </div>

            <div class="col">
                <label for="lTelefone" class="form-label">Telefone: </label>
                <input type="text" class="form-control" id="tTelefone" name="tTelefone"/><br>
            </div> 
        </div>    

        <div class="row">
            <div class="col">
                <label for="lRua" class="form-label">Rua: </label>
                <input type="text" class="form-control" id="tRua" name="tRua"/><br>
            </div>

            <div class="col">
                <label for="lNumero" class="form-label">Número: </label>
                <input type="number" class="form-control" id="tNumero" name="tNumero"/><br>
            </div>

            <div class="col">
                <label for="lComplemento" class="form-label">Complemento: </label>
                <input type="text" class="form-control" id="tComplemento" name="tComplemento"/><br>
            </div>

            <div class="col">
                <label for="lCep" class="form-label">Cep: </label>
                <input type="text" class="form-control" id="tCEP" name="tCEP"/><br>
            </div>
        </div>  

        <div class="row">
            <div class="col">
                <label for="lBairro" class="form-label">Bairro: </label>
                <input type="text" class="form-control" id="tBairro" name="tBairro"/><br>
            </div>

            <div class="col">
                <label for="lCidade" class="form-label">Cidade: </label>
                <input type="text" class="form-control" id="tCidade" name="tCidade"/><br>
            </div>

            <div class="col">
                <label for="lEstado" class="form-label">Estado: </label>
                <input type="text" class="form-control" id="tEstado" name="tEstado"/><br>
            </div>

            <div class="col">
                <label for="lPais" class="form-label">País: </label>
                <input type="text" class="form-control" id="tPais" name="tPais"/><br>
            </div>
        </div>  

        <div class="row">
            <div class="col">
                <label for="lCompras" class="form-label">Total de Compras: </label>
                <input type="text" class="form-control" id="tCompras" name="tCompras"/><br>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary">Cadastrar
                    <?php
                        try{
                            if(isset($_POST['tCPF']) != ""){
                            $cpf            = $_POST['tCpf'];
                            $nome           = $_POST['tNome'];
                            $telefone       = $_POST['tTelefone'];
                            $rua            = $_POST['tRua'];
                            $numero         = $_POST['tNumero'];
                            $complemento    = $_POST['tComplemento'];
                            $cep            = $_POST['tCEP'];
                            $bairro         = $_POST['tBairro'];
                            $cidade         = $_POST['tCidade'];
                            $estado         = $_POST['tEstado'];
                            $pais           = $_POST['tPais'];
                            $totalCompras   = $_POST['tCompras'];
                            //criado o objetivo 
                            $cadastrar->cadastrarEndereco($conexao, 
                                                    $rua,
                                                    $numero, 
                                                    $complemento, 
                                                    $bairro, 
                                                    $cep, 
                                                    $cidade, 
                                                    $estado, 
                                                    $pais);

                            //Criando o objeto pessoa
                            $cadastrar->cadastrarCliente($cpf, $nome, $telefone, $endereco, $totalCompras,1);
                        }else{
                            echo "Preencha os dados";
                        }
                        }catch(Exception $erro){
                            echo "Algo deu errado!<br><br>$erro";
                        }//fim do try catch
                    ?>
                </button>
                <button type="button" class="btn btn-outline-danger">Voltar</button>
            </div>
        </div> 
    <form>
</body>
</html>