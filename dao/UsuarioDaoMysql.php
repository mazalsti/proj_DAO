<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


require_once('models/UsuarioDAO.php');
require_once('models/Usuario.php');
// require_once  '../config.php';

class UsuarioDaoMysql implements UsuarioDAO {

    private $pdo;
    
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }
    public function add(Usuario $u) { 
        // print_r($u);
        // exit;
        $sql = $this->pdo->prepare("INSERT clientes SET nome=:nome, idade=:idade, sexo=:sexo
        ,endereco=:endereco, telefone=:telefone, email=:email, data_cad= NOW()");
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":idade", $u->getIdade());
        $sql->bindValue(":sexo", $u->getSexo());
        $sql->bindValue(":endereco", $u->getEndereco());
        $sql->bindValue(":telefone", $u->getTelefone());
        $sql->bindValue(":email", $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
    
        return $u;
    }
    public function findAll() {
        $array = [];

        $sql = "SELECT * FROM clientes";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        $sql->errorInfo();

        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $itens){
                $u = new Usuario();
                $u->setId($itens['id']);
                $u->setNome($itens['nome']);
                $u->setIdade($itens['idade']);
                $u->setSexo($itens['sexo']);
                $u->setEndereco($itens['endereco']);
                $u->setTelefone($itens['telefone']);
                $u->setEmail($itens['email']);
                $u->setData($itens['data_cad']);

                $array[] = $u;
            }
        }

        return $array ;
    }

    public function findByEmail($email) {
        
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE email =:email");
        $sql->bindValue(':email',$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
          
            return $u;
        } else {
            return false;
        }
      
    }
    public function findById(int $id) {
        $sql = $this->pdo->prepare("SELECT * FROM clientes WHERE id =:id");
        $sql->bindValue(":id",$id,PDO::PARAM_INT);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setIdade($data['idade']);
            $u->setSexo($data['sexo']);
            $u->setEndereco($data['endereco']);
            $u->setTelefone($data['telefone']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }
    public function update(Usuario $u) {

        $sql = $this->pdo->prepare("UPDATE clientes SET nome=:nome, idade=:idade, sexo=:sexo
        ,endereco=:endereco, telefone=:telefone, email=:email WHERE id=:id");

        $sql->bindValue(":id", $u->getId(), PDO::PARAM_INT);
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":idade", $u->getIdade());
        $sql->bindValue(":sexo", $u->getSexo());
        $sql->bindValue(":endereco", $u->getEndereco());
        $sql->bindValue(":telefone", $u->getTelefone());
        $sql->bindValue(":email", $u->getEmail());
        $sql->execute();
        
    
        return $u;
    }
    public function delete(int $id) {
        $sql = $this->pdo->prepare("DELETE FROM clientes WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

}