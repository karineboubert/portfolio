var power28Paris = {lat: 48.8894176, lng: 2.3442703}

var contentStringParis =`
    <h5>Power28</h5>
    54 rue Custine <br/>
    75018 PARIS<br/>
    Tel: 0782 780 350`

//contructeur
var mapParis = new google.maps.Map(document.getElementById('mapParis'), {
    zoom: 14,
    center: power28Paris
})

var infowindowParis = new google.maps.InfoWindow({
    content: contentStringParis,
    maxWidth: 200
})

var markerParis = new google.maps.Marker({
    position: power28Paris,
    map: mapParis,
    title: 'Power28Paris'
})

markerParis.addListener('click', function() {
    infowindowParis.open(mapParis, markerParis)
})


var power28Toulouse = {lat: 43.5952797, lng: 1.4156897999999956}

var contentStringToulouse =`
    <h5>Power28</h5>
    10 passage Roquemaurel<br/>
    31300 TOULOUSE<br/>
    Tel: 0782 780 35`


var mapToulouse = new google.maps.Map(document.getElementById('mapToulouse'), {
    zoom: 14,
    center: power28Toulouse
})

var infowindowToulouse = new google.maps.InfoWindow({
    content: contentStringToulouse,
    maxWidth: 200
})

var markerToulouse = new google.maps.Marker({
    position: power28Toulouse,
    map: mapToulouse,
    title: 'Power28'
})

markerToulouse.addListener('click', function() {
    infowindowToulouse.open(mapToulouse, markerToulouse)
})
