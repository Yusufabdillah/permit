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
        var d_idEstafet = $(this).data('d_idest');
        var d_approve_createdby = $(this).data('d_koor');
        var d_namaJudul = $(this).data('d_jdl');
        var d_namaUser_asal = $(this).data('d_nama_asal');
        var d_idUser_asal = $(this).data('d_iduser_asal');
        var d_idPerusahaan_asal = $(this).data('d_idperusahaan');
        var d_ASAL_PRS_namaPerusahaan = $(this).data('d_namaprs');
        $(".modal-body #d_idPengajuan").val(d_idPengajuan);
        $(".modal-body #d_idEstafet").val(d_idEstafet);
        $(".modal-body #d_approve_createdby").val(d_approve_createdby);
        $(".modal-body #d_namaJudul").val(d_namaJudul);
        $(".modal-body #d_namaUser_asal").val(d_namaUser_asal);
        $(".modal-body #d_idUser_asal").val(d_idUser_asal);
        $(".modal-body #d_idPerusahaan_asal").val(d_idPerusahaan_asal);
        $(".modal-body #d_ASAL_PRS_namaPerusahaan").val(d_ASAL_PRS_namaPerusahaan);
    });

    $(document).on("click", ".modalApprove", function () {
        var a_idPengajuan = $(this).data('a_id');
        var a_idEstafet = $(this).data('a_idest');
        var a_approve_createdby = $(this).data('a_koor');
        var a_namaJudul = $(this).data('a_jdl');
        var a_namaUser_asal = $(this).data('a_nama_asal');
        var a_idUser_asal = $(this).data('a_iduser_asal');
        var a_idPerusahaan_asal = $(this).data('a_idperusahaan');
        var a_ASAL_PRS_namaPerusahaan = $(this).data('a_namaprs');
        $(".modal-body #a_idPengajuan").val(a_idPengajuan);
        $(".modal-body #a_idEstafet").val(a_idEstafet);
        $(".modal-body #a_approve_createdby").val(a_approve_createdby);
        $(".modal-body #a_namaJudul").val(a_namaJudul);
        $(".modal-body #a_namaUser_asal").val(a_namaUser_asal);
        $(".modal-body #a_idUser_asal").val(a_idUser_asal);
        $(".modal-body #a_idPerusahaan_asal").val(a_idPerusahaan_asal);
        $(".modal-body #a_ASAL_PRS_namaPerusahaan").val(a_ASAL_PRS_namaPerusahaan);
    });

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');
</script>
