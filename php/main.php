<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../css/style-main.css">
    <link rel="stylesheet" type="text/css" href="../css/jsxgraph.css">
    <script src="../js/jsxgraphcore.js"></script>
    <title>Teste</title>
</head>
<body>
    <header>
        <h1>Sistema de Registro de Pontos</h1>
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
            <script>

                let board = JXG.JSXGraph.initBoard(
                        'box', {
                            boundingbox: [-10, 10, 10, -10],
                            axis: true
                        }
                    );

                let ferramenta = null;
                let pontosReta = [];
                let pontosTriangulo = [];
                let contadorReta = 0
                let contadorTriangulo = 0;

                let botaoPonto = document.getElementById('botaoPonto');
                let botaoReta = document.getElementById('botaoReta');
                let botaoTriangulo = document.getElementById('botaoTriangulo');

                botaoPonto.addEventListener('click', function() {
                    console.log("ALOU");
                    ferramenta = 'ponto';
                });

                botaoReta.addEventListener('click', function() {
                    ferramenta = 'reta';
                });

                botaoTriangulo.addEventListener('click', function() {
                    ferramenta = 'triangulo';
                });

                board.on('up', function (e) {

                    console.log(ferramenta)
                    console.log(ferramenta == 'triangulo')
                    if (ferramenta == 'triangulo') console.log("krl")

                    //CRIAR PONTO
                    if (ferramenta == 'ponto') {
                        const coords = board.getUsrCoordsOfMouse(e);
                        board.create('point', coords);
    
                        ferramenta = null;
                    }


                    // CRIAR RETA
                    if (ferramenta == 'reta') {
                        const COORDENADA = board.getUsrCoordsOfMouse(e);
                        const PONTO = board.create('point', COORDENADA);
                        
                        pontosReta[contadorReta] = PONTO;
                        contadorReta++;

                        if (contadorReta > 1) {
                            board.create('segment', [pontosReta[0],pontosReta[1]]);

                            ferramenta = null
                            contadorReta = 0
                            pontosReta.size = 0 //"limpar" array
                        }
                    }

                    // CRIAR TRIANGULO
                    if (ferramenta == 'triangulo') {

                        console.log('meudeus')

                        const COORDENADA = board.getUsrCoordsOfMouse(e);
                        const PONTO = board.create('point', COORDENADA);

                        console.log(COORDENADA);
                        console.log(ferramenta);
                        pontosTriangulo[contadorTriangulo] = PONTO;
                        contadorTriangulo++;

                        if (contadorTriangulo > 2) {
                            board.create('polygon', [pontosTriangulo[0], pontosTriangulo[1], pontosTriangulo[2]]);

                            ferramenta = null;
                            contadorTriangulo = 0;
                            pontosTriangulo.size = 0; //"limpar" array
                        }
                    }


                });
            </script>
        </section>
    </main>
</body>
</html>