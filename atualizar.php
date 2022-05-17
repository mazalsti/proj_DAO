<?php 
    require "config.php";
    require "dao/UsuarioDaoMysql.php";

    $usuarioDAO = new UsuarioDaoMysql($pdo);

    $usuario = false;
    $id = filter_input(INPUT_GET, 'id');
    if($id) {
        $usuario = $usuarioDAO->findById($id);
    }
    if($usuario === false){
        header('Location: atualizar.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> CRUD-5</title>
    </head>
    <body>
        <div>
            <fieldset>
                <h1> TELA DE ATUALIZAR </h1>
            </fieldset>
        </div>
        </br>
        <form method="POST" action="atualizar_action.php">
        <div>
            <div>
                <label>ID:</label>
                <input type="text" name="id" readonly value="<?php echo $usuario->getId();?>"/>
            </div></br>
            <div>
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $usuario->getNome();?>"/>
            </div></br>
            <div>
                <label>Ideda:</label>
                <input type="text" name="idade" value="<?php echo $usuario->getIdade();?>"/>
            </div></br>
            <div>
                <label>Sexo:</label>
                <input type="text" name="sexo" value="<?php echo $usuario->getSexo();?>"/>
            </div></br>
            <div>
                <label>Endereco:</label>
                <input type="text" name="endereco" value="<?php echo $usuario->getEndereco();?>"/>
            </div></br>
            <div>
                <label>Telefone:</label>
                <input type="text" name="telefone" value="<?php echo $usuario->getTelefone();?>"/>
            </div></br>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $usuario->getEmail();?>"/>
            </div> </br>
            <div>
                <input type="submit" value="Envio"/>
            </div>

        </div>
        </form>
    </body>
</html>