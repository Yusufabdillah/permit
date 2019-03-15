<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 14:56
 */

$this->load->view('frontend/surat_terima/JSCKEditor');
?>
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-clipboard"></i> Surat Terima
            </h1>
        </div>
    </div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
    <div class="row animation-fadeInQuick">
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <h2><strong>Form</strong> Surat Terima</h2>
                </div>
                <form enctype="multipart/form-data" id="formSuratterima" action="<?php echo base_url('F_Suratterima/saveSuratterima'); ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="idST" value="<?= $get_suratterima->idST; ?>">
                    <input type="hidden" name="namaJudul" value="<?= $get_suratterima->namaJudul; ?>">
                    <input type="hidden" name="approve_createdby" value="<?= $get_suratterima->approve_createdby; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Indeks</label>
                                    <input type="text" name="indeksST"
                                           class="form-control input-sm"
                                           placeholder="Masukkan indeks surat terima"
                                           value="<?= isset($get_suratterima) ? $get_suratterima->indeksST : null; ?>"/>
                                    <span class="help-block">
                                        Masukkan dengan format nomor indeks surat
                                        <a href="javascript:;" id="helpForm" data-help="Indeks Disposisi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Nomor Pengajuan</label>
                                    <input readonly type="text" class="form-control input-sm"
                                           value="<?= isset($get_suratterima) ? $get_suratterima->nomorPengajuan : null; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Keterangan</label>
                                    <textarea name="ktrST" class="ckeditor"><?= isset($get_suratterima) ? $get_suratterima->ktrST : null; ?></textarea>
                                    <span class="help-block">
                                        Masukkan dengan format keterangan surat terima
                                        <a href="javascript:;" id="helpForm" data-help="Keterangan Disposisi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Deskripsi</label>
                                    <textarea name="deskripsiST" class="ckeditor"><?= isset($get_suratterima) ? $get_suratterima->deskripsiST : null; ?></textarea>
                                    <span class="help-block">
                                        Masukkan dengan format deskripsi surat terima
                                        <a href="javascript:;" id="helpForm" data-help="Deskripsi Disposisi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">File Surat Terima</label>
                                    <input type="file" name="fileST" class="form-control input-sm"/>
                                    <span class="help-block">
                                        File berformat .pdf atau .doc
                                        <a href="javascript:;" id="helpForm" data-help="File Disposisi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($get_suratterima->fileST)) {
                                ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">Download</label>
                                    <a href="<?= site_url("assets/data_uploads/(".$get_suratterima->idPerusahaan.")".$get_suratterima->singkatanPerusahaan."/Surat_Terima/".$get_suratterima->fileST) ?>" class="btn btn-link">
                                        <i class="fa fa-download"></i> <?= $get_suratterima->fileST; ?>
                                    </a>
                                    <span class="help-block">
                                        Klik nama judul untuk download.
                                        <a href="javascript:;" id="helpForm" data-help="Download File Disposisi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                                <?php
                            } else if (!isset($get_suratterima->fileST)) {
                                ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>&nbsp;</label>
                                  <h4 class="text-center text-warning"><i class="fa fa-info-circle"></i> File belum tersedia</h4>
                                </div>
                            </div>
                                <?php
                            }
                                ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-actions">
                                <div class="col-md-offset-9 col-md-3 btn-group">
                                    <a href="<?= site_url('F_Suratterima/index'); ?>" class="btn btn-sm btn-warning"><i
                                                class="fa fa-reply"></i> Kembali</a>
                                    <button type="button" data-toggle="modal" data-target="#modalSubmit"
                                            class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('frontend/surat_terima/modalSubmit'); ?>
                </form>
            </div>
        </div>
    </div>
<?php
$this->load->view('frontend/surat_terima/JSValidasi');