var map;

$(document).ready(function() {
    if ($('#mapContainer').length) {
        initMap();
    }
});


function initMap() {
    var lat = parseFloat($('#mapContainer').data('lat'));
    var lng = parseFloat($('#mapContainer').data('lng'));

    var centerMap =
    {
        lat: lat,
        lng: lng
    }
    var mapOptions =
    {
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: centerMap
    };

    map = new google.maps.Map($('#map')[0], mapOptions);

    new google.maps.Marker({
        map: map,
        position: centerMap
    });

}
