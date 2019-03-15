<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 04/03/2019
 * Time: 11.18
 */
?>
<script type="text/javascript">
	function JSAJAXSearch() {

		var idPerusahaan = $('#AJAX_idPerusahaan').val();
		var casenumberDokumen = $('#AJAX_casenumberDokumen').val();
		var judulDokumen = $('#AJAX_judulDokumen').val();

		$.ajax({
			type: 'POST',
			url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
			data:
				{
					'fungsi':'indexSearch',
					'judulDokumen': judulDokumen,
					'casenumberDokumen': casenumberDokumen,
					'idPerusahaan': idPerusahaan
				},
			success: function (html) {
				$('#AJAX_get_dokumen').html(html);
			}
		});
	}
</script>
