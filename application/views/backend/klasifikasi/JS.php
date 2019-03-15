<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 17:00
 */
?>
<script type="text/javascript">
    $(document).on("click", ".modalDelete", function () {
        var d_idKlasifikasi = $(this).data('d_id');
        var d_namaKlasifikasi = $(this).data('d_nama');
        $(".modal-body #d_idKlasifikasi").val(d_idKlasifikasi);
        $(".modal-body #d_namaKlasifikasi").val(d_namaKlasifikasi);
    });
</script>
