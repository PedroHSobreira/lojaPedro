<?php
    namespace Projeto\DAO;
    require_once('conexao.php');
    use Projeto\DAO\Conexao;

    class Consultar{
        function consultarEndereco(conexao $conexao){
            try{
                $conn = $conexao->conectar();
                $sql = "select max(codigo) from endereco";
                $result = mysql_query($conn, $sql);

                while($dado = mysqli_fetch_Array($result)){
                    return $dados['max(codigo)'];//Retorna o ultimo codigo de endereco cadastrado
            }

            }catch(Exception $erro){
                echo "<br><br> Algo deu errado!<br><br> $erro";
            }//fim do try catch
        }//fim do metodo consultarEndereco
        
        function ConsultarCliente(conexao $conexao, string $cpf){
            try{
                $conn   = $conexao->conectar();
                $sql    = "select * from cliente C inner join endereco E on
                           c.codigoEndereco = e.codigo and c.cpf = '$cpf'";
                $result = mysqli_query($conn, $sql);

                while($dados = mysqli_fetch_Array($result)){
                    if($dados['cpf'] == $cpf){
                        echo "<br> CPF: ".$dados['cpf'].
                             "<br> Nome: ".$dados['nome'].
                             "<br> Telefone: ".$dados['telefone'].
                             "<br> Total de Compras: ".$dados['totalCompras'].
                             "<br> Logradouro: ".$dados['logradouro'].
                             "<br> Número: ".$dados['numero'].
                             "<br> Complemento: ".$dados['complemento'].
                             "<br> Bairro: ".$dados['bairro'].
                             "<br> Cidade: ".$dados['cidade'].
                             "<br> Estado: ".$dados['estado'].
                             "<br> País: ".$dados['pais'];
                    return;//Encerrar o processo
                    }//fim do if
                }//fim do while
            }catch(Exception $erro){
                echo "Algo deu errado!<br><br> $erro";
            }//fim do try catch
        }//fim do consultarCliente


    }//fim do consultar
?>