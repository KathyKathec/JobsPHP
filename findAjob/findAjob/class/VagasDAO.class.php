<?php

include_once "Vagas.class.php";

class VagasDAO {
    private $conexao;

    public function __construct(){
        // Conecta com o banco de dados
        $this->conexao = new PDO("mysql:host=localhost;dbname=jobphp", "root", "");
    }

    // Função para inserir uma nova vaga
    public function inserir(Vagas $vaga){
        $sql = $this->conexao->prepare(
            "INSERT INTO vagas (titulo, descricao, categoria, dataCriacao, ativada, contato, dataAtualizacao)
            VALUES (:titulo, :descricao, :categoria, :dataCriacao, :ativada, :contato, :dataAtualizacao)"
        );

        $sql->bindValue(":titulo", $vaga->getTitulo());
        $sql->bindValue(":descricao", $vaga->getDescricao());
        $sql->bindValue(":categoria", $vaga->getCategoria());
        $sql->bindValue(":dataCriacao", $vaga->getDataCriacao());
        $sql->bindValue(":ativada", $vaga->getAtivada());
        $sql->bindValue(":contato", $vaga->getContato());
        $sql->bindValue(":dataAtualizacao", $vaga->getDataAtualizacao());

        return $sql->execute();
    }

    // Função para listar todas as vagas
    public function listar(){
        $sql = $this->conexao->prepare("SELECT * FROM vagas");
        $sql->execute();
        return $sql->fetchAll();
    }

    // Função para retornar uma vaga específica
    public function retornarUnico($id){
        $sql = $this->conexao->prepare(
            "SELECT * FROM vagas WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }

    // Função para editar uma vaga
    public function editar(Vagas $vaga){
        $sql = $this->conexao->prepare(
            "UPDATE vagas SET titulo = :titulo, descricao = :descricao, categoria = :categoria, 
            ativada = :ativada, contato = :contato, dataAtualizacao = :dataAtualizacao 
            WHERE id = :id"
        );
        
        $sql->bindValue(":id", $vaga->getId());
        $sql->bindValue(":titulo", $vaga->getTitulo());
        $sql->bindValue(":descricao", $vaga->getDescricao());
        $sql->bindValue(":categoria", $vaga->getCategoria());
        $sql->bindValue(":ativada", $vaga->getAtivada());
        $sql->bindValue(":contato", $vaga->getContato());
        $sql->bindValue(":dataAtualizacao", $vaga->getDataAtualizacao());

        return $sql->execute();
    }

    // Função para excluir uma vaga
    public function excluir($id){
        $sql = $this->conexao->prepare(
            "DELETE FROM vagas WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    // Função para ativar ou desativar uma vaga
    public function ativarDesativar($id, $status){
        $sql = $this->conexao->prepare(
            "UPDATE vagas SET ativada = :ativada WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        $sql->bindValue(":ativada", $status);
        return $sql->execute();
    }
}

?>
