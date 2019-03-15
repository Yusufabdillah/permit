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
        var d_idReferensi = $(this).data('d_id');
        var d_idJudul = $(this).data('d_idjudul');
        var d_deskripsiReferensi = $(this).data('d_deskripsi');
        $(".modal-body #d_idReferensi").val(d_idReferensi);
        $(".modal-body #d_idJudul").val(d_idJudul);
        $(".modal-body #d_deskripsiReferensi").val(d_deskripsiReferensi);
    });
</script>
