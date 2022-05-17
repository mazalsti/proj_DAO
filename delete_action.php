<?php 
    require "config.php";
    require "dao/UsuarioDaoMysql.php";

    $usuarioDAO = new UsuarioDaoMysql($pdo);

    $usuario = false;
    $id = filter_input(INPUT_GET, 'id');
    if($id) {
        $usuario = $usuarioDAO->findById($id);
      
        $usuarioDAO->delete($usuario->getId());

        header('Location: index.php');
        exit;
    }
    if($usuario === false){
        header('Location: index.php');
        exit;
    }
?>