<?php
    namespace Projeto\telas;
    require_once('../php/cliente.php');
    require_once('../php/endereco.php');
    require_once('../DAO/conexao.php');
    require_once('../DAO/cadastrar.php');
    require_once('../DAO/consultar.php');
    use Projeto\php\Cliente;
    use Projeto\php\Endereco;
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Cadastrar;
    use Projeto\DAO\Consultar;
    //instanciar as classes
    $conexao = new Conexao();
    $cadastrar = new Cadastrar();
    $consultar = new Consultar();
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
                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cadastrar
                    <?php
                        try{
                                if(isset($_POST['tCpf']) != ""){
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
                                   
                            }
                        }catch(Exception $erro){
                            echo "Algo deu errado!<br><br>$erro";
                        }//fim do try catch
                    ?>
                </a>

            </div>
        
        </div>
                <!--Modal-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            echo "Confirmar o cadastro?"
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Sim 
                            <?php
                            if (isset($_POST['tCpf']) != "") {
                                //Criando o objeto endereco
                                $cadastrar->cadastrarEndereco($conexao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado, $pais);
 
                                //Criando o objeto pessoa
                                $flag = $cadastrar->cadastrarCliente($conexao, $cpf, $nome, $telefone, $totalCompras, $consultar->consultarEndereco($conexao));
                            }
                            ?>
                        </button>
                        
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não </button>
                    </div>
                    </div>
                </div>
                </div> <!-- fim da modal-->
    </form>
    <button class="btn btn-danger">
        <a href="index.php" style="color:#fff;text-decoration:none;">Voltar</a>
    </button>
</body>
</html>