<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 04/03/2019
 * Time: 11.42
 */

if ($get_dokumen->status !== 'empty') {
	foreach ($get_dokumen->data as $Key => $data) {
		$cek = !empty($get_cek_perpanjangan) ? array_search($data->idDokumen, $get_cek_perpanjangan) : null;
		?>
		<tr>
			<td style="text-align: center"><?= $Key + 1; ?></td>
			<td style="text-align: center">
				<?php
				if (empty($cek)) {
					?>
					<a class="btn btn-md btn-primary"
					   href="<?= site_url('F_Perpanjangan/form/' . encode_str($data->idDokumen)); ?>">
						<i class="fa fa-edit"></i>
					</a>
					<?php
				} else if (!empty($cek)) {
					?>
					<i class="fa fa-2x fa-check-circle-o text-success"></i>
					<?php
				}
				?>
			</td>
			<td><?= $data->casenumberDokumen ?></td>
			<td><?= $data->namaJudul . ' (' . $data->desk_judulDokumen . ')'; ?></td>
			<td><?= $data->namaPerusahaan . ' - ' . $data->lokasiPerusahaan ?></td>
			<td><?= $data->namaInstansi ?></td>
			<td><?= $data->namaKlasifikasi ?></td>
			<td><?= isset($data->tgl_mulai_berlakuDokumen) ? formatTanggal('-', $data->tgl_mulai_berlakuDokumen, true) : null ?></td>
			<td><?= isset($data->tgl_habis_berlakuDokumen) ? formatTanggal('-', $data->tgl_habis_berlakuDokumen, true) : null ?></td>
			<td><?= $data->rentang_hari_berlakuDokumen ?></td>
		</tr>
		<?php
	}
} else if ($get_dokumen->status == 'empty') {
	?>
	<tr>
		<td style="text-align: center" colspan="10">Data Kosong</td>
	</tr>
	<?php
}
