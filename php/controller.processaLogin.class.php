<?php
    include("connection.php");
    session_start();
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

    $sql = "SELECT senha_hash, ID FROM usuarios WHERE login = :login";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'login' => $infos->login,
    ]);

    $dados = $stmt->fetch();
    $hash = $dados[0];

    if (password_verify($infos->senha, $hash)) {

        session_regenerate_id(true);

        $_SESSION['id'] = $dados[1];

        header("Location: /main");
        exit;

    } else {
        echo "Algo deu errado no processo de Login.";
    }
?>
