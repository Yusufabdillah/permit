<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 20/02/2019
 * Time: 0:58
 */
?>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<script type="text/javascript">
    <?php
    $lat = $get_geocoder->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
    $lng = $get_geocoder->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
    ?>
    function addMarkersToMap(map) {
        var DocMarker = new H.map.Marker({lat:<?= $lat; ?>, lng:<?= $lng; ?>});
        map.addObject(DocMarker);
    }

    var platform = new H.service.Platform({
        app_id: 'QwI9l5v8NxfXFtuDYAT8',
        app_code: 'vbmww1UnJMDe7kwNcZJIkg',
        useHTTPS: true
    });
    var pixelRatio = window.devicePixelRatio || 1;
    var defaultLayers = platform.createDefaultLayers({
        tileSize: pixelRatio === 1 ? 256 : 512,
        ppi: pixelRatio === 1 ? undefined : 320
    });

    //Step 2: initialize a map - this map is centered over Europe
    var map = new H.Map(document.getElementById('map'),
        defaultLayers.normal.map,{
            center: {lat:<?= $lat; ?>, lng:<?= $lng; ?>},
            zoom: 13,
            pixelRatio: pixelRatio
        });

    //Step 3: make the map interactive
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    // Create the default UI components
    var ui = H.ui.UI.createDefault(map, defaultLayers);

    // Now use the map as required...
    addMarkersToMap(map);
</script>
