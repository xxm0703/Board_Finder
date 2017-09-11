$(document).ready(function () {

    var x = null;

    function test(){
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: x
        });

        var marker = new google.maps.Marker({
            position: x,
            map: map,
            title: 'Your Location',
            icon:"./map-marker.ico"
        });
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        x = new google.maps.LatLng(parseFloat(position.coords.latitude),parseFloat(position.coords.longitude));
        test();
    }
    getLocation();
});