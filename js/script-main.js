
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

let botaoSair = document.getElementById('botaoSair');
let botaoPonto = document.getElementById('botaoPonto');
let botaoReta = document.getElementById('botaoReta');
let botaoTriangulo = document.getElementById('botaoTriangulo');


botaoSair.addEventListener('click', () => {
    window.location.href = "logout.php";
});

botaoPonto.addEventListener('click', () => {
    ferramenta = 'ponto';
});

botaoReta.addEventListener('click', () => {
    ferramenta = 'reta';
});

botaoTriangulo.addEventListener('click', () => {
    ferramenta = 'triangulo';
});

board.on('up', function (e) {

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

        const COORDENADA = board.getUsrCoordsOfMouse(e);
        const PONTO = board.create('point', COORDENADA);

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