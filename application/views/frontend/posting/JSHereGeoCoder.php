<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/02/2019
 * Time: 21:57
 */
?>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
<script type="text/javascript">
    $.ajax({
        url: 'https://geocoder.api.here.com/6.2/geocode.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        data: {
            searchtext: '<?= $Kelurahan.' '.$Kecamatan.' '.$Kota.' '.$Provinsi.' '.$Negara; ?>',
            gen: '9',
            app_id: 'QwI9l5v8NxfXFtuDYAT8',
            app_code: 'vbmww1UnJMDe7kwNcZJIkg'
        },
        success: function (data) {
            $('#AJAX_geocoderDokumen').val(JSON.stringify(data))
        }
    });
</script>
