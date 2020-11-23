<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places&v=weekly" defer></script>
<script defer>
    // google maps
    let map, marker, searchBox;
    let lat = {{ $model ? $model->lat : -1.1371033 }};
    let lng = {{ $model ? $model->lng : 36.96981268348891 }};

    function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 15
        });

        marker = new google.maps.Marker({
            position: {
                lat: lat,
                lng: lng
            },
            map:map,
            draggable: true
        });

        searchBox = new google.maps.places.SearchBox(document.getElementById('venue'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            let places = searchBox.getPlaces();
            let bounds = new google.maps.LatLngBounds();
            let i, place;

            for (i=0; place=places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location)
            }

            map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
            let listener = google.maps.event.addListener(map, "idle", function() {
                if (map.getZoom() > 15) map.setZoom(15);
                google.maps.event.removeListener(listener);
            });
            // map.setZoom(10);
        });

        google.maps.event.addListener(marker, 'position_changed', function () {
            lat = marker.getPosition().lat();
            lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });

    }
</script>
