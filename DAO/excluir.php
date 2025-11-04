<?php
    namespace Projeto\DAO;
    require_once("../DAO/conexao.php");
    require_once("../DAO/consultar.php");
    use Projeto\DAO\Conexao;
    use Projeto\DAO\Consultar;

    class Excluir{
        function ExcluirCliente(Conexao $conexao, string $cpf)
    {
            try{
                $conn = $conexao->conectar();
                $sql  = "delete from cliente where cpf = '$cpf'";
                $result = mysqli_query($conn,$sql);
                mysqli_close($conn);

                if($result){
                    echo "Excluido com sucesso!";
                }//fim do if
            }catch(Exception $erro){
                    echo "<br><br> Algo deu errado! <br><br> $erro";
            }
    }//fim do excluirCliente
}//fim da classe

?>
