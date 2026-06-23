<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluguel.php";

class Aluguel {

    public function Select() {
        $sql = "SELECT * FROM aluguel;";
        $con = Conexao::conectar();
        $query = $con->query($sql);
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();
        foreach ($resultado as $linha) {
            $aluguel = new \MODEL\Aluguel();
            $aluguel->setId($linha['id']);
            $aluguel->setDataAluguel($linha['data_aluguel']);
            $aluguel->setHoraInicio($linha['hora_inicio']);
            $aluguel->setHoraFim($linha['hora_fim']);
            $aluguel->setQuadra($linha['quadra']);
            $aluguel->setValor($linha['valor']);
            $aluguel->setCliente($linha['cliente']);
            $aluguel->setTelefone($linha['telefone']);
            array_push($lista, $aluguel);
        }
        return $lista;
    }

    public function SelectById(int $id) {
        $sql = "SELECT * FROM aluguel WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $aluguel = new \MODEL\Aluguel();
        $aluguel->setId($linha['id']);
        $aluguel->setDataAluguel($linha['data_aluguel']);
        $aluguel->setHoraInicio($linha['hora_inicio']);
        $aluguel->setHoraFim($linha['hora_fim']);
        $aluguel->setQuadra($linha['quadra']);
        $aluguel->setValor($linha['valor']);
        $aluguel->setCliente($linha['cliente']);
        $aluguel->setTelefone($linha['telefone']);
        return $aluguel;
    }

    public function SelectByCliente(string $cliente) {
        $sql = "SELECT * FROM aluguel WHERE cliente LIKE ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(['%' . $cliente . '%']);
        $registros = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = [];
        foreach ($registros as $linha) {
            $aluguel = new \MODEL\Aluguel();
            $aluguel->setId($linha['id']);
            $aluguel->setDataAluguel($linha['data_aluguel']);
            $aluguel->setHoraInicio($linha['hora_inicio']);
            $aluguel->setHoraFim($linha['hora_fim']);
            $aluguel->setQuadra($linha['quadra']);
            $aluguel->setValor($linha['valor']);
            $aluguel->setCliente($linha['cliente']);
            $aluguel->setTelefone($linha['telefone']);
            $lista[] = $aluguel;
        }
        return $lista;
    }

    public function Insert(\MODEL\Aluguel $aluguel) {
        $sql = "INSERT INTO aluguel (data_aluguel, hora_inicio, hora_fim, quadra, valor, cliente, telefone)
                VALUES (?, ?, ?, ?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array(
            $aluguel->getDataAluguel(),
            $aluguel->getHoraInicio(),
            $aluguel->getHoraFim(),
            $aluguel->getQuadra(),
            $aluguel->getValor(),
            $aluguel->getCliente(),
            $aluguel->getTelefone()
        ));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Update(\MODEL\Aluguel $aluguel) {
        $sql = "UPDATE aluguel SET data_aluguel=?, hora_inicio=?, hora_fim=?, quadra=?, valor=?, cliente=?, telefone=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array(
            $aluguel->getDataAluguel(),
            $aluguel->getHoraInicio(),
            $aluguel->getHoraFim(),
            $aluguel->getQuadra(),
            $aluguel->getValor(),
            $aluguel->getCliente(),
            $aluguel->getTelefone(),
            $aluguel->getId()
        ));
        $con = Conexao::desconectar();
        return $result;
    }

    public function Delete(int $id) {
        $sql = "DELETE FROM aluguel WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $result = $query->execute(array($id));
        $con = Conexao::desconectar();
        return $result;
    }
}
