<?php
    namespace Projeto\php;
    require_once('endereco.php');//chamando o arquivo que vou utilizar
    use Projeto\php\Endereco;//apontando para a classe

    class Pessoa{
        //Definindo as variaveis
        protected string $cpf;
        protected string $nome;
        protected string $telefone;
        protected Endereco $endereco;

        //Criar o construtor
        public function __construct(string $cpf,
                                    string $nome,
                                    string $telefone,
                                    Endereco $endereco)
        {
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
        }//fim do construtor

        public function __get(string $dado):mixed
        {
            return $this->dado;
        }//fim do get

        public function __set(string $variavel, string $dado):void
        {
            $this->variavel = $dado;
        }//fim do set

        public function imprimir():string
        {
            return "<br>CPF: ".$this->cpf.
                   "<br>Nome: ".$this->nome.
                   "<br>Telefone: ".$this->telefone.
                   "<br>Endereço: ".$this->endereco->imprimir();
        }//fim do string
    }//fim da classe
?>