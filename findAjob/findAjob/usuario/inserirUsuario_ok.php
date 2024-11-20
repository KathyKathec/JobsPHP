<?php
    print_r($_POST);
    print_r($_FILES);
    
include_once "../class/Usuario.class.php";
include_once "../class/UsuarioDAO.class.php";

 
   $nome=$_FILES["foto"]["name"];
    $nomeTemporario=$_FILES["foto"]["tmp_name"];
    $diretorio = "../img/".$nome;
    if(move_uploaded_file($nomeTemporario, $diretorio))
    echo "imagem enviada";
    else
    echo "n rolou";
    

   $obj = new Usuario();
   $obj->setNome($_POST['nome']);
  $obj->setEmail($_POST['email']);
     $obj->setSenha($_POST['senha']);
    $obj->setLinkedIn($_POST['linkedIn']);
    $obj->setFoto($nome);
    
   $objDAO = new UsuarioDAO();
   $retorno = $objDAO->inserir($obj);
    if($retorno)
    echo "funcionou";
    else
    echo "n funcionou";
   
   ?>