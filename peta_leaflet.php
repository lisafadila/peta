<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Pesebaran PAD</title>
    <!-- Menambahkan CSS untuk Leaflet, Leaflet Search, Leaflet Control Geocoder, Bootstrap, dan Font Awesome -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        /* Gaya untuk elemen peta agar memiliki tinggi 600px dan margin atas 20px */
        #map {
            height: 600px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Judul halaman dengan margin atas dan bawah 4, serta teks tengah -->
        <h1 class="my-4 text-center">Peta Pesebaran PAD</h1>
        <div class="row">
            <div class="col-12">
                <!-- Div untuk menampilkan peta -->
                <div id="map"></div>
            </div>
        </div>
    </div>

    <!-- Menambahkan JavaScript untuk jQuery, Popper, Bootstrap, Leaflet, Leaflet Search, dan Leaflet Control Geocoder -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.src.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Inisialisasi peta di Gorontalo dengan koordinat [0.5475, 123.0651] dan level zoom 13
        var map = L.map('map').setView([0.5475, 123.0651], 13);

        // Menambahkan layer peta dasar dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan control pencarian lokasi menggunakan Leaflet Control Geocoder
        L.Control.geocoder().addTo(map);

        // Fungsi untuk menambahkan peta rawan bencana tanah longsor dari file GeoJSON dengan warna yang berbeda
        function loadLandslideRiskMap(url, color, layerGroup) {
            fetch(url) // Mem-fetch file GeoJSON dari URL
                .then(response => response.json()) // Mengonversi respon menjadi JSON
                .then(data => {
                    // Membuat layer GeoJSON dengan data yang di-fetch
                    var geojsonLayer = L.geoJSON(data, {
                        style: function (feature) {
                            return {
                                color: color,
                                weight: 2,
                                fillOpacity: 0.5 // Mengatur transparansi area
                            };
                        },
                        onEachFeature: function (feature, layer) {
                            // Logging untuk melihat properti fitur di konsol (untuk debugging)
                            console.log(feature.properties);
                            // Menambahkan popup ke setiap layer dengan properti yang relevan
                            layer.bindPopup('<i class="fas fa-map-marker-alt"></i> ' + (feature.properties.riskLevel || "No Risk Level")); // Ganti 'riskLevel' dengan properti yang sesuai
                        }
                    });

                    // Menambahkan layer ke grup layer
                    layerGroup.addLayer(geojsonLayer);
                    
                })
                .catch(error => console.error('Error loading GeoJSON:', error)); // Menangani error
        }

        // Menambahkan grup layer untuk peta rawan bencana
        var layerControl = L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);

        // Memuat data GeoJSON peta rawan bencana tanah longsor dengan warna yang berbeda
        loadLandslideRiskMap('assets/tanggamus/data_longsor.geojson', '#FF0000', layerGroup); // Merah

        // Menambahkan kontrol pencarian menggunakan Leaflet Search
        var searchControl = new L.Control.Search({
            layer: layerGroup, // Layer yang akan dicari
            propertyName: 'riskLevel', // Properti yang akan dicari (ubah sesuai dengan properti GeoJSON)
            marker: false, // Tidak menambahkan marker hasil pencarian
            moveToLocation: function (latlng, title, map) {
                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                map.setView(latlng, zoom); // Zoom ke hasil pencarian
            }
        });

        // Menambahkan kontrol pencarian ke peta
        map.addControl(searchControl);
    </script>
</body>

</html>
