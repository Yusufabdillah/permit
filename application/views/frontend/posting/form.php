<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */
?>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-archive"></i> Posting Pengajuan
            </h1>
        </div>
    </div>
<?php
$this->load->view('tmp_frontend/breadcrumb');
?>
    <div class="row animation-fadeInQuick">
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <?php
                    if (isset($get_pengajuan)) {
                        if (!empty($get_pengajuan->ktrDecline_estafet)) {
                            ?>
                            <div class="block-options pull-right">
                                <a href="#modalKetDecline" data-toggle="modal" class="btn btn-alt btn-sm btn-warning"><i class="fa fa-info-circle"></i> Informasi Penolakan</a>
                            </div>
                            <?php
                            $this->load->view('frontend/posting/modalKetDecline');
                        }
                    }
                    ?>
                    <h2><strong>Form</strong> Posting Pengajuan</h2>
                </div>
                <form enctype="multipart/form-data" id="formPosting" action="<?= site_url('F_Posting/postingPengajuan'); ?>" method="post" class="form-horizontal">
                    <textarea style="display: none" class="form-control" name="geocoderDokumen" id="AJAX_geocoderDokumen"></textarea>
                    <input type="hidden" name="idPengajuan" value="<?= isset($get_pengajuan) ? $get_pengajuan->idPengajuan : null; ?>">
                    <input type="hidden" name="singkatanPerusahaan" value="<?= isset($get_pengajuan) ? $get_pengajuan->singkatanPerusahaan : null; ?>">
                    <input type="hidden" name="approve_createdby" value="<?= isset($get_pengajuan) ? $get_pengajuan->approve_createdby : null; ?>">
                    <input type="hidden" name="draft_createdby" value="<?= isset($get_pengajuan) ? $get_pengajuan->draft_createdby : null; ?>">
                    <div class="row container-fluid">
                        <label>Wilayah Dokumen</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Negara</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaNegara : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Provinsi</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaProvinsi : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Kota</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaKota : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Kecamatan</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaKecamatan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Kelurahan</label>
                                    <input readonly type="hidden" name="idKelurahan" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->idKelurahan : null; ?>"/>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaKelurahan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Site</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Perusahaan</label>
                                    <input readonly type="hidden" name="idPerusahaan" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->idPerusahaan : null; ?>"/>
                                    <input readonly type="text" name="namaPerusahaan" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaPerusahaan." di ".$get_pengajuan->PRS_namaKecamatan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Instansi</label>
                                    <input readonly type="hidden" name="idInstansi" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->idInstansi : null; ?>"/>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaInstansi." di ".$get_pengajuan->INS_namaKota : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Tipe Dokumen</label>
                                    <input readonly type="hidden" name="idTipe" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->idTipe : null; ?>"/>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaTipe : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="AJAX_kpl_instansiPengajuan">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Kepala Instansi</label>
                                    <input type="text" name="kpl_instansiDokumen" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->kpl_instansiPengajuan : null; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Jabatan Kepala Instansi</label>
                                    <input name="jbt_kpl_instansiDokumen" type="text" class="form-control input-sm" placeholder="..."
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->jbt_kpl_insPengajuan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Klasifikasi Dokumen</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Aspek</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaAspek : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Kategori</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaKategori : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Sub Kategori</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaSubk : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Sub Sub Kategori</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaSub_subk : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Klasifikasi</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaKlasifikasi : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Judul Dokumen</label>
                                    <input readonly type="hidden" name="idJudul" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->idJudul : null; ?>"/>
                                    <input readonly type="text" name="namaJudul" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->namaJudul : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan Judul Dokumen</label>
                                    <input readonly type="text" name="desk_judulDokumen" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->desk_judulPengajuan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Nomor Dokumen</label>
                                    <input type="text" name="nomorDokumen" class="form-control input-sm"
                                           value="<?= isset($get_pengajuan) ? $get_pengajuan->nomorPengajuan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Deskripsi Dokumen</label>
                                    <textarea name="deskripsiDokumen" class="form-control"><?= isset($get_pengajuan) ? $get_pengajuan->deskripsiPengajuan : null; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Dokumen Pendukung</label>
                    </div>
                    <div id="AJAX_rekom_syaratJudul"></div>
                    <div class="row" id="AJAX_referensiPersyaratan">
                        <div class="col-md-6 animation-fadeInQuick">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $referensi = array(
                                        'label' => 'Referensi Persyaratan',
                                        'name' => 'persyaratanPengajuan',
                                        'id' => 'AJAX_idReferensi',
                                        'help' => 'Mohon pilih dokumen pendukung dan status OSS.'
                                    );
                                    ?>
                                    <label class="control-label"><?= $referensi['label']; ?></label>
                                    <table class="table table-striped">
                                        <?php
                                        foreach ($get_referensi as $data) {
                                            ?>
                                            <tr>
                                                <td width="85%">
                                                    <?= $data->namaPersyaratan; ?>
                                                </td>
                                                <td width="*">
                                                    <?php
                                                    if (array_search($data->idReferensi ,$get_persyaratan_pengajuan) !== false) {
                                                        ?>
                                                        <i class="fa fa-2x fa-check-circle-o text-success"></i>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <i class="fa fa-2x fa-times-circle text-danger"></i>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animation-fadeInQuick">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $OSS = array(
                                        'label' => '&nbsp;',
                                        'name' => 'statusOSSPengajuan'
                                    );
                                    ?>
                                    <label class="control-label"><?= $OSS['label']; ?></label>
                                    <table class="table table-striped">
                                        <tr>
                                            <td width="85%">
                                                Online Single Submission
                                            </td>
                                            <td width="*">
                                                <?php
                                                if ($get_pengajuan->statusOSSPengajuan == true) {
                                                    ?>
                                                    <i class="fa fa-2x fa-check-circle-o text-success"></i>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <i class="fa fa-2x fa-times-circle text-danger"></i>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row container-fluid">
                        <label>Perkiraan Biaya</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <?php
                                    $biayaPengajuan = array(
                                        'label' => 'Biaya',
                                        'name' => 'biayaPengajuan',
                                        'placeholder' => '...',
                                        'help' => 'Mohon masukkan biaya dengan format angka'
                                    );
                                    ?>
                                    <label class="control-label"><?= $biayaPengajuan['label']; ?></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><?= isset($get_pengajuan) ? $get_pengajuan->idCurrency : '...'; ?></span>
                                        <input readonly type="number"
                                               class="form-control input-sm"
                                               placeholder="<?= $biayaPengajuan['placeholder']; ?>"
                                               value="<?= isset($get_pengajuan) ? $get_pengajuan->biayaPengajuan : null; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="AJAX_Konversi">
                            <?php
                            $data_currency = json_decode($get_pengajuan->kurs_biayaPengajuan);
                            ?>
                            <textarea style="display: none"
                                      name="kurs_biayaPengajuan"><?= $get_pengajuan->kurs_biayaPengajuan; ?></textarea>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Mata Uang</th>
                                    <th>Konversi dari IDR</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data_currency as $key => $data) {
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?= number_format($data,4,',','.'); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-actions">
                                <div class="col-md-offset-9 col-md-3 btn-group">
                                    <a href="<?= site_url('F_Posting/index'); ?>" class="btn btn-sm btn-warning"><i
                                                class="fa fa-reply"></i> Kembali</a>
                                    <?php
                                    if ($get_pengajuan->tombol_estafetPengajuan == true) {
                                        ?>
                                        <a href="#modalEstafet" data-toggle="modal" class="modalDecline btn btn-sm btn-info">
                                            <i class="fa fa-send"></i> Estafet
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <a href="#modalPosting" data-toggle="modal" class="btn btn-sm btn-success">
                                        <i class="fa fa-save"></i> Simpan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->load->view('frontend/posting/modalPosting');
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php
$daerah['Negara'] = $get_pengajuan->namaNegara;
$daerah['Provinsi'] = $get_pengajuan->namaProvinsi;
$daerah['Kota'] = $get_pengajuan->namaKota;
$daerah['Kecamatan'] = $get_pengajuan->namaKecamatan;
$daerah['Kelurahan'] = $get_pengajuan->namaKelurahan;
$this->load->view('frontend/posting/JSHereGeoCoder', $daerah);
$this->load->view('frontend/posting/AJAX');
$this->load->view('frontend/posting/JSValidasi');
if ($get_pengajuan->tombol_estafetPengajuan == true) {
    $GET_Pengajuan['get_pengajuan'] = $get_pengajuan;
    $GET_Pengajuan['get_negara'] = $get_negara;
    $this->load->view('frontend/posting/modalEstafet', $GET_Pengajuan);
}

