<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formDivisi" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            namaDivisi: {
                required: true
            },
            singkatanDivisi: {
                required: true
            },
            idPerusahaan: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formDivisi_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>
