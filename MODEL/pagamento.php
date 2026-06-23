<?php
    namespace MODEL; 

    class Pagamento{
         private ?int $id; 
         private ?int $aluno; 
         private ?float $valor;
         private ?string $data_pagamento;
         private ?string $status;
         private ?string $mes_referencia;
  
         public function __construct(){

         }

         public function getId() {
            return $this->id; 
         }

         public function setId(int $id){
            $this->id = $id; 
         }

         public function getAluno() {
            return $this->aluno;
         }

         public function setAluno(int $aluno){
            $this->aluno = $aluno; 
         }

         public function getValor() {
            return $this->valor;
         }

         public function setValor(float $valor){
            $this->valor = $valor; 
         }

         public function getDataPagamento() {
            return $this->data_pagamento;
         }

         public function setDataPagamento(string $data_pagamento){
            $this->data_pagamento = $data_pagamento; 
         }

         public function getStatus() {
            return $this->status;
         }

         public function setStatus(string $status){
            $this->status = $status; 
         }

         public function getMesReferencia() {
            return $this->mes_referencia;
         }

         public function setMesReferencia(string $mes_referencia){
            $this->mes_referencia = $mes_referencia; 
         }
         
    }

?>
