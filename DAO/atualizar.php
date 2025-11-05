<?php
    namespace Projeto\DAO;
    require_once("../DAO/conexao.php");
    require_once("../DAO/consultar.php");
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Consultar;

    class Atualizar{
        function AtualizarCLiente(Conexao $conexao,
                                  string $campo,
                                  string $novoDado,
                                  string $cpf
    )
    {
            try{
                $conn = $conexao->conectar();
                $sql  = "update cliente set $campo = '$novoDado' where cpf = '$cpf'";
                $result = mysqli_query($conn,$sql);
                mysqli_close($conn);

                if($result){
                    return "Atualizado com sucesso!";
                }//fim do if
            }catch(Exception $erro){
                    return "Algo deu errado! $erro";
            }
    }//fim do atualizarCliente
}//fim da classe


?>