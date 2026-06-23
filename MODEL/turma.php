<?php
    namespace MODEL; 

    class Turma{
         private ?int $id; 
         private ?string $nome; 
         private ?string $horario;
         private ?string $dia_semana;
         private ?string $nivel;
  
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

         public function getHorario() {
            return $this->horario;
         }

         public function setHorario(string $horario){
            $this->horario = $horario; 
         }

         public function getDiaSemana() {
            return $this->dia_semana;
         }

         public function setDiaSemana(string $dia_semana){
            $this->dia_semana = $dia_semana; 
         }

         public function getNivel() {
            return $this->nivel;
         }

         public function setNivel(string $nivel){
            $this->nivel = $nivel; 
         }
         
    }

?>
