<?php
    namespace Projeto\telas;
    require_once("../DAO/Conexao.php");
    require_once("../DAO/Excluir.php");
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Excluir;
    $resultado = "";
    $conexao   = new Conexao();
    $excluir = new Excluir();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Excluir</title>
</head>
<body>
    <h1>Excluir</h1>
    <form method="POST" class="form-control form-control-sm">
        <div class="mb-3">
            <label class="form-label">CPF: </label>
            <input type="text" class="form-control" id="tCpf" name="tCpf">
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Excluir
            <?php
                if(isset($_POST['tCpf']) != ""){
                    $resultado = $excluir->excluirCliente($conexao,$_POST['tCpf']);
                }
            ?>
        </button>
    </form>
    <div class="mb-3">
            <?php
                echo $resultado;
            ?>
    </div>
    <button class="btn btn-danger">
        <a href ="index.php" style="color:#fff;text-decoration:none;">Voltar</a>
    </button>
</body>
</html>