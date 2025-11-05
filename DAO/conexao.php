<?php
    namespace Projeto\DAO;


    class Conexao{
        function conectar(){
            try{
                $conn = mysqli_connect('localhost', 'root', '', 'lojaPedro2');
                if($conn){
                    return $conn;
            }
            }catch(Exception $erro){
                return "Algo deu errado!<br><br>$erro";
            }//fim do try catch
        }//fim do conectar
    }//fim da classe

?>