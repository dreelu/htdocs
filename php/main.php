<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../css/style-main.css">
    <link rel="stylesheet" type="text/css" href="../css/jsxgraph.css">
    <script defer src="../js/jsxgraphcore.js"></script>
    <title>Teste</title>
</head>
<body>
    <header>
        <h1>Sistema de Registro de Pontos</h1>
        <div class="botao" id="botaoSair">
            <span>Sair</span>
            <i class="fa-solid fa-arrow-right-from-bracket" style="color: rgb(255, 255, 255);"></i>
        </div>
    </header>

    <nav>
            <div class="navJanela" id="navCadastro">
                Cadastro
            </div>
            <div class="navJanela" id="navProjeto">
                Projeto
        </div>
    </nav>

    <main>
        <aside class="menuEsquerda">
            <div class="botao" id="botaoPonto">
                <i class="fa-solid fa-circle"></i>
                <span id="textoPonto">Ponto</span>
            </div>

            <div class="botao" id="botaoReta">
                <img src="../assets/img/reta.png" alt="reta">
                <span id="textoReta">Reta</span>
            </div>

            <div class="botao" id="botaoTriangulo">
                <img src="../assets/img/triangulo.png" alt="triangulo">
                <span id="textoReta">Triangulo</span>
            </div>
        </aside>

        <section class="planoCartesiano">
            <div id="box" class="jxgbox"></div>
            <script defer src="../js/script-main.js">

            </script>
        </section>
    </main>
</body>
</html>