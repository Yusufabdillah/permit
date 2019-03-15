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
        var d_idPersyaratan = $(this).data('d_id');
        var d_namaPersyaratan = $(this).data('d_nama');
        $(".modal-body #d_idPersyaratan").val(d_idPersyaratan);
        $(".modal-body #d_namaPersyaratan").val(d_namaPersyaratan);
    });
</script>
