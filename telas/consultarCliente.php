<?php
    namespace Projeto\telas;
    require_once("../DAO/Conexao.php");
    require_once("../DAO/Consultar.php");
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Consultar;
    //Instanciar as variaveis
    $conexao   = new Conexao();
    $consultar = new Consultar();
    $resultado = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Consultar</title>
</head>
<body>
    <h1>Consultar</h1>
    <form method="POST" class="form-control form-control-sm">
        <div>
            <label class="form-label">CPF: </label>
            <input type="text" class="form-control" id="cpf" name="cpf"/>
        </div>
        <button type="submit" class="btn btn-primary">Consultar
            <?php
                if (isset($_POST['cpf']) != ""){
                    $resultado = $consultar->consultarCliente($conexao, $_POST['cpf']);
                }
            ?>
        </button>
        </div>
    </form>

        <div class="mb-3">
            <?php
                if($resultado == false && isset($_POST['cpf']) != ""){
                    echo $_POST['cpf']."não encontrado!!!!!";
                }else{
                        echo $resultado;
                }//fim do resultado
            ?>
        </div>
    <button class="btn btn-danger">
        <a href ="index.php" style="color:#fff;text-decoration:none;">Voltar</a>
    </button>
</body>
</html>