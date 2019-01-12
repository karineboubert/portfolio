

<script>

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {lat: 46.227638 , lng: 2.213749}
        });

        setMarkers(map);
    }

    // Data for the markers consisting of a name, a LatLng and a zIndex for the
    // order in which these markers should display on top of each other.
    var hotels = [
        ['HÔTEL PARADIS PALACE', 36.3908012, 10.55902, ],
        ['CALIFORNIA AM KURFÜRSTENDAMM', 52.502676, 13.323901],
        ['CLUB CORALIA BLUEBAY GRAND ESMERALDA ', 20.700257, -87.012947],
        ['GRAND BAHIA PRINCIPE SAN JUAN', 18.479024, -69.897991],
        ['THE BAY HOTEL', -20.279401,  57.374494],
        ['DOLMEN RESORT HÔTEL', 35.954334, 14.418418],
        ['THE BAY HOTEL', -20.279401,  57.374494],
        ['TUNITED COLORS OF BALI', -8.6478175,  115.13851920000002],
        ['HÔTEL NEPTUNE VILLAGE BEACH RESORT & SPA', -4.2975511,  39.58216779999998],
        ['SALMAKIS RESORT & SPA', 37.039342,  27.430355700000064],
        ['BILDERBERG GARDEN HOTEL ', 52.3511447,  4.874076400000035],
        ['BAHIA FLAMINGO ', 28.226703, -16.838712999999984],
        ['CARIBE CLUB PRINCESS BEACH RESORT & SPA ', 18.7027638, -68.44193150000001],
        ['ELITE PALACE HOTEL  ', 59.34675, 18.03932850000001],
        ['HÔTEL CHALET ROYAL', 46.1958298, 7.342751399999997],
        ['CLUB CORALIA OHTELS ISLANTILLA ', 37.2085133, -7.2285967000000255],
        ['EL GRECO ', 36.411172, 25.43478700000003],
        ['HOTEL PRAHA  ', 50.0718899, 14.44626160000007],
        ['THE QUEEN\'S PARK ', 51.5117823, -0.18503639999994448],
        ['HÔTEL PRINCESA PARC', 42.574005, 1.482236999999941],
        ['HÔTEL ALKISTIS HOTEL', 37.4689188, 25.31962850000002],
        ['ROC PRESIDENTE', 23.1135925, -82.36659559999998],
        ['CHIANTI VILLAGE ', 43.55813, 11.207953999999972],
        ['HÔTEL MARIFA', 16.2133079, -61.43203889999995],
        ['CITYMAX BUR DUBAÏ', 25.2514369, 55.29000180000003],
        ['COMFORT HÔTEL VESTERBRO', 55.67286069999999, 12.558972100000005],
        ['BEST WESTERN PREMIER HÔTEL COUTURE', 52.3511137, 4.841162899999972],
        ['AMANI TIWI BEACH RESORT', -4.1816115, 39.46056120000003]
    ];


    function setMarkers(map) {

        for (var i = 0; i < hotels.length; i++) {
            var hotel = hotels[i];
            var marker = new google.maps.Marker({
                position: {lat: hotel[1], lng: hotel[2]},
                map: map,
                title: hotel[0],
            });
          
        }


    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAil4y03l-58BNM9TzfWlLIhGaz5cJJaR0&callback=initMap">
</script>
