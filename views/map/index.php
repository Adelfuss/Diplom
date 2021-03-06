<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add live realtime data</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
</head>
<body>
<div id="map"></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYWRlbGZ1c3MiLCJhIjoiY2trbndlMjA0MHg1ZjJwbnNhcDQ3MG0yZiJ9.QroNFNnSq37Ey_lmR-UR_A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 0
    });

    var url = '/map/get';
    map.on('load', function () {
        var request = new XMLHttpRequest();
        window.setInterval(function () {
// make a GET request to parse the GeoJSON at the url
            request.open('GET', url, true);
            request.onload = function () {
                if (this.status >= 200 && this.status < 400) {
// retrieve the JSON from the response
                    var json = JSON.parse(this.response);
                    console.log(json);
                    json.properties = {};
// update the drone symbol's location on the map
                    map.getSource('drone').setData(json);

// fly the map to the drone's current location
                    map.flyTo({
                        center: json.geometry.coordinates,
                        speed: 0.5
                    });
                }
            };
            request.send();
        }, 2000);

        map.addSource('drone', { type: 'geojson', data: url });
        map.addLayer({
            'id': 'drone',
            'type': 'symbol',
            'source': 'drone',
            'layout': {
                'icon-image': 'rocket-15'
            }
        });
    });
</script>

</body>
</html>