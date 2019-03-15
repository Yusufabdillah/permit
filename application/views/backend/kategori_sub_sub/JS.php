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
        var d_idSub_subk = $(this).data('d_id');
        var d_namaSub_subk = $(this).data('d_nama');
        $(".modal-body #d_idSub_subk").val(d_idSub_subk);
        $(".modal-body #d_namaSub_subk").val(d_namaSub_subk);
    });
</script>
