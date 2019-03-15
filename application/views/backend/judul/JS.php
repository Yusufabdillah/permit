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
        var d_idJudul = $(this).data('d_id');
        var d_namaJudul = $(this).data('d_nama');
        $(".modal-body #d_idJudul").val(d_idJudul);
        $(".modal-body #d_namaJudul").val(d_namaJudul);
    });
</script>
