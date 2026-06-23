<?php

namespace MODEL;

class Aluguel {
    private ?int $id;
    private ?string $data_aluguel;
    private ?string $hora_inicio;
    private ?string $hora_fim;
    private ?string $quadra;
    private ?float $valor;
    private ?string $cliente;
    private ?string $telefone;

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getDataAluguel() {
        return $this->data_aluguel;
    }

    public function setDataAluguel(string $data_aluguel) {
        $this->data_aluguel = $data_aluguel;
    }

    public function getHoraInicio() {
        return $this->hora_inicio;
    }

    public function setHoraInicio(string $hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    public function getHoraFim() {
        return $this->hora_fim;
    }

    public function setHoraFim(string $hora_fim) {
        $this->hora_fim = $hora_fim;
    }

    public function getQuadra() {
        return $this->quadra;
    }

    public function setQuadra(string $quadra) {
        $this->quadra = $quadra;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor(float $valor) {
        $this->valor = $valor;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(string $cliente) {
        $this->cliente = $cliente;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }
}
