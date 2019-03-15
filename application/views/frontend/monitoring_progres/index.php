<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 9:51
 */
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-percent"></i> Progress Pengajuan
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="container-fluid">
    <div class="row animation-fadeInQuickInv">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-title">
                        <h2>List Progres Permit</h2>
                    </div>
                    <ul class="task-list">
                      <?php foreach ($get_data as $get) {?>
                            <li>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="widget" style="box-shadow: 2px 2px 10px #c0c0c0">
                                            <div class="widget-extra themed-background-success">
                                                <h6 class="widget-content-light"><strong>Approval Koordinator
                                                        Permit</strong></h6>
                                            </div>
                                            <div class="widget-extra-full text-center">
                                                    <span class="h4 text-success animation-expandOpen">
                                                        <?php
                                                        if ($get->approve_status == 0 && $get->submit_status==1) {
                                                            ?>
                                                            <i class="fa fa-refresh fa-spin"></i>
                                                            <?php
                                                        }else if($get->approve_status==1){?>
                                                            <strong>Approved </strong><i class="fa fa-check"></i>
                                                            <?php
                                                        }else if($get->srtterima_status==0 && $get->submit_status==0){?>
                                                            <i class="fa fa-ellipsis-h"></i>
                                                            <?php
                                                        }  ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="widget" style="box-shadow: 2px 2px 10px #c0c0c0">
                                            <div class="widget-extra themed-background-success">
                                                <h6 class="widget-content-light"><strong>Receipt Handling</strong></h6>
                                            </div>
                                            <div class="widget-extra-full text-center">
                                                    <span class="h4 text-success animation-expandOpen">
                                                        <?php
                                                        if ($get->srtterima_status == 0 && $get->approve_status==1) {
                                                            ?>
                                                            <i class="fa fa-refresh fa-spin"></i>
                                                            <?php
                                                        }else if($get->srtterima_status==1){?>
                                                            <strong>Completed </strong><i class="fa fa-check"></i>
                                                            <?php
                                                        }else if($get->srtterima_status==0 && $get->approve_status==0){?>
                                                            <i class="fa fa-ellipsis-h"></i>
                                                            <?php
                                                        }  ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($get->srtterima_status == 1 && $get->idEstafet!= null) {?>
                                        <div class="col-sm-3">
                                            <div class="widget" style="box-shadow: 2px 2px 10px #c0c0c0">
                                                <div class="widget-extra themed-background-success">
                                                    <h6 class="widget-content-light"><strong>Status Estafet</strong>
                                                    </h6>
                                                </div>
                                                <div class="widget-extra-full text-center">
                                                    <span class="h4 text-success animation-expandOpen">
														<i class="fa fa-refresh fa-spin"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <div class="col-sm-3">
                                        <div class="widget" style="box-shadow: 2px 2px 10px #c0c0c0">
                                            <div class="widget-extra themed-background-warning">
                                                <h6 class="widget-content-light"><strong>Dokumen Selesai</strong></h6>
                                            </div>
                                            <div class="widget-extra-full text-center">
                                                    <span class="h4 text-warning">
                                                        <?php
                                                        if ($get->dokumen_status == 0 && $get->srtterima_status==1) {
                                                            ?>
                                                            <i class="fa fa-refresh fa-spin"></i>
                                                            <?php
                                                        }else if($get->dokumen_status==1){?>
                                                            <strong>Completed </strong><i class="fa fa-check"></i>
                                                            <?php
                                                        }else if($get->dokumen_status==0 && $get->srtterima_status==0){?>
                                                            <i class="fa fa-ellipsis-h"></i>
                                                            <?php
                                                        }  ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img height="150px" src="<?= site_url('assets/img/aspek/'.imgAspek($get->idAspek)); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Judul Dokumen</label><a href="javascript:;"
                                                                            onclick="tampil_panduan_penjelasan()"><i
                                                        class="fa fa-question-circle-o "
                                                        style="padding-left: 10px;font-size: 20px"></i></a>
                                            <p style="text-align: justify">
                                                <?= $get->namaJudul.' ('.$get->desk_judulPengajuan.')'; ?>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Klasifikasi Dokumen</label>
                                            <a href="javascript:;" onclick="tampil_panduan_penjelasan()"><i
                                                        class="fa fa-question-circle-o "
                                                        style="padding-left: 10px;font-size: 20px"></i></a>
                                            <p style="text-align: justify">
                                               <?= $get->namaKlasifikasi; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Instansi</label><a href="javascript:;"
                                                                    onclick="tampil_panduan_penjelasan()"><i
                                                        class="fa fa-question-circle-o "
                                                        style="padding-left: 10px;font-size: 20px"></i></a><br>
                                            <?= $get->namaInstansi; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Estimated Days</label>
                                            <div class="input-group">
                                                <p style="text-align: justify">
                                                    <?= $get->waktu_pengurusanPengajuan; ?> Days
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right">
                                               <a class="btn btn-md btn-success" href="<?= site_url('F_MonitoringProgres/detail/'.encode_str($get->idPengajuan)); ?>"><i class="fa fa-edit"></i> Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

