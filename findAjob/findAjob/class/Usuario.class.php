<?php
class Usuario {

    private $id;
    private $nome;
    private $email;
    private $foto;
    private $linkedIn;
    private $senha;
    private $admin;


public function getId(){
    return $this->id;
}

public function setId($valor){
    $this->id=$valor;
}

public function getNome(){
    return $this->nome;
}
public function setNome($valor){
    $this->nome=$valor;
}

public function getEmail(){
    return $this->email;
}
public function setEmail($valor){
    $this->email=$valor;
}


public function getSenha(){
    return $this->senha;
}
public function setSenha($valor){
    $this->senha=$valor;
}



public function getFoto(){
    return $this->foto;
}
public function setFoto($valor){
    $this->foto=$valor;
}


public function getAdmin(){
    return $this->admin;
}
public function setAdmin($valor){
    $this->admin=$valor;
}


public function getLinkedIn(){
    return $this->linkedIn;
}
public function setLinkedIn($valor){
    $this->linkedIn=$valor;
}


}

?>