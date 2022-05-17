<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
// declare(strict_types=1);

class Usuario {
    
    private int $id;
    private string $nome;
    private int $idade;
    private string $sexo;
    private string $endereco;
    private string $telefone;
    private string $email;
    private string $data_cad;

    public function getId(){
        return $this->id;
    }
    public function setId($ids){
        $this->id = trim($ids);
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($name){
        $this->nome = ucwords(trim($name));
    }

    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idad){
        $this->idade = strtolower(trim($idad));
    }

    public function getSexo(){
        return $this->sexo;
    }
    public function setSexo($sx){
        $this->sexo = strtolower(trim($sx));
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($end){
        $this->endereco = strtolower(trim($end));
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($tel){
        $this->telefone = strtolower(trim($tel));
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($mail){
        $this->email = strtolower(trim($mail));
    }

    public function getData(){
        return $this->data_cad;
    }
    public function setData($dat){
        $this->data_cad = strtolower(trim($dat));
    }


}

// interface UsuarioDAO {
//     public function add(Usuario $u);
//     public function findAll();
//     public function fincById(int $id);
//     public function update(Usuario $u);
//     public function delete(int $id);
// }
