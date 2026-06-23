<?php
    namespace MODEL; 

    class Aluno{
         private ?int $id; 
         private ?string $nome; 
         private ?string $telefone;
         private ?string $email;
         private ?int $turma;
         private ?string $data_inscricao;
  
         public function __construct(){

         }

         public function getId() {
            return $this->id; 
         }

         public function setId(int $id){
            $this->id = $id; 
         }

         public function getNome() {
            return $this->nome;
         }

         public function setNome(string $nome){
            $this->nome = $nome; 
         }

         public function getTelefone() {
            return $this->telefone;
         }

         public function setTelefone(string $telefone){
            $this->telefone = $telefone; 
         }

         public function getEmail() {
            return $this->email;
         }

         public function setEmail(string $email){
            $this->email = $email; 
         }

         public function getTurma() {
            return $this->turma;
         }

         public function setTurma(int $turma){
            $this->turma = $turma; 
         }

         public function getDataInscricao() {
            return $this->data_inscricao;
         }

         public function setDataInscricao(string $data_inscricao){
            $this->data_inscricao = $data_inscricao; 
         }
         
    }

?>
