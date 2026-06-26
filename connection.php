<?php
    $hostname = "localhost";
    $bd = "projeto_pibic";
    $usuario = "root";
    $senha = "";

    try {
        $pdo = new PDO("mysql:host =" . $hostname . ";dbname=" . $bd, $usuario, $senha);

        echo "Conectado!";
    } catch (PDOException $e) {
        echo "Erro:". $e->getMessage();
    }
?>