<?php

include_once "Usuario.class.php";

class UsuarioDAO{
    private $conexao;
    public function __construct(){
        $this->conexao= new PDO (
            "mysql:host=localhost;dbname=jobphp", "root",""
        );
    }

    public function inserir(Usuario $usuario){

        $sql= $this-> conexao-> prepare(
            "INSERT INTO usuario (nome, email, senha, foto, linkedIn, administrador)
            VALUES (:nome, :email, :senha, :foto, :linkedIn, :administrador)"
        );
        $sql->bindValue(":nome", $usuario->getNome());
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->bindValue(":senha", $usuario->getSenha());
        $sql->bindValue(":foto", $usuario->getFoto());
        $sql->bindValue(":linkedIn", $usuario->getLinkedIn());
        $sql->bindValue(":administrador", $usuario->getAdministrador());

        return $sql->execute();
    }

    public function listar(){
        $sql= $this->conexao->prepare(
            "SELECT * FROM usuario"
        );
        $sql->execute();
        return $sql->fetchAll();
    }

    public function retornarUnico($id){
        $sql = $this->conexao->prepare(
            "SELECT * FROM usuario WHERE id=:id"
        );
        $sql->bindValue(":id", $id);
        $sql->execute();
        return $sql->fetch();
    }
    public function editar(Usuario $usuario){
        $sql = $this->conexao->prepare(
            "UPDATE usuario SET nome=:nome, email=:email, foto=:foto
            WHERE id=:id"
        );
        $sql->bindValue(":id",$usuario->getId());
        $sql->bindValue(":nome",$usuario->getNome());
        $sql->bindValue(":email",$usuario->getEmail());
        $sql->bindValue(":foto", $usuario->getFoto());
        return $sql->execute();
    }
    public function excluir($id){
        $sql=$this->conexao->prepare(
            "DELETE FROM usuario WHERE id=;id"
        );
        $sql->bindValue(":id", $id);
        return $sql->execute();
    }

    public function login(Usuario $usuario){
        $sql=$this->conexao->prepare(
            "SELECT * FROM usuario WHERE email= :email"
        );
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->execute();
        if($sql->rowCount()>0){
            while($retorno=$sql->fetch()){
                if($retorno["senha"]==$usuario->getSenha()){
                    return $retorno;
                }
            }

        }else{
            return 0;
        }
    }


}


?>