

var map = L.map('map').setView([-5.073709, -42.831378], 18);
        
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 24,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        
        let pontos = [];
        let marcadores = [];
        let polygons = []

        // Pega a coordenada do click, adiciona um marcador e guarda ambos em arrays
        function onMapClick(e) {
            var marker = L.marker(e.latlng).addTo(map);
            var point = e.latlng;
            pontos.push(point);
            marcadores.push(marker);


            /*
            Se existirem 3 pontos e 3 marcadores:
                - Criará um polygono com os 3 pontos
                - Remove todos os marcadores e pontos salvos em seus respectivos arrays
                - Pegará as coordenadas do baricentro e adiciona um marcador
                - Adiciona o marcador e a coordenada do baricentro nos arrays
            */
            
            if (pontos.length == 3 && marcadores.length == 3) {
                polygons.forEach(polygon => map.removeLayer(polygon));
                let polygon = L.polygon([pontos[0], pontos[1], pontos[2]], { color: 'red', fill: true }).addTo(map);
                polygons.push(polygon)

                marcadores.forEach(marker => 
                    map.removeLayer(marker)
                );
                marcadores.length = 0;
                pontos.length = 0;

                let marker = L.marker(polygon.getCenter()).addTo(map);
                let point = polygon.getCenter();

                pontos.push(point);
                marcadores.push(marker);
            }
        }



        map.on('click', onMapClick);