<?php
    namespace Projeto\DAO;


    class Conexao{
        function conectar(){
            try{
                $conn = mysqli_connect('localhost', 'root', '', 'lojaPedro');
                if($conn){
                    echo "<br>Conectado com Sucesso!";
                    return $conn;
            }
            }catch(Exception $erro){
                echo "Algo deu errado!<br><br>$erro";
            }//fim do try catch
        }//fim do conectar
    }//fim da classe

?>