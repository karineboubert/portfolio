function initMap() {
    var myLatLng = {lat: -25.363, lng: 131.044};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });
}

src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAil4y03l-58BNM9TzfWlLIhGaz5cJJaR0&callback=initMap">
