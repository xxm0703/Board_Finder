
var currentPosition=null;

function getPosition(options) {
  return new Promise(function (resolve, reject) {
    navigator.geolocation.getCurrentPosition(resolve, reject, options);
  });
}

window.addEventListener("load",e=>{
    getPosition()
    .then(pos=>{currentPosition = new google.maps.LatLng(pos.coords.latitude,pos.coords.longitude);return Promise.resolve();})
    .then(()=>fetch("getAllEvents.php"))
    .then(d => d.json())
    .then(data=>{
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: currentPosition
        });
        for (var a of data){
            console.log(a);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(a.x,a.y),
                map: map,
                title: 'Your Location',
                icon:"./map-marker.ico"
            }); 
        }
    })
    .catch(err=>{
        console.log(err.message);
    })
})

