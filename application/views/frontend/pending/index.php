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
                <i class="fa fa-hand-stop-o"></i> Pending Pengajuan
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
    <div class="row animation-fadeInQuick">
        <?php
        if ($http_kode == '401') {
            ?>
            <div class="col-md-12">
                <div class="block full">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-ban"></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Akses API anda di blokir</h2><br>
                            <small>Silahkan hubungi sistem administator...</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else if ($http_kode !== '401') {
            ?>
            <div class="col-md-12">
                <div class="block full">
                    <div class="block-title">
                        <h2><strong>Daftar</strong> Pengajuan Pending</h2>
                    </div>
                    <ul class="task-list">
                        <?php
                        if (empty($get_pengajuan)) {
                            ?>
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fa fa-5x fa-info-circle"></i>
                                </div>
                                <div class="col-md-11">
                                    <h2>Data Kosong</h2><br>
                                    <small>Belum ada data submit dari officer...</small>
                                </div>
                            </div>
                            <?php
                        } else if (!empty($get_pengajuan)) {
                            foreach ($get_pengajuan as $data) {
                                ?>
                                <li>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img height="150px"
                                                 src="<?= site_url('assets/img/aspek/' . imgAspek($data->idAspek)); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Judul Dokumen</label><a href="javascript:;"
                                                                               onclick="tampil_panduan_penjelasan()"><i
                                                            class="fa fa-question-circle-o "
                                                            style="padding-left: 10px;font-size: 20px"></i></a>
                                                <p style="text-align: justify">
                                                    <?= $data->namaJudul . ' (' . $data->desk_judulPengajuan . ')'; ?>
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Klasifikasi Dokumen</label><a href="javascript:;"
                                                                                     onclick="tampil_panduan_penjelasan()"><i
                                                            class="fa fa-question-circle-o "
                                                            style="padding-left: 10px;font-size: 20px"></i></a>
                                                <p style="text-align: justify">
                                                    <?= $data->namaKlasifikasi; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Instansi</label><a href="javascript:;"
                                                                          onclick="tampil_panduan_penjelasan()"><i
                                                            class="fa fa-question-circle-o "
                                                            style="padding-left: 10px;font-size: 20px"></i></a>
                                                <p style="text-align: justify">
                                                    <?= $data->namaInstansi; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn-group pull-right">
                                            <a class="btn btn-md btn-primary"
                                               href="<?= site_url('F_Pending/form/' . encode_str($data->idPengajuan)); ?>"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            <a
                                                    data-ak_id="<?= $data->idPengajuan; ?>"
                                                    data-ak_jdl="<?= $data->namaJudul; ?>"
                                                    data-ak_approve="<?= $data->approve_createdby; ?>"

                                                    data-toggle="modal" class="modalAktif btn btn-md btn-success"
                                                    href="#modalAktif"><i class="fa fa-check-circle-o"></i> Aktifkan
                                                Pengajuan</a>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
<?php
$this->load->view('frontend/pending/JS');
$this->load->view('frontend/pending/modalAktif');
