<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>

<script>
    $(document).on("click", ".modalAktif", function () {
        var ak_idPengajuan = $(this).data('ak_id');
        var ak_namaJudul = $(this).data('ak_jdl');
        var ak_approve_createdby = $(this).data('ak_approve');
        $(".modal-body #ak_idPengajuan").val(ak_idPengajuan);
        $(".modal-body #ak_namaJudul").val(ak_namaJudul);
        $(".modal-body #ak_approve_createdby").val(ak_approve_createdby);
    });
    
    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');
    
</script>
