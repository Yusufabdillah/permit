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
        var d_namaJudul = $(this).data('d_jdl');
        var d_namaUser_asal = $(this).data('d_nama_asal');
        var d_idUser_asal = $(this).data('d_iduser_asal');
        var d_idPerusahaan_asal = $(this).data('d_idperusahaan');
        var d_ASAL_PRS_namaPerusahaan = $(this).data('d_namaprs');
        $(".modal-body #d_idPengajuan").val(d_idPengajuan);
        $(".modal-body #d_idEstafet").val(d_idEstafet);
        $(".modal-body #d_namaJudul").val(d_namaJudul);
        $(".modal-body #d_namaUser_asal").val(d_namaUser_asal);
        $(".modal-body #d_idUser_asal").val(d_idUser_asal);
        $(".modal-body #d_idPerusahaan_asal").val(d_idPerusahaan_asal);
        $(".modal-body #d_ASAL_PRS_namaPerusahaan").val(d_ASAL_PRS_namaPerusahaan);
    });

    $(document).on("click", ".modalApprove", function () {
        var a_idPengajuan = $(this).data('a_id');
        var a_idEstafet = $(this).data('a_idest');
        var a_namaJudul = $(this).data('a_jdl');
        var a_namaUser_asal = $(this).data('a_nama_asal');
        var a_idUser_asal = $(this).data('a_iduser_asal');
        var a_idPerusahaan_asal = $(this).data('a_idperusahaan');
        var a_ASAL_PRS_namaPerusahaan = $(this).data('a_namaprs');
        $(".modal-body #a_idPengajuan").val(a_idPengajuan);
        $(".modal-body #a_idEstafet").val(a_idEstafet);
        $(".modal-body #a_namaJudul").val(a_namaJudul);
        $(".modal-body #a_namaUser_asal").val(a_namaUser_asal);
        $(".modal-body #a_idUser_asal").val(a_idUser_asal);
        $(".modal-body #a_idPerusahaan_asal").val(a_idPerusahaan_asal);
        $(".modal-body #a_ASAL_PRS_namaPerusahaan").val(a_ASAL_PRS_namaPerusahaan);
    });

	$(document).on("click", ".modalDelete", function () {
		var h_idPengajuan = $(this).data('h_id');
		var h_namaJudul = $(this).data('h_jdl');
		$(".modal-body #h_idPengajuan").val(h_idPengajuan);
		$(".modal-body #h_namaJudul").val(h_namaJudul);
	});

	$(document).on("click", ".modalKetTolak", function () {
		var t_idPengajuan = $(this).data('t_id');
		var t_namaJudul = $(this).data('t_jdl');
		var t_tolak_ktr = $(this).data('t_ket');
		var t_TLK_namaUser = $(this).data('t_user');
		$(".modal-body #t_idPengajuan").val(t_idPengajuan);
		$(".modal-body #t_namaJudul").val(t_namaJudul);
		$(".modal-body #t_tolak_ktr").html(t_tolak_ktr);
		$(".modal-body #t_TLK_namaUser").val(t_TLK_namaUser);
	});

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');
</script>
