<?php

namespace DAL;

include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/DAL/conexao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/futevolei_mensalidades/MODEL/aluno.php";

class Aluno
{

    public function Select()
    {
        $sql = "Select * from aluno;";
        $con = Conexao::conectar();
        $query = $con->query($sql);
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $aluno = new \MODEL\Aluno();
            $aluno->setId($linha['id']);
            $aluno->setNome($linha['nome']);
            $aluno->setTelefone($linha['telefone']);
            $aluno->setEmail($linha['email']);
            $aluno->setTurma($linha['turma']);
            $aluno->setDataInscricao($linha['data_inscricao']);

            array_push($lista, $aluno);
        }

        return $lista;
    }

    public function SelectById(int $id)
    {
        $sql = "Select * from aluno where id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $linha = $query->fetch(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $aluno = new \MODEL\Aluno();
        $aluno->setId($linha['id']);
        $aluno->setNome($linha['nome']);
        $aluno->setTelefone($linha['telefone']);
        $aluno->setEmail($linha['email']);
        $aluno->setTurma($linha['turma']);
        $aluno->setDataInscricao($linha['data_inscricao']);

        return $aluno;
    }

    public function SelectByNome(string $nome)
    {
        $sql = "Select * from aluno where nome LIKE ?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array("%" . $nome . "%"));
        $resultado = $query->fetchAll(\PDO::FETCH_ASSOC);
        $con = Conexao::desconectar();

        $lista = array();

        foreach ($resultado as $linha) {
            $aluno = new \MODEL\Aluno();
            $aluno->setId($linha['id']);
            $aluno->setNome($linha['nome']);
            $aluno->setTelefone($linha['telefone']);
            $aluno->setEmail($linha['email']);
            $aluno->setTurma($linha['turma']);
            $aluno->setDataInscricao($linha['data_inscricao']);

            array_push($lista, $aluno);
        }

        return $lista;
    }

    public function Insert(\MODEL\Aluno $aluno)
    {
        $sql = "INSERT INTO aluno (nome, telefone, email, turma, data_inscricao) VALUES (?, ?, ?, ?, ?);";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $aluno->getNome(),
            $aluno->getTelefone(),
            $aluno->getEmail(),
            $aluno->getTurma(),
            $aluno->getDataInscricao()
        ));
        $con = Conexao::desconectar();
    }

    public function Update(\MODEL\Aluno $aluno)
    {
        $sql = "UPDATE aluno SET nome=?, telefone=?, email=?, turma=?, data_inscricao=? WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array(
            $aluno->getNome(),
            $aluno->getTelefone(),
            $aluno->getEmail(),
            $aluno->getTurma(),
            $aluno->getDataInscricao(),
            $aluno->getId()
        ));
        $con = Conexao::desconectar();
    }

    public function Delete(int $id)
    {
        $sql = "DELETE FROM aluno WHERE id=?;";
        $con = Conexao::conectar();
        $query = $con->prepare($sql);
        $query->execute(array($id));
        $con = Conexao::desconectar();
    }
}

?>
