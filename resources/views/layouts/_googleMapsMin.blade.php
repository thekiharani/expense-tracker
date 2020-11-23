<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places&v=weekly" defer></script>
<script defer>
    let map, marker;
    const lat = {{ $model->lat }};
    const lng = {{ $model->lng }};

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
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
            draggable: false
        });
    }
</script>
