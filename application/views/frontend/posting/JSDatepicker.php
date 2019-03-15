<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 12:24
 */
?>
<script type="text/javascript">
    $('.input-datepicker, .input-daterange')
        .datepicker({weekStart: 1});
    $('.input-datepicker-close')
        .datepicker({weekStart: 1})
        .on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    $('#tglSelesaiBerlaku').on("changeDate", function () {
        var tanggalMulai = new Date($('#tglMulaiBerlaku').val());
        var tanggalSelesai = new Date($('#tglSelesaiBerlaku').val());
        var hari = 24 * 60 * 60 * 1000;
        var mulai = tanggalMulai.getTime();
        var selesai = tanggalSelesai.getTime();
        var total_hari = Math.round(Math.round((selesai - mulai) / hari));
        $("#hasilTglBerlaku").val(total_hari);
        $("#tglRentangReminder").val($('#tglMulaiBerlaku').val());
    });

    $('#mulaiReminder').on("changeDate", function () {
        var tanggalMulai = new Date($('#tglRentangReminder').val());
        var tanggalSelesai = new Date($('#mulaiReminder').val());
        var hari = 24 * 60 * 60 * 1000;
        var mulai = tanggalMulai.getTime();
        var selesai = tanggalSelesai.getTime();
        var total_hari = Math.round(Math.round((selesai - mulai) / hari));
        $("#hasilTglReminder").val(total_hari);
    });
</script>
