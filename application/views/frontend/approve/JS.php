<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
    $(document).on("click", ".modalDecline", function () {
        var d_idPengajuan = $(this).data('d_id');
        var d_namaJudul = $(this).data('d_jdl');
        var d_draft_createdby = $(this).data('d_draft');
        $(".modal-body #d_idPengajuan").val(d_idPengajuan);
        $(".modal-body #d_namaJudul").val(d_namaJudul);
        $(".modal-body #d_draft_createdby").val(d_draft_createdby);
    });

    $(document).on("click", ".modalBatal", function () {
        var b_idPengajuan = $(this).data('b_id');
        var b_namaJudul = $(this).data('b_jdl');
        var b_draft_createdby = $(this).data('b_draft');
        $(".modal-body #b_idPengajuan").val(b_idPengajuan);
        $(".modal-body #b_namaJudul").val(b_namaJudul);
        $(".modal-body #b_draft_createdby").val(b_draft_createdby);
    });

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');
</script>
