<?php

$host = 'localhost';
$dbname = 'library_master'; 
$username = 'root'; 
$password = '';

try {
    
    $conexao = new PDO("mysql:host=$host", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "CREATE DATABASE IF NOT EXISTS library_master";
    $conexao->exec($sql);
    echo "Banco de dados 'library_master' criado com sucesso!<br>";

 
    $conexao->exec("USE library_master");

    
    $sql = "
        CREATE TABLE IF NOT EXISTS livros (
            id_livro INT AUTO_INCREMENT PRIMARY KEY,
            nome_livro VARCHAR(255) NOT NULL,
            autora VARCHAR(14) NOT NULL UNIQUE,
            arquivo VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
		
		CREATE TABLE usuarios (
			id_usuario INT AUTO_INCREMENT PRIMARY KEY,
			nome_usuario VARCHAR(50) NOT NULL,
			email VARCHAR(100) NOT NULL UNIQUE,
			senha VARCHAR(255) NOT NULL
		);
		
    ";
    $conexao->exec($sql);
    echo "Tabela 'livros' e 'usuarios' criada com sucesso!<br>";

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
