function initialize() {
    var myLatlng = new google.maps.LatLng(51.02, 4.48);
    var myOptions = {
        zoom: 14,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    var decodedPath = google.maps.geometry.encoding.decodePath("shkvHqlgZuVca@zZkn@b@{Em_@{g@_BpE_GcD_G~A{@d@NdE");
    var decodedLevels = decodeLevels("BBBBBBBBBB");

    var setRegion = new google.maps.Polyline({
        path: decodedPath,
        levels: decodedLevels,
        strokeColor: "#FF0000",
        strokeOpacity: 1.0,
        strokeWeight: 2,
        map: map
    });
}

function decodeLevels(encodedLevelsString) {
    var decodedLevels = [];

    for (var i = 0; i < encodedLevelsString.length; ++i) {
        var level = encodedLevelsString.charCodeAt(i) - 63;
        decodedLevels.push(level);
    }
    return decodedLevels;
}
initialize();
