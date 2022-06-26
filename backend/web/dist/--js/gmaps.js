// Marker Map
!function (map) {
    "use strict";
    map = new GMaps({
        el: '#markermap',
        lat: 34.043333,
        lng: -78.028333

    });
    map.addMarker({
        lat: 34.042,
        lng: -78.028333,
        title: 'Marker with InfoWindow',
        infoWindow: {
        content: 
        '\<div class="p-2">'+
            '<h5 class="mb-2">San Francisco</h5>'+
            '<ul class="list-unstyled crystal-line-height-2 mb-0">'+
                '<li><i class="fa fa-envelope pr-2"></i> first.last@email.com</li>'+
                '<li><i class="fa fa-phone pr-2"></i> (234) 145-1810 </li>'+
                '<li><i class="fa fa-location-arrow pr-2"></i> 795 Park Ave, Suite 120</li>'+
            '</ul>'+
        '</div>'
        }
    });
}(window.jQuery);
