<?php
    namespace Projeto\php;

    class Endereco{
        //Encapsulando variaveis
        private int $codigo;
        private string $logradouro;
        private int $numero;
        private string $complemento;
        private string $bairro;
        private string $cep;
        private string $cidade;
        private string $estado;
        private string $pais;
        //metodo construtor
        public function __construct(int $codigo, 
                                    string $logradouro,
                                    int $numero,
                                    string $complemento,
                                    string $bairro,
                                    string $cep,
                                    string $cidade,
                                    string $estado,
                                    string $pais
        ){
            $this->codigo       = $codigo;
            $this->logradouro   = $logradouro;
            $this->numero       = $numero;
            $this->complemento  = $complemento;
            $this->bairro       = $bairro;
            $this->cep          = $cep;
            $this->cidade       = $cidade;
            $this->estado       = $estado;
            $this->pais         = $pais; 
        }//fim do construtor

        public function __get(string $dado):mixed
        {
            return $this->dado;
        }//fim do get

        public function __set(string $variavel, string $novoDado):void
        {
            $this->variavel = $novoDado;
        }//fim do set

        public function imprimir():string 
        {
            return "<br>Código: ".$this->codigo.
                   "<br>Logradouro: ".$this->logradouro.
                   "<br>Número: ".$this->numero.
                   "<br>Complemento: ".$this->complemento.
                   "<br>Bairro: ".$this->bairro.
                   "<br>Cep: ".$this->cep.
                   "<br>Cidade: ".$this->cidade.
                   "<br>Estado: ".$this->estado.
                   "<br>País: ".$this->pais;
        }//fim do metodo
    }//fim da classe

?><!-- Fim do PHP -->