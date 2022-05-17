<?php

 require "config.php";
 require 'dao/UsuarioDaoMysql.php';

 $usuarioDAO = new UsuarioDaoMysql($pdo);

 $id =      filter_input(INPUT_POST, 'id');
 $nome =    filter_input(INPUT_POST, 'nome');
 $idade =   filter_input(INPUT_POST, 'idade');
 $sexo =    filter_input(INPUT_POST, 'sexo');
 $end =     filter_input(INPUT_POST, 'endereco');
 $fone =    filter_input(INPUT_POST, 'telefone');
 $email =   filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

 if($id && $nome && $idade && $sexo && $end && $fone && $email){
  
   //$user = $usuarioDAO->findById($id); temos que tratar os erros que vao vim do banco
   
        $user = new Usuario();
        $user->setId($id);
        $user->setNome($nome);
        $user->setIdade($idade);
        $user->setSexo($sexo);
        $user->setEndereco($end);
        $user->setTelefone($fone);
        $user->setEmail($email);

        $usuarioDAO->update( $user );
        
        header("Location: index.php");
        exit;
 } else{
    header("Location: insert.php?id=".$id);
    exit;
 }

