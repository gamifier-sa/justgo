
$(document).ready(function() {
    map = new google.maps.Map(document.getElementById("map_branch_create"), {
        center: {
            lat: 23.725398200849025,
            lng: 44.84771717685271
        },
        zoom: 5,
    });
    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("a");

    locationButton.textContent = "Pan to Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    infoWindow.setPosition(pos);
                    // infoWindow.setContent("Your Location");
                    var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'latLng': pos
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            // console.log(results[1],mapsMouseEvent.latLng.toJSON())
                            if (results[1]) {
                                // alert("Location: " + results[1].formatted_address);
                                // const loca =  results[1].formatted_address
                                infoWindow.setContent(
                                    // JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                                    `${results[1].formatted_address}`
                                );
                                document.getElementById("location_map").value = results[
                                    1].formatted_address;
                                infoWindow.open(map);

                            }
                        }
                    });
                    document.getElementById("latitude_map").value = position.coords.latitude;
                    document.getElementById("longitude_map").value = position.coords.longitude;

                    infoWindow.open(map);
                    map.setCenter(pos);
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });

        // console.log(mapsMouseEvent,mapsMouseEvent.latLng.toJSON())
        var geocoder = geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'latLng': mapsMouseEvent.latLng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                // console.log(results[1],mapsMouseEvent.latLng.toJSON())
                if (results[1]) {
                    // alert("Location: " + results[1].formatted_address);
                    // const loca =  results[1].formatted_address
                    infoWindow.setContent(
                        // JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                        `${results[1].formatted_address}`
                    );
                    document.getElementById("location_map").value = results[1]
                        .formatted_address;
                    document.getElementById("latitude_map").value = mapsMouseEvent.latLng
                        .toJSON().lat;
                    document.getElementById("longitude_map").value = mapsMouseEvent.latLng
                        .toJSON().lng;
                    infoWindow.open(map);

                }
            }
        });


        // map.panTo(mapsMouseEvent.latLng);
    });




    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }
});
window.initMap = initMap;
