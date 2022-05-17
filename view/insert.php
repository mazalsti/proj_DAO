<!DOCTYPE html>
<html>
    <head>
        <title> CRUD-5</title>
    </head>
    <body>
        <div>
            <fieldset>
                <h1> TELA DE CADASTRO </h1>
            </fieldset>
        </div>
        
        </br>
        <form method="POST" action="../insert_action.php">
        <div>
            <div>
                <label>Nome:</label>
                <input type="text" name="nome" placeholder="Entre com Nome"/>
            </div></br>
            <div>
                <label>Ideda:</label>
                <input type="text" name="idade" placeholder="Entre com Idade"/>
            </div></br>
            <div>
                <label>Sexo:</label>
                <input type="text" name="sexo" placeholder="Entre com Sexo"/>
            </div></br>
            <div>
                <label>Endereco:</label>
                <input type="text" name="endereco" placeholder="Entre com Endereco"/>
            </div></br>
            <div>
                <label>Telefone:</label>
                <input type="text" name="telefone" placeholder="Entre com Telefone"/>
            </div></br>
            <div>
                <label>Email:</label>
                <input type="email" name="email" placeholder="Entre com Email"/>
            </div> </br>
            <div>
                <input type="submit" value="Envio"/>
            </div>

        </div>
        </form>
    </body>
</html>