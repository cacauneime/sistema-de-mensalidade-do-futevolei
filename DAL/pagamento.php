<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/pagamento.php";

class Pagamento
{

    public function Select()
    {
        $sql = "Select * from pagamento;";
        $con = Conexao::conectar();
        $query = $con->query($sql);
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $pagamento = new \MODEL\Pagamento();
            $pagamento->setId($linha['id']);
            $pagamento->setAluno($linha['aluno']);
            $pagamento->setValor($linha['valor']);
            $pagamento->setDataPagamento($linha['data_pagamento']);
            $pagamento->setStatus($linha['status']);
            $pagamento->setMesReferencia($linha['mes_referencia']);

            array_push($lista, $pagamento);
        }

        return $lista;
    }

    public function SelectById(int $id)
    {
        $sql = "Select * from pagamento where id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $pagamento = new \MODEL\Pagamento();
        $pagamento->setId($linha['id']);
        $pagamento->setAluno($linha['aluno']);
        $pagamento->setValor($linha['valor']);
        $pagamento->setDataPagamento($linha['data_pagamento']);
        $pagamento->setStatus($linha['status']);
        $pagamento->setMesReferencia($linha['mes_referencia']);

        return $pagamento;
    }

    public function SelectByStatus(string $status)
    {
        $sql = "Select * from pagamento where status=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($status));
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $pagamento = new \MODEL\Pagamento();
            $pagamento->setId($linha['id']);
            $pagamento->setAluno($linha['aluno']);
            $pagamento->setValor($linha['valor']);
            $pagamento->setDataPagamento($linha['data_pagamento']);
            $pagamento->setStatus($linha['status']);
            $pagamento->setMesReferencia($linha['mes_referencia']);

            array_push($lista, $pagamento);
        }

        return $lista;
    }

    public function Insert(\MODEL\Pagamento $pagamento)
    {
        $sql = "INSERT INTO pagamento (aluno, valor, data_pagamento, status, mes_referencia) VALUES (?, ?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $pagamento->getAluno(),
            $pagamento->getValor(),
            $pagamento->getDataPagamento(),
            $pagamento->getStatus(),
            $pagamento->getMesReferencia()
        ));
        $con = Conexao::desconectar();
    }

    public function Update(\MODEL\Pagamento $pagamento)
    {
        $sql = "UPDATE pagamento SET aluno=?, valor=?, data_pagamento=?, status=?, mes_referencia=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $pagamento->getAluno(),
            $pagamento->getValor(),
            $pagamento->getDataPagamento(),
            $pagamento->getStatus(),
            $pagamento->getMesReferencia(),
            $pagamento->getId()
        ));
        $con = Conexao::desconectar();
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM pagamento WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $con = Conexao::desconectar();
    }
}

?>
