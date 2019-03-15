<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
   $(document).on("click", ".modalPending", function () {
        var p_idPengajuan = $(this).data('p_id');
        var p_namaJudul = $(this).data('p_jdl');
        var p_approve_createdby = $(this).data('p_approve');
        $(".modal-body #p_idPengajuan").val(p_idPengajuan);
        $(".modal-body #p_namaJudul").val(p_namaJudul);
        $(".modal-body #p_approve_createdby").val(p_approve_createdby);
    });
</script>
