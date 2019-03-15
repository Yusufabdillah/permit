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
            <i class="fa fa-hourglass"></i> History Pengajuan
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuick">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Form</strong> Pengajuan</h2>
            </div>
            <form class="form-horizontal">
                <div class="row container-fluid">
                    <label>Wilayah Dokumen</label>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Negara</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_negara) ? $get_negara : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Provinsi</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_provinsi) ? $get_provinsi : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Kota</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_kota) ? $get_kota : null; ?>"/>
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
                                       value="<?= isset($get_kecamatan) ? $get_kecamatan : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Kelurahan</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_kelurahan) ? $get_kelurahan : null; ?>"/>
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
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_perusahaan) ? $get_perusahaan : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Instansi</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_instansi) ? $get_instansi : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Tipe Dokumen</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_tipe) ? $get_tipe : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" id="AJAX_kpl_instansiPengajuan">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Kepala Instansi</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_pengajuan) ? $get_pengajuan->kpl_instansiPengajuan : null; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Jabatan Kepala Instansi</label>
                                <input readonly type="text" class="form-control input-sm" placeholder="..."
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
                                       value="<?= isset($get_aspek) ? $get_aspek : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Kategori</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_kategori) ? $get_kategori : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Sub Kategori</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_subk) ? $get_subk : null; ?>"/>
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
                                       value="<?= isset($get_sub_subk) ? $get_sub_subk : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Klasifikasi</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_klasifikasi) ? $get_klasifikasi : null; ?>"/>
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
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_judul) ? $get_judul : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Keterangan Judul Dokumen</label>
                                <input readonly type="text" class="form-control input-sm"
                                       value="<?= isset($get_pengajuan) ? $get_pengajuan->desk_judulPengajuan : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label">Nomor Dokumen</label>
                                <input readonly type="text" class="form-control input-sm"
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
                                <textarea readonly
                                          class="form-control"><?= isset($get_pengajuan) ? $get_pengajuan->deskripsiPengajuan : null; ?></textarea>
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
                                                if (array_search($data->idReferensi, $get_persyaratan_pengajuan) !== false) {
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
                                    <td><?= number_format($data, 4, ',', '.'); ?></td>
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
                            <div class="col-md-offset-10 col-md-2 btn-group">
                                <a href="<?= site_url('F_MonitoringProgres/detail/'.encode_str($get_idPengajuan)); ?>" class="btn btn-block btn-sm btn-warning"><i
                                            class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
