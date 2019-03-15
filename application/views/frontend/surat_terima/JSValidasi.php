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
    $("#submit").click(function(){
        $('#modalSubmit').modal('hide');
        $('#formSuratterima').validate({
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
                indeksST: {
                    required: true
                },
                fileST: {
                    required: true
                },
                deskripsiST: {
                    required: true
                },
                ktrST: {
                    required: true
                }
            },
            messages: {
                indeksST: {
                    required: 'Form ini wajib diisi'
                },
                fileST: {
                    required: 'Form ini wajib diisi'
                },
                deskripsiST: {
                    required: 'Form ini wajib diisi'
                },
                ktrST: {
                    required: 'Form ini wajib diisi'
                }
            }
        });
    });
});
</script>
