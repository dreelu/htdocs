let tool = null;

let botaoPonto = document.querySelector('div#botaoPonto');
let botaoReta = document.querySelector('div#botaoReta');
let botaoTriangulo = document.querySelector('div#botaoTriangulo');

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
    
    let pontos = [];
    let pontosRetas = [];
    let pontosTriangulos = [];
    let pontosGerais = [];

    let marcadores = [];
    let marcadoresRetas = [];
    let marcadoresTriangulos = [];

    let triangulos = [];

    const TOLERANCIA = 15; //pixels

    function onMapClick(e) {
        if (tool === "ponto") {
            let point = e.latlng;
            let marker = L.marker(point).addTo(map);
            pontos.push(point);
            pontosGerais.push(point);
            marcadores.push(marker);

            tool = null;
        }

        if (tool === "reta") {
            let point = e.latlng;
            let marker = L.marker(point).addTo(map);
            pontosRetas.push(point);
            marcadoresRetas.push(marker);

            if (pontosRetas.length >= 2 && marcadoresRetas.length >= 2) {
                let line = L.polyline(pontosRetas).addTo(map);
                
                for (let i = 0; i < marcadoresRetas.length; i++) {
                    map.removeLayer(marcadoresRetas[i]);
                }

                pontosRetas.length = 0;
                marcadoresRetas.length = 0;

                tool = null;
            }
        }

        if (tool === "triangulo") {

            const clickPoint = map.latLngToContainerPoint(e.latlng);
            let pontoEncontrado = null;

            pontosGerais.forEach(ponto => {
                const markerPoint = map.latLngToContainerPoint(ponto);

                if (clickPoint.distanceTo(markerPoint) < TOLERANCIA) {
                    pontoEncontrado = ponto;
                }
            })

            if (pontoEncontrado) {
                pontosTriangulos.push(pontoEncontrado);
                const marker = L.marker(pontoEncontrado);
                marcadoresTriangulos.push(marker);
            } else {
                const point = e.latlng;
                const marker = L.marker(point).addTo(map);
                pontosTriangulos.push(point);
                marcadoresTriangulos.push(marker);
            }


            if (pontosTriangulos.length >= 3 && marcadoresTriangulos.length >= 3) {
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