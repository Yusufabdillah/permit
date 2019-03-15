<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 08/03/2019
 * Time: 15.54
 */
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#TRIGGER_estafetNotif').change(function () {
			if (this.checked) {
				//var data = $("#AJAX_exp_selamanyaDokumen").val();
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class() . '/AJAX')?>",
					data: {
						'fungsi': 'toEstafetNotif',
						'status': 'aktif'
					},
					success: function (msg) {
						$('#AJAX_estafetNotif').html(msg);
					}
				});
			} else if (!this.checked) {
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class() . '/AJAX')?>",
					data: {
						'fungsi': 'toEstafetNotif',
						'status': 'tidak_aktif'
					},
					success: function (msg) {
						$('#AJAX_estafetNotif').html(msg);
					}
				});
			}
		});
	});
</script>
