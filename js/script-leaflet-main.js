let tool = null;

let botaoPonto = document.querySelector('div#botaoPonto');
let botaoReta = document.querySelector('div#botaoReta');
let botaoTriangulo = document.querySelector('div#botaoTriangulo');

let pontosGerais = [];
let pontosRetas = [];
let pontosTriangulos = [];

let marcadoresRetas = [];
let marcadoresTriangulos = [];

let triangulos = [];

const TOLERANCIA = 15; //pixels

class Ponto {


    constructor(e, origem) {
        this.coordenada = e.latlng;
        this.origem = origem;
        this.marcador = null;
    }
    
    adicionarMarcador(tool) {
        this.marcador = L.marker(this.coordenada);
        this.marcador.addTo(map);

        switch (tool) {
            case "reta":
                marcadoresRetas.push(this.marcador);
                break;
        }
    }

    registrar(tool) {
        pontosGerais.push(this);

        switch (tool) {
            case "reta":
                pontosRetas.push(this.coordenada);
                break;
            case "triangulo":
                pontosTriangulos.push(this.coordenada);
                break;
        }

        this.adicionarMarcador(tool)
    }

};

class Reta {
    constructor(reta, pontoA, pontoB) {
        this.reta = reta;
        this.pontoA = pontoA;
        this.pontoB = pontoB;
    }
};

function verificarExistencia(e, tool) {
    const clickPoint = map.latLngToContainerPoint(e.latlng);
    let pontoEncontrado = null;

    pontosGerais.forEach(ponto => {
        const markerPoint = map.latLngToContainerPoint(ponto.coordenada);

        if (clickPoint.distanceTo(markerPoint) < TOLERANCIA) {
            pontoEncontrado = ponto;
        }
    })

    if (pontoEncontrado) {

        switch (tool) {
            case "reta":
                pontosRetas.push(pontoEncontrado.coordenada);
                break;
            case "triangulo":
                pontosTriangulos.push(pontoEncontrado.coordenada);
                break;
        }

        const marker = L.marker(pontoEncontrado);
        marcadoresTriangulos.push(marker);
    } else {
        const ponto = new Ponto(e, tool);
        ponto.registrar(tool);
    }
}

botaoPonto.addEventListener('click', () => {
    tool = "ponto";
});

botaoReta.addEventListener('click', () => {
    tool = "reta";
});

botaoTriangulo.addEventListener('click', () => {
    tool = "triangulo";
});

let map = L.map('map').setView([-5.073709, -42.831378], 18);

{     
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);


    function onMapClick(e) {
        if (tool === "ponto") {
            const ponto = new Ponto(e, tool);
            ponto.registrar();

            tool = null;
        }

        if (tool === "reta") {
            verificarExistencia(e, tool);


            if (pontosRetas.length >= 2) {
                let line = L.polyline(pontosRetas);
                line.addTo(map);

                const reta = new Reta(line, pontosRetas[0], pontosRetas[1]);
                retas.push(reta);
                
                
                for (let i = 0; i < marcadoresRetas.length; i++) {
                    map.removeLayer(marcadoresRetas[i]);
                }

                pontosRetas.length = 0;
                marcadoresRetas.length = 0;

                tool = null;
            }
        }

        if (tool === "triangulo") {

            verificarExistencia(e, tool);

            if (pontosTriangulos.length >= 3) {
                let polygon = L.polygon(pontosTriangulos).addTo(map);

                for (let i = 0; i < marcadoresTriangulos.length; i++) {
                    map.removeLayer(marcadoresTriangulos[i]);
                }

                pontosTriangulos.length = 0;
                marcadoresTriangulos.length = 0;
                triangulos.push(polygon);
                
                tool = null;
            }
        }

    }
    map.on('click', onMapClick);
}