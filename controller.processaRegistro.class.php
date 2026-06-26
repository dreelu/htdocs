<?php
    include("connection.php");
        class processaRegistro {

            public $login;
            public $senha;

            function processa($p1, $p2) {
                $this->login = $p1;
                $this->senha = $p2;
            }
        }

        $infos = new processaRegistro();
        $infos->processa($_POST['login'], $_POST['senha']);

        $sql = "INSERT INTO usuarios (login, senha_hash) VALUES (:login, :senha_hash)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'login' => $infos->login,
            'senha_hash' => $infos->senha,
        ]);

        echo "Usuário registrado!";
?>
