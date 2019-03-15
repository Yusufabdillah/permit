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
        var d_idAspek = $(this).data('d_id');
        var d_namaAspek = $(this).data('d_nama');
        $(".modal-body #d_idAspek").val(d_idAspek);
        $(".modal-body #d_namaAspek").val(d_namaAspek);
    });
</script>
