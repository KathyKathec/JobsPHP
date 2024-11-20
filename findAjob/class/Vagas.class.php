<?php
class Vagas {

    private $id;
    private $titulo;
    private $descricao;
    private $categoria;
    private $dataCriacao;
    private $ativada;
    private $contato;
    private $dataAtualizacao;


public function getId(){
    return $this->id;
}

public function setId($valor){
    $this->id=$valor;
}

public function getTitulo(){
    return $this->titulo;
}
public function setTitulo($valor){
    $this->titulo=$valor;
}

public function getDescricao(){
    return $this->descricao;
}
public function setDescricao($valor){
    $this->descricao=$valor;
}

public function getCategoria(){
    return $this->categoria;
}
public function setCategoria($valor){
    $this->categoria=$valor;
}

public function getDataCriacao(){
    return $this->dataCriacao;
}
public function setDataCriacao($valor){
    $this->dataCriacao=$valor;
}


public function getAtivada(){
    return $this->ativada;
}
public function setAtivada($valor){
    $this->ativada=$valor;
}


public function getLinkedIn(){
    return $this->senha;
}
public function setLinkedIn($valor){
    $this->senha=$valor;
}//contato dataAtualizacao


public function getContato(){
    return $this->contato;
}
public function setContato($valor){
    $this->contato=$valor;
}



public function getDataAtualizacao(){
    return $this->dataAtualizacao;
}
public function setDataAtualizacao($valor){
    $this->dataAtualizacao=$valor;
}



}

?>