<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 9:16
 */
?>
<script type="text/javascript">
   
$(document).ready(function(){
    $('#tglSelesai').on("changeDate", function() {
        var tanggalMulai = new Date($('#tglMulai').val());
        var tanggalSelesai = new Date($('#tglSelesai').val());
        var hari = 24*60*60*1000;
        var mulai = tanggalMulai.getTime();
        var selesai = tanggalSelesai.getTime();
        var total_hari = Math.round(Math.round((selesai-mulai) / hari));
        $("#hasilTgl").val(total_hari);
    });

    $('#form_modalApprove').validate({
        errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function(error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function(e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            //e.closest('.form-group').removeClass('has-success has-error');
            e.closest('.help-block').remove();
        },
        rules: {
            tgl_mulaiPengajuan: {
                required: true
            },
            tgl_selesaiPengajuan: {
                required: true
            },
            waktu_pengurusanPengajuan: {
                required: true
            },
            idUser: {
                required: true
            }
        },
        messages: {
            tgl_mulaiPengajuan: {
                required: 'Form ini wajib diisi'
            },
            tgl_selesaiPengajuan: {
                required: 'Form ini wajib diisi'
            },
            waktu_pengurusanPengajuan: {
                required: 'Form ini wajib diisi'
            },
            idUser: {
                required: 'Form ini wajib diisi'
            }
        }
    });
});
</script>
