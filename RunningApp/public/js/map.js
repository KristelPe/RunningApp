function initialize() {
    var poly = document.getElementById("poly").value;

    var decodedPath = google.maps.geometry.encoding.decodePath(poly);
    var decodedLevels = decodeLevels("BBBBBBBBBB");

    var bounds = new google.maps.LatLngBounds();
    var i;

// The Bermuda Triangle
    for (i = 0; i < decodedPath.length; i++) {
        var lat = decodedPath[i].lat();
        var lng = decodedPath[i].lng();
        var latlng = new google.maps.LatLng(lat, lng);
        bounds.extend(latlng);
    }


    var center = bounds.getCenter();

    var myOptions = {
        zoom: 14,
        center: new google.maps.LatLng(center.lat(), center.lng()),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

    var map = new google.maps.Map(document.getElementById("map"), myOptions);
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
