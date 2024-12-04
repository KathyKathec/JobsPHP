<?php
session_start();
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";

// Receber os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Criar uma instância do DAO
$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();
$usuario->setEmail($email);
$usuario->setSenha($senha);

// Verificar se o login é válido
$usuario_logado = $usuarioDAO->login($usuario);

if ($usuario_logado) {
    // Se o login for bem-sucedido, cria a sessão
    $_SESSION['usuario_id'] = $usuario_logado['id'];
    $_SESSION['usuario_nome'] = $usuario_logado['nome'];
    $_SESSION['usuario_admin'] = $usuario_logado['admin'];  // Para saber se o usuário é admin
    header("Location: ../vagas/listarVagas.php");  // Redireciona para a página de vagas
} else {
    // Se o login falhar, redireciona de volta com erro
    echo "Email ou senha inválidos.";
}
?>
