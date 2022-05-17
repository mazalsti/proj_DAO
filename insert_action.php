<?php

 require "config.php";
 require 'dao/UsuarioDaoMysql.php';
 

 $usuarioDAO = new UsuarioDaoMysql($pdo);

//  $id =      filter_input(INPUT_POST, 'id');
 $nome =    filter_input(INPUT_POST, 'nome');
 $idade =   filter_input(INPUT_POST, 'idade');
 $sexo =    filter_input(INPUT_POST, 'sexo');
 $end =     filter_input(INPUT_POST, 'endereco');
 $fone =    filter_input(INPUT_POST, 'telefone');
 $email =   filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

 if($nome && $idade && $sexo && $end && $fone && $email){

    if($usuarioDAO->findByEmail($email) === false){
        $novoUsuario = new Usuario();
 
        $novoUsuario->setNome($nome);
        $novoUsuario->setIdade($idade);
        $novoUsuario->setSexo($sexo);
        $novoUsuario->setEndereco($end);
        $novoUsuario->setTelefone($fone);
        $novoUsuario->setEmail($email);

        $usuarioDAO->add( $novoUsuario );
        
        header("Location: index.php");
        exit;
     }else{
      header("Location: view/insert.php");
      exit;
     }

 } else{
    header("Location: view/insert.php");
    exit;
 }

