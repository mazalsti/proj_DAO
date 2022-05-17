<?php 
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuario = new UsuarioDaoMysql($pdo);

    $lista = $usuario->findAll();
  
?>

<!DOCTYPE html>
<html>
<head>
    <title> CRUD - 5 </title>
</head>
<body>
    <div>
        <fieldset>
            <h1> Tela de Listagem </h1>
        </fieldset>
        <fieldset>
            <button> <a href="view/insert.php"> Inserir novos dados</a></button>
        </fieldset>
    </div>
    <div>
        <table border="1" width="100%">
            <thead>
           
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>IDADE</th>
                    <th>SEXO</th>
                    <th>ENDERECO</th>
                    <th>FONE</th>
                    <th>EMAIL</th>
                    <th>DATA</th>
                    <th colspan="2">ACOES</th>
                </tr>
             
            </thead>
            <tbody>

            <?php foreach($lista as $itens): ?>
                
                <tr>
                    <td><?= $itens->getId(); ?> </td>
                    <td> <?=$itens->getNome(); ?> </td>
                    <td> <?=$itens->getIdade(); ?></td>
                    <td> <?=$itens->getSexo(); ?></td>
                    <td> <?=$itens->getEndereco(); ?></td>
                    <td> <?=$itens->getTelefone(); ?></td>
                    <td> <?=$itens->getEmail(); ?></td>
                    <td> <?=date('d/m/Y', strtotime($itens->getData())); ?></td>
                    <td><a href="atualizar.php?id=<?php echo $itens->getId();?>"> Update </a></td>
                    <td><a href="delete_action.php?id=<?php echo $itens->getId();?>"> Delete </a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
