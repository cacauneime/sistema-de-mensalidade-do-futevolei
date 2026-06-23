<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/turma.php";

class Turma
{

    public function Select()
    {
        $sql = "Select * from turma;";
        $con = Conexao::conectar();
        $query = $con->query($sql);
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $turma = new \MODEL\Turma();
            $turma->setId($linha['id']);
            $turma->setNome($linha['nome']);
            $turma->setHorario($linha['horario']);
            $turma->setDiaSemana($linha['dia_semana']);
            $turma->setNivel($linha['nivel']);

            array_push($lista, $turma);
        }

        return $lista;
    }

    public function SelectById(int $id)
    {
        $sql = "Select * from turma where id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $turma = new \MODEL\Turma();
        $turma->setId($linha['id']);
        $turma->setNome($linha['nome']);
        $turma->setHorario($linha['horario']);
        $turma->setDiaSemana($linha['dia_semana']);
        $turma->setNivel($linha['nivel']);

        return $turma;
    }

    public function SelectByNome(string $nome)
    {
        $sql = "Select * from turma where nome LIKE ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array("%" . $nome . "%"));
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $turma = new \MODEL\Turma();
            $turma->setId($linha['id']);
            $turma->setNome($linha['nome']);
            $turma->setHorario($linha['horario']);
            $turma->setDiaSemana($linha['dia_semana']);
            $turma->setNivel($linha['nivel']);

            array_push($lista, $turma);
        }

        return $lista;
    }

    public function Insert(\MODEL\Turma $turma)
    {
        $sql = "INSERT INTO turma (nome, horario, dia_semana, nivel) VALUES (?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $turma->getNome(),
            $turma->getHorario(),
            $turma->getDiaSemana(),
            $turma->getNivel()
        ));
        $con = Conexao::desconectar();
    }

    public function Update(\MODEL\Turma $turma)
    {
        $sql = "UPDATE turma SET nome=?, horario=?, dia_semana=?, nivel=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $turma->getNome(),
            $turma->getHorario(),
            $turma->getDiaSemana(),
            $turma->getNivel(),
            $turma->getId()
        ));
        $con = Conexao::desconectar();
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM turma WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $con = Conexao::desconectar();
    }
}

?>
