<?php include 'templates/header.php'; ?>

<div class="container">
    <h1>Live Tracking Dashboard</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>
    <div id="persons-info" style="margin-top: 20px;">
        <!-- Person information will be loaded here -->
    </div>
</div>

<script>
    let map;
    let markers = {};
    const iconBase = 'images/'; // Base directory for icons
    const personIcon = iconBase + 'bike-icon.png'; // Path to bike icon

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 11.0168, lng: 76.9558 },
            zoom: 12
        });

        fetchPersons();
    }

    function fetchPersons() {
        $.ajax({
            url: 'api/get_persons.php',
            method: 'GET',
            success: function(data) {
                const persons = JSON.parse(data);
                persons.forEach(person => {
                    const position = { lat: parseFloat(person.latitude), lng: parseFloat(person.longitude) };
                    markers[person.id] = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: person.name,
                        icon: personIcon // Custom icon
                    });

                    google.maps.event.addListener(markers[person.id], 'click', function() {
                        fetchPersonDetails(person.id);
                    });
                });
            }
        });
    }

    function fetchPersonDetails(person_id) {
        $.ajax({
            url: 'person_details.php',
            method: 'GET',
            data: { person_id: person_id },
            success: function(data) {
                const person = JSON.parse(data);
                if (person.error) {
                    $('#persons-info').html('<p>' + person.error + '</p>');
                } else {
                    $('#persons-info').html(`
                        <h3>${person.name}</h3>
                        <p>Latitude: ${person.latitude}</p>
                        <p>Longitude: ${person.longitude}</p>
                    `);
                }
            }
        });
    }

    window.onload = initMap;
</script>


<?php include 'templates/footer.php'; ?>
