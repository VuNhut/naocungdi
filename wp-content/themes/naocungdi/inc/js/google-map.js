document.addEventListener('DOMContentLoaded', function () {
    var hostname = window.location.protocol + "//" + window.location.hostname;

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
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
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
        document.body.addEventListener( 'click', function ( event ) {
            if( event.srcElement.id == 'view-direction' ) {
                event.preventDefault();
                var direction = document.getElementById('view-direction');
                calculateAndDisplayRoute(direction.getAttribute('data-lat'), direction.getAttribute('data-lng'), direction.getAttribute('data-window'));
            };
        });
        document.getElementById('hidden-panel').addEventListener('click', function (e) {
            e.preventDefault();
            if (this.getAttribute('data-status') == 'hidden') {
                this.nextElementSibling.style.display = "none";
                document.getElementById('hidden-panel').setAttribute('data-status', 'show');
                document.getElementById('hidden-panel').innerHTML = "Hiện bảng chỉ đường";
            } else {
                this.nextElementSibling.style.display = "block";
                document.getElementById('hidden-panel').setAttribute('data-status', 'hidden');
                document.getElementById('hidden-panel').innerHTML = "Ẩn bảng chỉ đường";
            }
        })
    }

    // Set info location for the map
    function setInfoLocation(listLocation, marker, markers, infoWindowContent, flightPath) {
        var x = document.querySelectorAll(listLocation);
        for (var i = 0; i < x.length; i++) {
            const index = i;
            var latX = Number(x[i].getAttribute('data-lat'));
            var lngX = Number(x[i].getAttribute('data-lng'));
            var content = x[i].getAttribute('data-name');
            if (latX !==0 && lngX !==0) {
                var placeX = [ latX, lngX ];
                markers.push(placeX);
                infoWindowContent.push(content);
            }
            x[i].addEventListener('click', function () {
                directionsDisplay.setMap(null);
                toggleBounce(index, marker, markers, infoWindowContent, flightPath);
            })
        }
    }

    // Shows all marker in the map
    function showMarker(marker, markers, infoWindowContent, flightPath) {
        map.setCenter(markerCenter.getPosition());
        infoWindowCenter.open(map, markerCenter);
        labelIndex = 0;
        // Add a marker at the center of the map.
        for (var m = 0; m < markers.length; m++) {
            var position = new google.maps.LatLng(markers[m][0], markers[m][1]);
            addMarker(marker, markers, position, infoWindowContent, map, flightPath, m);
        }
    }

    // Removes all marker from the map
    function removeMarker(marker, flightPath) {
        for (var r = 0; r < marker.length; r++) {
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
            icon: "https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+ labels[labelIndex++ % labels.length] +"|ED1A24|FFFFFF|FFFFFF",
            map: map
        });
        marker[index].addListener('click', function () {
            directionsDisplay.setMap(null);
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
        for (var i = 0; i < marker.length; i++) {
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
        btnStaying = document.querySelector('.type-location .staying'),
        panel = document.getElementById('direction-panel');

    if (btnTraveling) {
        google.maps.event.addDomListener(btnTraveling, 'click', function () {
            removeMarker(markerEating, flightPathEating);
            removeMarker(markerStaying, flightPathStaying);
            showMarker(markerTraveling, markersTraveling, infoWindowContentTraveling, flightPathTraveling);
            directionsDisplay.setMap(null);
            if (panel.firstElementChild.nextElementSibling) {
                panel.firstElementChild.nextElementSibling.remove();
                document.getElementById('hidden-panel').style.display = "";
            }
        });
    }

    if (btnEating) {
        google.maps.event.addDomListener(btnEating, 'click', function () {
            removeMarker(markerTraveling, flightPathTraveling);
            removeMarker(markerStaying, flightPathStaying);
            showMarker(markerEating, markersEating, infoWindowContentEating, flightPathEating);
            directionsDisplay.setMap(null);
            if (panel.firstElementChild.nextElementSibling) {
                panel.firstElementChild.nextElementSibling.remove();
                document.getElementById('hidden-panel').style.display = "";
            }
        });
    }

    if (btnStaying) {
        google.maps.event.addDomListener(btnStaying, 'click', function () {
            removeMarker(markerTraveling, flightPathTraveling);
            removeMarker(markerEating, flightPathEating);
            showMarker(markerStaying, markersStaying, infoWindowContentStaying, flightPathStaying);
            directionsDisplay.setMap(null);
            if (panel.firstElementChild.nextElementSibling) {
                panel.firstElementChild.nextElementSibling.remove();
                document.getElementById('hidden-panel').style.display = "";
            }
        });
    }

    // Direction Location
    function calculateAndDisplayRoute(latEnd, lngEnd, window) {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var markerStart = new google.maps.Marker({
                    position: {lat: position.coords.latitude, lng: position.coords.longitude},
                    animation: google.maps.Animation.DROP,
                    icon: hostname + "/wp-content/themes/naocungdi/images/icon-yah.png"
                });
                markerStart.setMap(map);
                infoWindow.setContent('Bạn đang ở đây');
                infoWindow.open(map, markerStart);
                markerStart.addListener('click', function () {
                    infoWindow.setContent('Bạn đang ở đây');
                    infoWindow.open(map, markerStart);
                })

                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(document.getElementById('direction-panel'));
                directionsService.route({
                    origin: {lat: position.coords.latitude, lng: position.coords.longitude},
                    destination: {lat: Number(latEnd), lng: Number(lngEnd)},
                    travelMode: 'DRIVING'
                }, function(response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                        document.getElementById('hidden-panel').style.display = "block";
                        setInterval(updateGeolocation(markerStart), 5000);
                    } else {
                        infoWindow.close();
                        infoWindow.setPosition(map.getCenter());
                        if (status === "NOT_FOUND") {
                            infoWindow.setContent('Có vị trí không được mã hóa địa lý nên Nào Cùng Đi không thể tìm đường đến nơi này');
                        } else if (status === "ZERO_RESULTS") {
                            infoWindow.setContent('Không tìm thấy tuyến đường nào để đi đến địa điểm này');
                        } else if (status === "MAX_ROUTE_LENGTH_EXCEEDED") {
                            infoWindow.setContent('Tuyến đường quá dài nên Nào Cùng Đi không thể xử lý được');
                        } else if (status === "OVER_QUERY_LIMIT") {
                            infoWindow.setContent('Nào Cùng Đi đã xử lý hơn 2.500 yêu cầu chỉ đường trong hôm này. Bạn hãy sử dụng chức năng này vào ngày mai');
                        } else if (status === "REQUEST_DENIED") {
                            infoWindow.setContent('Hiện tại chức năng chỉ đường đang tạm khóa');
                        } else if (status === "UNKNOWN_ERROR") {
                            infoWindow.setContent('Lỗi máy chủ. Bạn vui lòng thử lại chức năng chỉ đường trong vài phút nữa');
                        } else {
                            infoWindow.setContent('Yêu cầu chỉ đường không thành công');
                        }
                        infoWindow.open(map);
                    }
                    if (window == "travel") {
                        removeFlightPath(flightPathTraveling);
                    } else if (window == "eating") {
                        removeFlightPath(flightPathEating);
                    } else if (window == "staying") {
                        removeFlightPath(flightPathStaying);
                    } else {
                        removeFlightPath(flightPathTraveling);
                        removeFlightPath(flightPathEating);
                        removeFlightPath(flightPathStaying);
                    }
                });
            }, function() {
                    handleLocationError(true, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Lỗi: Để sử dụng chức năng này bạn phải cho phép Nào Cùng Đi biết vị trí của bạn' :
                              'Lỗi: Chức năng này không được hỗ trợ trên trình duyệt web của bạn');
        infoWindow.open(map);
    }

    function removeFlightPath(flightPath) {
        for (var r = 0; r < flightPath.length; r++) {
            if (flightPath[r]) {
                flightPath[r].setMap(null);
            }
        }
    }

    function updateGeolocation(markerStart) {
        navigator.geolocation.getCurrentPosition(function(position) {
            markerStart.setMap(null);
            markerStart = new google.maps.Marker({
                position: {lat: position.coords.latitude, lng: position.coords.longitude},
                icon: hostname + "/wp-content/themes/naocungdi/images/icon-yah.png"
            });
            markerStart.setMap(map);
            markerStart.addListener('click', function () {
                infoWindow.setContent('Bạn đang ở đây');
                infoWindow.open(map, markerStart);
            })
        })
    }

    // Create Element.remove() function if not exist
    if (!('remove' in Element.prototype)) {
        Element.prototype.remove = function() {
            if (this.parentNode) {
                this.parentNode.removeChild(this);
            }
        };
    }
})