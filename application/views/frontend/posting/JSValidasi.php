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
    $("#posting").click(function() {
        $('#modalPosting').modal('hide');
        $('#formPosting').validate({
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
                kpl_instansiDokumen: {
                    required: true
                },
                jbt_kpl_insDokumen: {
                    required: true
                },
                nomorDokumen: {
                    required: true
                },
                deskripsiDokumen: {
                    required: true
                },
                fileDokumen: {
                    required: true
                }
            },
            messages: {
                kpl_instansiDokumen: {
                    required: 'Form ini wajib diisi'
                },
                jbt_kpl_insDokumen: {
                    required: 'Form ini wajib diisi'
                },
                nomorDokumen: {
                    required: 'Form ini wajib diisi'
                },
                deskripsiDokumen: {
                    required: 'Form ini wajib diisi'
                },
                fileDokumen: {
                    required: 'Form ini wajib diisi'
                }
            }
        });
    });
});
</script>
