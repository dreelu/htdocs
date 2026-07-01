<?php
    include("connection.php");
        class processaLogin {

            public $login;
            public $senha;

            function processa($p1, $p2) {
                $this->login = $p1;
                $this->senha = $p2;
            }
        }

        $infos = new processaLogin();
        $infos->processa($_POST['login'], $_POST['senha']);

        $sql = "SELECT senha_hash FROM usuarios WHERE login = :login";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'login' => $infos->login,
        ]);

        $dados = $stmt->fetch();
        $hash = $dados[0];

        if (password_verify($infos->senha, $hash)) {
            header("Location: main.php");
        } else {
            echo "Algo deu errado no processo de Login.";
        }
?>
