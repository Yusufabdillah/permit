<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/02/2019
 * Time: 10:17
 */

$Flash = $this->session->flashdata('NOTIFY');
$EXP = explode("/", $Flash);
$NOTIFY_TYPE = $EXP[0];

if ($NOTIFY_TYPE == "Approve") {
    $PESAN = $EXP[1];
    $TIPE = 'success';
    $WAKTU = 3000;
    $POSITION = 'top-end';
}
if ($NOTIFY_TYPE == "Decline") {
    $PESAN = $EXP[1];
    $TIPE = 'success';
    $WAKTU = 3000;
    $POSITION = 'top-end';
}
if ($NOTIFY_TYPE == "Batal") {
    $PESAN = $EXP[1];
    $TIPE = 'success';
    $WAKTU = 3000;
    $POSITION = 'top-end';
}
if ($NOTIFY_TYPE == "Gagal") {
    $PESAN = 'Data gagal diolah';
    $TIPE = 'error';
    $WAKTU = 3000;
    $POSITION = 'top-end';
}


if (isset($Flash)) {
    ?>
    <style>
        .pengaturanSwal{
            padding: 2rem !important;
            font-size: 15px;
        }
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: '<?= $POSITION; ?>',
            showConfirmButton: false,
            timer: <?= $WAKTU; ?>,
            customClass: 'pengaturanSwal'
        });
        Toast.fire({
            type: '<?= $TIPE; ?>',
            title: '<?= $PESAN; ?>'
        });
    </script>
    <?php
}
