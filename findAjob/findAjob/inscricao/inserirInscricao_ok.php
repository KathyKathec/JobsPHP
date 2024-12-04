<?php
include_once "../class/Inscricao.class.php";
include_once "../class/InscricaoDAO.class.php";
include_once "../class/Usuario.class.php";  
include_once "../class/Vagas.class.php";    

// Receber os dados do formulário
$usuario_id = $_POST['usuario_id'];  
$vaga_id = $_POST['vaga_id'];       
$status = "pendente";             

// Criar o objeto Inscricao
$inscricao = new Inscricao();
$inscricao->setUsuario_id($usuario_id);
$inscricao->setVaga_id($vaga_id);
$inscricao->setStatus($status);

// Criar o DAO
$inscricaoDAO = new InscricaoDAO();

// Chamar o método para inserir a inscrição no banco de dados
if ($inscricaoDAO->inserirInscricao($inscricao)) {
    echo "Inscrição realizada com sucesso!";
} else {
    echo "Erro ao realizar a inscrição.";
}
?>
