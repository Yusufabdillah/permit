<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 11/03/2019
 * Time: 15.03
 */
?>
<li class="dropdown-header text-center">Notifikasi</li>
<?php
if (empty($get_notifikasi)) {
?>
	<li>
		<h4 style="text-align: center">
			<i class="fa fa-info-circle"></i> Empty Notification...
		</h4>
	</li>
<?php
} else if (!empty($get_notifikasi)) {
	foreach ($get_notifikasi as $data) {
		?>
		<li style="width: 300px;">
			<form method="post" action="<?= site_url('F_Notifikasi/updateNotifikasi'); ?>">
				<input type="hidden" name="idNotif" value="<?= $data->idNotif; ?>">
				<input type="hidden" name="idKode" value="<?= $data->idKode; ?>">
				<input type="hidden" name="idUser" value="<?= $data->idUser; ?>">
				<input type="hidden" name="idPengajuan" value="<?= $data->idPengajuan; ?>">
				<input type="hidden" name="__CLASS" value="<?= $__CLASS; ?>">
				<input type="hidden" name="__METHOD" value="<?= $__METHOD; ?>">
				<input type="hidden" name="__PARAM_1" value="<?= $__PARAM_1; ?>">
				<input type="hidden" name="__PARAM_2" value="<?= $__PARAM_2; ?>">
				<input type="hidden" name="statusRedirect" value="<?= $data->statusRedirect; ?>">
				<input type="hidden" name="controllerKode" value="<?= $data->controllerKode; ?>">
				<input type="hidden" name="methodKode" value="<?= $data->methodKode; ?>">
				<button class="btn btn-block" type="submit" style="padding: 0px;">
					<div class="alert alert-alt">
						<small class="pull-right"><?= formatDateTime($data->tanggalNotif, "WIB"); ?>  <i style="color: black" class="fa fa-clock-o"></i></small><br>
						<small class="pull-right"><?= $data->namaJudul; ?>  <i class="<?= $data->iconKode; ?> text-<?= $data->tipeKode; ?>"></i></small><br>
						<div class="pull-left text-<?= $data->tipeKode; ?>">
							<?= $data->deskripsiKode; ?>
						</div>
						<hr>
					</div>
				</button>
			</form>
		</li>
		<?php
	}
	?>
<?php
}

