<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<style>
    .pengaturanSwal{
        padding: 2rem !important;
        font-size: 15px;
    }
</style>
<script>
    $('#txtbulan').on('change', function() {
        var Tahun = $('#txttahun').val();
        const Toast = Swal.mixin({
            showConfirmButton: false,
            timer: 800,
            customClass: 'pengaturanSwal'
        });
        if (Tahun == '') {    
            Toast.fire({
                type: 'info',
                title: 'Tahun Harus Diisi!'
            });
        }
    });
    
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        // alert(page_num);
        judul = $('#txtjuduldokumen').val();
        casenumber = $("#txtcasenumber").val();
        lokasi = $("#txtlokasi").val();
        bulan = $("#txtbulan").val();
        tahun = $("#txttahun").val();

        $(document).ajaxStart(function () {
            $('.loading').show();
        })
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>F_MonitoringDokumen/ajaxDataDocument/' + page_num,
            data:
                {
                    'page': page_num,
                    'judul': judul,
                    'casenumber': casenumber,
                    'lokasi': lokasi,
                    'bulan': bulan,
                    'tahun': tahun

                },
            success: function (html) {
                $('#AJAX_Tabel').html(html);
                $('.loading').fadeOut("slow");
            }
        });
        $(document).ajaxStop(function () {
            $('.loading').text();
        })
    }
</script>
