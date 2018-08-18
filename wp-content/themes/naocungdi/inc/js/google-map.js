document.addEventListener('DOMContentLoaded', function () {

    // In the following example, markers appear when the user clicks on the map.
    // Each marker is labeled with a single alphabetical character.
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    var markerCenter, markerTraveling = [], markerEating = [], markerStaying = [];
    var markersTraveling = [], markersEating = [], markersStaying = [];
    var infoWindowContentCenter, infoWindowContentTraveling = [], infoWindowContentEating = [], infoWindowContentStaying = [];
    var flightPathTraveling = [], flightPathEating = [], flightPathStaying = [];
    var infoWindow = new google.maps.InfoWindow(), infoWindowCenter = new google.maps.InfoWindow();
    var mapProject = document.getElementById('map-project');
    var placeCenter = [ Number(mapProject.getAttribute('data-lat')), Number(mapProject.getAttribute('data-lng')) ];
    var map = new google.maps.Map(mapProject, {
        zoom: 16,
        mapTypeControl: false,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        },
        center: { lat: placeCenter[0], lng: placeCenter[1]}
    });

    function initialize() {
        setInfoLocation('.location-traveling', markerTraveling, markersTraveling, infoWindowContentTraveling, flightPathTraveling);
        setInfoLocation('.location-eating', markerEating, markersEating, infoWindowContentEating, flightPathEating);
        setInfoLocation('.location-staying', markerStaying, markersStaying, infoWindowContentStaying, flightPathStaying);
    }

    // Set info location for the map
    function setInfoLocation(listLocation, marker, markers, infoWindowContent, flightPath) {
        var x = document.querySelectorAll(listLocation);
        for (let i = 0; i < x.length; i++) {
            var latX = Number(x[i].getAttribute('data-lat'));
            var lngX = Number(x[i].getAttribute('data-lng'));
            var content = x[i].getAttribute('data-name');
            if (latX !==0 && lngX !==0) {
                var placeX = [ latX, lngX ];
                markers.push(placeX);
                infoWindowContent.push(content);
            }
            x[i].addEventListener('click', function () {
                toggleBounce(i, marker, markers, infoWindowContent, flightPath);
            })
        }
    }

    // Shows all marker in the map
    function showMarker(marker, markers, infoWindowContent, flightPath) {
        map.setCenter(markerCenter.getPosition());
        infoWindowCenter.open(map, markerCenter);
        labelIndex = 0;
        // Add a marker at the center of the map.
        for (let m = 0; m < markers.length; m++) {
            var position = new google.maps.LatLng(markers[m][0], markers[m][1]);
            addMarker(marker, markers, position, infoWindowContent, map, flightPath, m);
        }
    }

    // Removes all marker from the map
    function removeMarker(marker, flightPath) {
        for (let r = 0; r < marker.length; r++) {
            marker[r].setMap(null);
            if (flightPath[r]) {
                flightPath[r].setMap(null);
            }
        }
    }

    // Adds center position to the map
    function addCenter() {
        markerCenter = new google.maps.Marker({
            position: { lat: placeCenter[0], lng: placeCenter[1]},
            map: map
        });
        infoWindowContentCenter = mapProject.getAttribute('data-name');
        infoWindowCenter.setContent(infoWindowContentCenter);
        infoWindowCenter.open(map, markerCenter);
        document.getElementById('name-project').addEventListener('click', function () {
            clickCenter();
        })
        markerCenter.addListener('click', function () {
            clickCenter();
        })
    }

    // Adds a marker to the map.
    function addMarker(marker, markers, location, infoWindowContent, map, flightPath, index) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        marker[index] = new google.maps.Marker({
            position: location,
            animation: google.maps.Animation.DROP,
            icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+ labels[labelIndex++ % labels.length] +"|ED1A24|FFFFFF|FFFFFF",
            map: map
        });
        marker[index].addListener('click', function () {
            toggleBounce(index, marker, markers, infoWindowContent, flightPath);
        })
    }
    // Toggle marker when clicked
    function toggleBounce(index, marker, markers, infoWindowContent, flightPath) {
        map.setCenter(marker[index].getPosition());
        if (marker[index].getAnimation() === null) {
            infoWindowCenter.close();
            infoWindow.setContent(infoWindowContent[index]);
            infoWindow.open(map, marker[index]);
            markerCenter.setAnimation(null);
            clearEffect(marker, flightPath);
            marker[index].setAnimation(google.maps.Animation.BOUNCE);
            var flightPlanCoordinates = [
                {lat: placeCenter[0], lng: placeCenter[1]},
                {lat: markers[index][0], lng: markers[index][1]}
            ];
            flightPath[index] = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: '#000000',
                strokeOpacity: 1.0,
                strokeWeight: 3
            });
    
            flightPath[index].setMap(map);
        }
    }

    // Event click center location on the map
    function clickCenter() {
        infoWindow.close();
        map.setCenter(markerCenter.getPosition());
        infoWindowCenter.open(map, markerCenter);
        markerCenter.setAnimation(google.maps.Animation.BOUNCE);
        clearEffect(markerTraveling, flightPathTraveling);
        clearEffect(markerEating, flightPathEating);
        clearEffect(markerStaying, flightPathStaying);
    }

    // Clear animation and flight path from the map
    function clearEffect(marker, flightPath) {
        for (let i = 0; i < marker.length; i++) {
            if ((marker[i].getAnimation() !== null) ) {
                marker[i].setAnimation(null);
            }
            if (flightPath[i]) {
                flightPath[i].setMap(null);
            }
        }
    }
    google.maps.event.addDomListener(window, 'load', function () {
        initialize();
        addCenter();
        showMarker(markerTraveling, markersTraveling, infoWindowContentTraveling, flightPathTraveling);
    });

    // Type Location button
    var btnTraveling = document.querySelector('.type-location .traveling'),
        btnEating = document.querySelector('.type-location .eating'),
        btnStaying = document.querySelector('.type-location .staying');

    google.maps.event.addDomListener(btnTraveling, 'click', function () {
        removeMarker(markerEating, flightPathEating);
        removeMarker(markerStaying, flightPathStaying);
        showMarker(markerTraveling, markersTraveling, infoWindowContentTraveling, flightPathTraveling);
    });

    google.maps.event.addDomListener(btnEating, 'click', function () {
        removeMarker(markerTraveling, flightPathTraveling);
        removeMarker(markerStaying, flightPathStaying);
        showMarker(markerEating, markersEating, infoWindowContentEating, flightPathEating);
    });

    google.maps.event.addDomListener(btnStaying, 'click', function () {
        removeMarker(markerTraveling, flightPathTraveling);
        removeMarker(markerEating, flightPathEating);
        showMarker(markerStaying, markersStaying, infoWindowContentStaying, flightPathStaying);
    });

})