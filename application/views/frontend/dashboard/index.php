<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 14:02
 */
?>
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-home"></i> Dashboard
        </h1>
    </div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<!-- <div class="block full block-alt-noborder">
    <h3 class="sub-header text-center"><strong>Selamat Datang, <?= $_SESSION['namaUser'] ?></strong></h3>
</div> -->
 <div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light"><i class="fa fa-file-text-o fa-fw"></i><strong>DOKUMEN</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><?php echo count($count_dokumen)?></span></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light"><i class="fa fa-send fa-fw"></i> <strong>PENGAJUAN</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><?php echo count($count_pengajuan)?></span></div>
        </div>
    </div>
    <!-- <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light"><i class="fa fa-archive"></i> <strong>Packaging</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-warning"><i class="fa fa-refresh fa-spin"></i></span></div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="widget">
            <div class="widget-extra themed-background-muted">
                <h4 class="widget-content-light"><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span></div>
        </div>
    </div> -->
</div>

<!-- <div class="row">
    <pre>
        <?=  print_r($get_data) ?>
    </pre>
</div> -->
<div class="block full block-alt-noborder">
    <h3 class="sub-header text-center"><strong>Selamat Datang, <?= $_SESSION['namaUser'] ?></strong></h3>

    <div class="row">
        <div class="col-md-12">
            <!-- <h3>Selamat Datang, <?= $_SESSION['namaUser'] ?></h3> -->
            <div class="block full table-responsive">
            <?php
            if ($get_data == '401') {
                ?>
                <h1>
                    API Dilarang
                </h1>
                <?php
            } else if ($get_data !== '401') {
                if (empty($get_data)) {
                    ?>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-info-circle"></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Data Kosong</h2><br><small>Belum ada data dokumen...<?php echo count($get_data)?></small>
                        </div>
                    </div>
                    <?php
                }else if (isset($get_data->status)) {?>
                     <div class="row ">
                        <div class="col-md-1">
                            <i class="fa fa-5x fa-info-circle "></i>
                        </div>
                        <div class="col-md-11">
                            <h2>Data Kosong</h2><br><small>Belum ada data yang akan expired...</small>
                        </div>
                    </div>
                <?php 
                } else if (!empty($get_data)) {
                    ?>
                    <div class="block-title" >
                        <div class="block-options pull-right">
                          
                        </div>
                        <h2><strong>List</strong> Reminder Dokumen Expired</h2>
                    </div>
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;font-size: 13px" width="20px">No</th>
                            <th style="text-align: center;font-size: 13px" width="50px">Menjelang Expired</th>
                            <th style="text-align: center;font-size: 13px" >Departemen</th>
                            
                            <th style="text-align: center;font-size: 13px" width="100px">Nomor Dokumen</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Instansi</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Judul Dokumen</th>
                            <!-- <th style="text-align: center;font-size: 13px" width="150px">Deskripsi Dokumen</th> -->
                            <th style="text-align: center;font-size: 13px" width="150px">Dokumen Terbit</th>
                            <th style="text-align: center;font-size: 13px" width="100px">Dokumen Valid</th>
                            <th style="text-align: center;font-size: 13px" width="80px">Action</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($get_data as $KEY => $data) {?>
                                <tr>
                                    <td style="text-align: center;font-size: 10px"><?= $KEY+1; ?></td>
                                    <td style="font-size: 10px">
                                      <b style="color: red">
                                        <?php 
                                    if(date('Y-m-d') < $data->tgl_habis_berlakuDokumen){
                                        // if($data->tglAwal == $data->tgl_habis_berlakuDokumen){
                                        //     $date1=date_create(date('Y-m-d'));
                                        // }else{
                                            $date1=date_create(date('Y-m-d'));
                                        // }
                                        $date2=date_create($data->tgl_habis_berlakuDokumen);
                                        $diff=date_diff($date1,$date2);
                                        echo $diff->format("%a hari lagi");
                                    }else{
                                        echo "Dokumen telah expired";
                                    }?></b>
                                    </td>
                                    <td style="font-size: 10px"><?= $data->namaPerusahaan.' di '. $data->lokasiPerusahaan;?></td>
                                    <td style="font-size: 10px"><?= $data->nomorDokumen; ?></td>
                                    <td style="font-size: 10px"><?= $data->namaInstansi; ?></td>
                                    <td style="font-size: 10px">
                                    <?php if($data->idJudul == 0){
                                        echo $data->deskripsiDokumen;
                                    }else{
                                        echo $data->namaJudul;
                                    }?></td>
                                    <!-- <td style="font-size: 10px"><?= $data->deskripsiDokumen; ?></td> -->
                                    <td style="font-size: 10px"><?= isset($data->tgl_mulai_terbitDokumen) ? formatTanggal("-", $data->tgl_mulai_terbitDokumen, true) : '-'; ?></td>
                                    <td style="font-size: 10px"><?= isset($data->tgl_habis_berlakuDokumen) ? formatTanggal("-", $data->tgl_habis_berlakuDokumen,true) : '-'; ?></td>
                                    <td style="text-align: center;font-size: 10px"></td>
                                  
                                </tr>
                          <?php }?>     
                        </tbody>
                    </table>
                    <?php
                }
            }
            ?>
        </div>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/dokumen/JSDatatable');
$this->load->view('frontend/dokumen/JS');
// $this->load->view('frontend/dokumen/modalDelete');
// $this->load->view('frontend/dokumen/JSNotify');



