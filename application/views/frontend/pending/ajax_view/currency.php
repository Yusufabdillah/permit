<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 07/02/2019
 * Time: 8:58
 */

$data['get_idCurrency'] = $get_instansi->idCurrency;
?>
<input type="hidden" name="idCurrency" id="AJAX_idCurrency" value="<?= $get_instansi->idCurrency; ?>">
<span class="input-group-addon"><?= $get_instansi->idCurrency; ?></span>
<input type="number" id="AJAX_biayaPengajuan"
       name="biayaPengajuan"
       class="form-control input-sm"
       placeholder="Mohon masukkan biaya dengan format angka"/>
<?php
$this->load->view('frontend/pengajuan/AJAX', $data);