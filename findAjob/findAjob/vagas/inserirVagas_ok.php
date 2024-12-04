<?php
include_once "../class/Vagas.class.php";
include_once "../class/VagasDAO.class.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Criação de uma nova vaga
    $vaga = new Vagas();
    $vaga->setTitulo($_POST['titulo']);
    $vaga->setDescricao($_POST['descricao']);
    $vaga->setCategoria($_POST['categoria']);
    $vaga->setContato($_POST['contato']);
    $vaga->setDataCriacao(date('Y-m-d H:i:s')); // Define a data de criação
    
    // Verifica se a vaga está ativada
    $ativada = isset($_POST['ativada']) ? 1 : 0;
    $vaga->setAtivada($ativada);

    // Ação com base no botão clicado
    if ($_POST['acao'] === 'criar') {
        
        

    // Inserir no banco
    $objDAO = new   VagasDAO();
    $retorno = $objDAO->inserir($vaga);

        echo "<p>Vaga criada com sucesso!</p>";
    } elseif ($_POST['acao'] === 'desativar') {
        $vaga->setAtivada(0);
        echo "<p>Vaga desativada com sucesso!</p>";
    }
}
?>
