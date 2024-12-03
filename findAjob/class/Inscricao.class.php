<?php
class Inscricao {

    private $id;
    private $usuario_id;
    private $vaga_id;
    private $dataInscricao;
    private $status;
    
    public function getId(){
        return $this->id;
    }

    public function setId($valor){
        $this->id = $valor;
    }

    
    public function getUsuario_id(){
        return $this->usuario_id;
    }

    public function setUsuario_id($valor){
        $this->usuario_id = $valor;
    }

    public function getVaga_id(){
        return $this->vaga_id;  
    }

    public function setVaga_id($valor){
        $this->vaga_id = $valor;
    }

    public function getDataInscricao(){
        return $this->dataInscricao;
    }

    public function setDataInscricao($valor){
        $this->dataInscricao = $valor;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($valor){
        $this->status = $valor;
    }
}
?>
