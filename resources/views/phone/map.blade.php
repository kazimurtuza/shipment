<!DOCTYPE html>
<html>
<head>
    <title>Waypoints in Directions</title>
    <style type="text/css">

        html,
        body {
            height: 99%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            float: left;
            width: 99%;
            height: 100%;
        }

    </style>
</head>
<body>
<div id="map"></div>


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9jNSEI0xOA-ykAFNA3qBcWqMUKSEoWrY&callback=initMap&libraries=&v=weekly" defer></script>
<script>
    "use strict";

    function initMap() {

        const locationdata= <?php echo json_encode($location); ?>;

        let letform=locationdata[0];
        console.log(letform);

        const map = new google.maps.Map(document.getElementById("map"),{
            zoom: 6,
            center: {
                lat: parseFloat(letform.from_lat),
                lng: parseFloat(letform.from_lng),
            }
        });

        const directionsService = new google.maps.DirectionsService();


        let points=[];


        locationdata.map(locations=>{
           let list= {
                origin: {
                    lat: parseFloat(locations.from_lat),
                        lng:parseFloat(locations.from_lng),
                },
                destination:  {
                    lat: parseFloat(locations.to_lat),
                        lng: parseFloat(locations.to_lng),
                },

                optimizeWaypoints: true,
                    travelMode: google.maps.TravelMode.DRIVING
            }

            points.push(list);

        })








        for (var i = 0; i < points.length; i++) {
            calculateAndDisplayRoute(directionsService,points[i])

        }
        function calculateAndDisplayRoute(directionsService,points) {
            let directionsRenderer = new google.maps.DirectionsRenderer();

            directionsService.route(
                points,
                (response, status) => {
                    console.log(response);
                    if (status === "OK") {
                        directionsRenderer.setDirections(response);
                        directionsRenderer.setMap(map);

                    } else {
                        window.alert("Directions request failed due to " + status);
                    }
                }
            );
        }
    }
</script>
</body>
</html>