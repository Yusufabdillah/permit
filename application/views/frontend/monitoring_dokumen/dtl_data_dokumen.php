<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-database"></i> Dokumen
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuickInv">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Detail</strong> Dokumen</h2>
            </div>
            <form id="formDokumen" class="form-horizontal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $casenumberDokumen = array(
                                    'label' => 'Case Number',
                                    'name' => 'casenumberDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $casenumberDokumen['label']; ?></label>
                                <input autofocus type="text" name="<?= $casenumberDokumen['name']; ?>"
                                       class="form-control input-sm"
                                       readonly
                                       placeholder="<?= $casenumberDokumen['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->casenumberDokumen) ? $get_dokumen->casenumberDokumen : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $judulDokumen = array(
                                    'label' => 'Judul Dokumen',
                                    'name' => 'judulDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $judulDokumen['label']; ?></label>
                                <input autofocus type="text" name="<?= $judulDokumen['name']; ?>"
                                       class="form-control input-sm"
                                       readonly
                                       placeholder="<?= $judulDokumen['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->namaJudul) ? $get_dokumen->namaJudul.' ('.$get_dokumen->desk_judulDokumen.')' : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $nomorDokumen = array(
                                    'label' => 'Nomor Dokumen',
                                    'name' => 'nomorDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $nomorDokumen['label']; ?></label>
                                <input type="text" name="<?= $nomorDokumen['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $nomorDokumen['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->nomorDokumen) ? $get_dokumen->nomorDokumen : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $perusahaan = array(
                                    'label' => 'Perusahaan',
                                    'name' => 'idPerusahan',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $perusahaan['label']; ?></label><br>
                                <input autofocus type="text" name="<?= $perusahaan['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $perusahaan['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->namaPerusahaan) ? $get_dokumen->namaPerusahaan . ' di ' . $get_dokumen->lokasiPerusahaan : null; ?>  "/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $tipe = array(
                                    'label' => 'Tipe Dokumen',
                                    'name' => 'idTipe',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $tipe['label']; ?></label><br>
                                <input type="text" name="<?= $tipe['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $tipe['placeholder']; ?>"
                                       value="<?= isset($get_dokumen) ? $get_dokumen->namaTipe : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $instansi = array(
                                    'label' => 'Instansi',
                                    'name' => 'idInstansi',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $instansi['label']; ?></label><br>
                                <input type="text" name="<?= $instansi['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $instansi['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->namaInstansi) ? $get_dokumen->namaInstansi : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $kpl_instansi = array(
                                    'label' => 'Kepala Instansi',
                                    'name' => 'kpl_instansiDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $kpl_instansi['label']; ?></label>
                                <input type="text" name="<?= $kpl_instansi['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $kpl_instansi['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->kpl_instansiDokumen) ? $get_dokumen->kpl_instansiDokumen : null; ?>"/>
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
                            <?php
                            $aspek = array(
                                'label' => 'Aspek',
                                'name' => 'idAspek',
                                'placeholder' => 'Data Kosong...'
                            );
                            ?>
                            <div class="col-md-12">
                                <label class="control-label"><?= $aspek['label']; ?></label><br>
                                <input type="text" name="<?= $aspek['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $aspek['placeholder']; ?>"
                                       value="<?= isset($get_aspek) ? $get_aspek : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $kategori = array(
                                    'label' => 'Kategori',
                                    'name' => 'idKategori',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $kategori['label']; ?></label><br>
                                <input type="text" name="<?= $kategori['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $kategori['placeholder']; ?>"
                                       value="<?= isset($get_kategori) ? $get_kategori : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $subkategori = array(
                                    'label' => 'Sub Kategori',
                                    'name' => 'idSubk',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $subkategori['label']; ?></label><br>
                                <input type="text" name="<?= $subkategori['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $subkategori['placeholder']; ?>"
                                       value="<?= isset($get_subk) ? $get_subk : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $subsubkategori = array(
                                    'label' => 'Sub Sub Kategori',
                                    'name' => 'idSub_subk',
                                    'id' => 'AJAX_idSub_subk',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $subsubkategori['label']; ?></label><br>
                                <input type="text" name="<?= $subsubkategori['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $subsubkategori['placeholder']; ?>"
                                       value="<?= isset($get_sub_subk) ? $get_sub_subk : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $klasifikasi = array(
                                    'label' => 'Klasifikasi',
                                    'name' => 'idKlasifikasi',
                                    'id' => 'AJAX_idKlasifikasi',
                                    'placeholder' => 'Data Kosong...',
                                );
                                ?>
                                <label class="control-label"><?= $klasifikasi['label']; ?></label><br>
                                <input type="text" name="<?= $klasifikasi['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $klasifikasi['placeholder']; ?>"
                                       value="<?= isset($get_klasifikasi) ? $get_klasifikasi : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $atasnamaDokumen = array(
                                    'label' => 'Kepala Instansi',
                                    'name' => 'kpl_instansiDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $atasnamaDokumen['label']; ?></label><br>
                                <input type="text" name="<?= $atasnamaDokumen['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $atasnamaDokumen['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->kpl_instansiDokumen) ? $get_dokumen->kpl_instansiDokumen : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $an_jabatanDokumen = array(
                                    'label' => 'Jabatan Kepala Instansi',
                                    'name' => 'jbt_kpl_instansiDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $an_jabatanDokumen['label']; ?></label><br>
                                <input type="text" name="<?= $an_jabatanDokumen['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $an_jabatanDokumen['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->jbt_kpl_instansiDokumen) ? $get_dokumen->jbt_kpl_instansiDokumen : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php
                            $negara = array(
                                'label' => 'Negara',
                                'name' => 'idNegara',
                                'placeholder' => 'Data Kosong...'
                            );
                            ?>
                            <div class="col-md-12">
                                <label class="control-label"><?= $negara['label']; ?></label><br>
                                <input type="text" name="<?= $negara['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $negara['placeholder']; ?>"
                                       value="<?= isset($get_dokumen) ? $get_dokumen->namaNegara : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $provinsi = array(
                                    'label' => 'Provinsi',
                                    'name' => 'idProvinsi',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $provinsi['label']; ?></label><br>
                                <input type="text" name="<?= $provinsi['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $provinsi['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->namaProvinsi) ? $get_dokumen->namaProvinsi : null; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $kota = array(
                                    'label' => 'Kota',
                                    'name' => 'idKota',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $kota['label']; ?></label><br>
                                <input type="text" name="<?= $kota['name']; ?>"
                                       class="form-control input-sm"
                                       disabled
                                       placeholder="<?= $kota['placeholder']; ?>"
                                       value="<?= isset($get_dokumen->namaKota) ? $get_dokumen->namaKota : null; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <?php
                                $deskripsiDokumen = array(
                                    'label' => 'Deskripsi Dokumen',
                                    'name' => 'deskripsiDokumen',
                                    'placeholder' => 'Data Kosong...'
                                );
                                ?>
                                <label class="control-label"><?= $deskripsiDokumen['label']; ?></label>
                                <textarea disabled name="<?= $deskripsiDokumen['name']; ?>" class="form-control"
                                          placeholder="<?= $deskripsiDokumen['placeholder']; ?>"><?= isset($get_dokumen) ? $get_dokumen->deskripsiDokumen : null; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($get_dokumen)) {
                    if (isset($get_dokumen->fileDokumen)) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">Download Dokumen</label>
                                        <a href="<?= site_url('assets/data_uploads/('.$get_dokumen->idPerusahaan.')'.$get_dokumen->singkatanPerusahaan.'/Dokumen/'.$get_dokumen->fileDokumen); ?>" class="btn btn-block btn-sm btn-info"><i
                                        class="fa fa-download"></i> Download | <?= $get_dokumen->fileDokumen ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else if (empty($get_dokumen->fileDokumen) OR !isset($get_dokumen->fileDokumen)) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center text-warning">
                                    <i class="fa fa-info-circle"></i> File Dokumen Tidak Tersedia
                                </h3>
                            </div>
                        </div>
                        <?php
                    }
                }
                if (!empty($get_geocoder)) {
                    ?>
                    <hr>
                    <div class="row container-fluid">
                        <label>Wilayah Dokumen</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="map" style="width: 100%; height: 400px; background: grey" />
                        </div>
                    </div>
                    <hr>
                <?php
                }
                ?>
                <div class="row" style="margin-top: 100px">
                    <div class="col-md-12">
                        <div class="form-group form-actions">
                            <div class="col-md-offset-10 col-md-2 btn-group">
                                <a href="<?= site_url('F_MonitoringDokumen/index'); ?>" class="btn btn-block btn-sm btn-warning"><i
                                        class="fa fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (!empty($get_geocoder)) {
    $this->load->view('frontend/monitoring_dokumen/JSHereMarker');
}
