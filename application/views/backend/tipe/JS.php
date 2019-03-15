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
        var d_idTipe = $(this).data('d_id');
        var d_namaTipe = $(this).data('d_nama');
        $(".modal-body #d_idTipe").val(d_idTipe);
        $(".modal-body #d_namaTipe").val(d_namaTipe);
    });
</script>
