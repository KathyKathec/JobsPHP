<?php
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";

// Validar os dados recebidos
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['linkedIn']) || empty($_FILES['foto'])) {
    die("Todos os campos são obrigatórios.");
}

$nome = htmlspecialchars($_POST['nome']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];
$linkedin = filter_var($_POST['linkedIn'], FILTER_VALIDATE_URL);

if (!$email || !$linkedin) {
    die("Email ou URL do LinkedIn inválidos.");
}

// Upload da foto
$nomeArquivo = $_FILES["foto"]["name"];
$nomeTemporario = $_FILES["foto"]["tmp_name"];
$tamanhoArquivo = $_FILES["foto"]["size"];
$extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
$novoNomeArquivo = uniqid() . "." . $extensao;
$diretorio = "../img/" . $novoNomeArquivo;

if (!in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
    die("Apenas imagens JPG, JPEG, PNG e GIF são permitidas.");
}

if ($tamanhoArquivo > 2 * 1024 * 1024) { // Limite de 2MB
    die("A imagem deve ter no máximo 2MB.");
}

if (!move_uploaded_file($nomeTemporario, $diretorio)) {
    die("Erro ao enviar a imagem.");
}

// Criar objeto Usuario
$obj = new Usuario();
$obj->setNome($nome);
$obj->setEmail($email);
$obj->setSenha(password_hash($senha, PASSWORD_DEFAULT)); // Armazenar senha criptografada
$obj->setLinkedIn($linkedin);
$obj->setAdmin(0);
$obj->setFoto($novoNomeArquivo);

// Inserir no banco
$objDAO = new UsuarioDAO();
$retorno = $objDAO->inserir($obj);

if ($retorno) {
    echo "Usuário cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar usuário.";
}
?>
