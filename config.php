<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

const NAMEBD = 'crud5';
const CONEXAO = 'localhost';
const LOGIN = 'root';
const PASSWORD = 'root';

$pdo = new \PDO("mysql:dbname=".NAMEBD.";hostname:localhost", LOGIN, PASSWORD);    

