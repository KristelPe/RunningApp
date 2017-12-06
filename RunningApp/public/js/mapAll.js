/**
 * Created by Crystal on 06/12/2017.
 */
function initialize() {
    var poly = $("input[name='poly[]']")
        .map(function(){return $(this).val();}).get();

    for (i = 0; i < poly.length; i++) {
        var decodedPath = google.maps.geometry.encoding.decodePath(poly[i]);
        var decodedLevels = decodeLevels("BBBBBBBBBB");


        var bounds = new google.maps.LatLngBounds();
        // The Bermuda Triangle
        for (y = 0; y < decodedPath.length; y++) {
            var lat = decodedPath[y].lat();
            var lng = decodedPath[y].lng();
            var latlng = new google.maps.LatLng(lat, lng);
            bounds.extend(latlng);
        }

        var center = bounds.getCenter();

        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(center.lat(), center.lng()),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById(i), myOptions);
        var setRegion = new google.maps.Polyline({
            path: decodedPath,
            levels: decodedLevels,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
            map: map
        });
    }
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