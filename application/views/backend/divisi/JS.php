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
        var d_idDivisi = $(this).data('d_id');
        var d_namaDivisi = $(this).data('d_nama');
        $(".modal-body #d_idDivisi").val(d_idDivisi);
        $(".modal-body #d_namaDivisi").val(d_namaDivisi);
    });
</script>
