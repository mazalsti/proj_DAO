<?php

// declare(strict_types=1); 
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

require('Usuario.php');

interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findByEmail(string $email);
    public function findById(int $id);
    public function update(Usuario $u);
    public function delete(int $id);
}