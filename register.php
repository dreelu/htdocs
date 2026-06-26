<?php
include("connection.php");

class ProcessaLogin {

    public $login;
    public $senha;

    function processa($p1, $p2) {
        $this->login = $p1;
        $this->senha = $p2;
    }
}

$infos = new ProcessaLogin();
$infos->processa($_GET['login'], $_GET['senha']);

$sql = "INSERT INTO usuarios (login, senha_hash) VALUES (:login, :senha_hash)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'login' => $infos->login,
    'senha_hash' => $infos->senha
]);
?>