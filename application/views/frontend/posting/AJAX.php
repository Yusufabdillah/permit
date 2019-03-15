<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:17
 */
?>
<script type="text/javascript">
    $('#AJAX_exp_selamanyaDokumen').change(function () {
        if(!this.checked) {
            //var data = $("#AJAX_exp_selamanyaDokumen").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toMasaBerlaku',
                    'status' : 'aktif'
                },
                success: function(msg){
                    $('#AJAX_tglBerlaku').html(msg);
                }
            });
        } else if (this.checked) {
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toMasaBerlaku',
                    'status' : 'tidak_aktif'
                },
                success: function(msg){
                    $('#AJAX_tglBerlaku').html(msg);
                }
            });
        }
    });

    /**
     * Untuk Data Wilayah Dokumen
     */
    $('#AJAX_idNegara').change(function () {
        var data = $("#AJAX_idNegara").val();
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toProvinsi',
                'idNegara': data
            },
            success: function(msg){
                $('#AJAX_idProvinsi').html(msg);
            }
        });
    });

    $('#AJAX_idProvinsi').change(function () {
        var data = $("#AJAX_idProvinsi").val();
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toKota',
                'idProvinsi': data
            },
            success: function(msg){
                $('#AJAX_idKota').html(msg);
            }
        });
    });

    $('#AJAX_idKota').change(function () {
        var data = $("#AJAX_idKota").val();
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toKecamatan',
                'idKota': data
            },
            success: function(msg){
                $('#AJAX_idKecamatan').html(msg);
            }
        });
    });

    $('#AJAX_idKecamatan').change(function () {
        var data = $("#AJAX_idKecamatan").val();
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toKelurahan',
                'idKecamatan': data
            },
            success: function(msg){
                $('#AJAX_idKelurahan').html(msg);
            }
        });
        $.ajax({
            type: "POST",
            url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
            data: {
                'fungsi' : 'toPerusahaan',
                'idKecamatan': data
            },
            success: function(msg){
                $('#AJAX_idPerusahaan').html(msg);
            }
        });
    });
</script>
