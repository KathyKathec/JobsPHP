<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo "Você precisa estar logado para ver as vagas.";
    exit;
}

// O código para listar as vagas pode continuar abaixo

include_once "Vagas.class.php";
include_once "VagasDAO.class.php"; 

$vagasDAO = new VagasDAO();
$vagas = $vagasDAO->listar();

if (count($vagas) > 0) {
    echo "<h1 class='titulo-vagas'>Vagas Disponíveis</h1>";
    foreach ($vagas as $vaga) {
        echo "<div class='vaga-container'>";
        echo "<h2 class='vaga-titulo'>" . $vaga['titulo'] . "</h2>";
        echo "<p class='vaga-descricao'>" . $vaga['descricao'] . "</p>";
        echo "<p><strong>Categoria:</strong> " . $vaga['categoria'] . "</p>";
        echo "<p><strong>Data de Criação:</strong> " . $vaga['dataCriacao'] . "</p>";
        echo "<p><strong>Contato:</strong> " . $vaga['contato'] . "</p>";

        echo "<form action='inserirInscricao_ok.php' method='POST' class='form-inscricao'>";
        echo "<input type='hidden' name='usuario_id' value='" . $_SESSION['usuario_id'] . "'>";
        echo "<input type='hidden' name='vaga_id' value='" . $vaga['id'] . "'>";
        echo "<input type='submit' value='Inscrever-se' class='btn-inscricao'>";
        echo "</form>";
        
        echo "</div><hr>";
    }
} else {
    echo "Não há vagas disponíveis no momento.";
}
?>
