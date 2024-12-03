<?php

class InscricaoDAO {
    private $conexao;

    public function __construct(){
        $this->conexao = new PDO("mysql:host=localhost;dbname=jobphp", "root", "");
    }

    // Inserir uma inscrição de usuário em uma vaga
    public function inserirInscricao(Inscricao $inscricao){
        $sql = $this->conexao->prepare(
            "INSERT INTO inscricoes (usuario_id, vaga_id, status, dataInscricao) 
            VALUES (:usuario_id, :vaga_id, :status, NOW())"
        );
        
        $sql->bindValue(":usuario_id", $inscricao->getUsuario_id());
        $sql->bindValue(":vaga_id", $inscricao->getVaga_id());
        $sql->bindValue(":status", $inscricao->getStatus());

        return $sql->execute();  // Retorna true se for bem-sucedido
    }

    // Listar todas as inscrições para uma vaga específica
    public function listarInscricoesPorVaga($vaga_id){
        $sql = $this->conexao->prepare(
            "SELECT * FROM inscricoes WHERE vaga_id = :vaga_id"
        );
        $sql->bindValue(":vaga_id", $vaga_id);
        $sql->execute();
        return $sql->fetchAll();  // Retorna todas as inscrições
    }

    // Excluir uma inscrição
    public function excluirInscricao($id){
        $sql = $this->conexao->prepare(
            "DELETE FROM inscricoes WHERE id = :id"
        );
        $sql->bindValue(":id", $id);
        return $sql->execute();  // Retorna true se for bem-sucedido
    }
}
?>
