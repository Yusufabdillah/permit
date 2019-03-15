<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/03/2019
 * Time: 13.50
 */

if ($status == 'aktif') {
	?>
	<div class="form-group animation-fadeInQuickInv">
		<div class="col-md-12">
			<?php
			$notif = array(
				'label' => 'Kirim Notifikasi Estafet Ke',
				'name' => 'Notif_idUser[]',
				'class' => 'Notif_idUser',
				'placeholder' => 'Pilih Pengguna',
				'help' => 'Mohon pilih pengguna'
			);
			?>
			<label class="control-label"><?= $notif['label']; ?></label><br>
			<select required multiple="multiple" id="<?= $notif['name']; ?>" name="<?= $notif['name']; ?>"
					class="<?= $notif['class']; ?>"
					data-placeholder="<?= $notif['placeholder']; ?>"
					style="width: 100%;">
				<?php
				foreach ($get_koordinator as $KEY => $data) {
					?>
					<option
						value="<?= $data->idUser; ?>"><?= $data->namaUser . ', ' . $data->namaPerusahaan . ' di ' . $data->lokasiPerusahaan; ?></option>
					<?php
				}
				//====================================
				?>
			</select>
			<span class="help-block">
			<?= $notif['help']; ?>
			<a href="javascript:;" id="helpForm" data-help="Notifikasi">
	            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
	        </a>
		</span>
		</div>
	</div>
	<script type="text/javascript">
		$('.Notif_idUser').select2({allowClear: true});
	</script>
	<?php
} else if ($status == 'tidak_aktif') {
?>
	<div class="col-md-12">
		<hr>
		<h5 class="text-center text-warning animation-fadeInQuickInv">
			<i class="fa fa-info-circle"></i> Set notifikasi akan aktif bila status estafet di aktifkan
		</h5>
		<hr>
	</div>
<?php
}
