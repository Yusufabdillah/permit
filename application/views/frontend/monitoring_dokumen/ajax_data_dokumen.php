<?php
if ($get_data->status == 'empty') {
    ?>
    <div>
        <h4 class="text-center"><i class="fa fa-info-circle"></i> Data Kosong</h4>
    </div>
    <?php
} else if ($get_data->status != 'empty') {
    ?>
        <table id="tabel" class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;font-size: 13px" width="20px">No</th>
                <th style="text-align: center;font-size: 13px" width="20px">Action</th>
                <!-- <th style="text-align: center;font-size: 13px" width="20px">Menjelang Expired</th> -->
                <th style="text-align: center;font-size: 13px" width="200px">Case Number</th>
                <th style="text-align: center;font-size: 13px" width="200px">Judul Dokumen</th>
                <th style="text-align: center;font-size: 13px" width="200px">Perusahaan (Site)</th>
                <th style="text-align: center;font-size: 13px" width="150px">Instansi</th>
                <!-- <th style="text-align: center;font-size: 13px" width="100px">Klasifikasi</th> -->
                <th style="text-align: center;font-size: 13px" width="100px">Tanggal Terbit</th>
                <th style="text-align: center;font-size: 13px" width="100px">Expired Dokumen</th>
                <th style="text-align: center;font-size: 13px" width="100px">Jumlah Hari</th>
                <!-- <th style="text-align: center" width="200px">Platform</th>
                <th style="text-align: center" width="200px">User Agent</th>
-->                        </tr>
            </thead>
            <tbody>
            <?php
            foreach ($get_data->data as $Key => $get) {
            ?>
            <tr>
                <td style="text-align: center"><?= $Key+1; ?></td>
                <td style="text-align: center"><a class="btn btn-md btn-success" href="<?= site_url('F_MonitoringDokumen/detailDokumen/' . encode_str($get->idDokumen)); ?>"><i class="fa fa-edit"></i> Lihat Detail</a></td>
               <!--  <td> <b style="color: red">
                            <?php 
                        if(date('Y-m-d') < $get->tgl_habis_berlakuDokumen){
                            // if($get->tglAwal == $get->tgl_habis_berlakuDokumen){
                            //     $date1=date_create(date('Y-m-d'));
                            // }else{
                                $date1=date_create(date('Y-m-d'));
                            // }
                            $date2=date_create($get->tgl_habis_berlakuDokumen);
                            $diff=date_diff($date1,$date2);
                            echo $diff->format("%a hari lagi");
                        }else if(date('Y-m-d') > $get->tgl_habis_berlakuDokumen &&  $get->tgl_habis_berlakuDokumen !=''){
                             echo "Dokumen telah expired";
                        }else if($get->tgl_habis_berlakuDokumen =='0000-00-00' || $get->tgl_habis_berlakuDokumen ==''){
                           echo '-'; 
                        }?></b></td> -->
                <td style="text-align: center"><?= $get->casenumberDokumen ?></td>
                <td><?= $get->deskripsiDokumen; ?></td>
                <td><?= $get->namaPerusahaan . ' - ' . $get->lokasiPerusahaan ?></td>
                <td><?= $get->namaInstansi ?></td>
                <!-- <td style="text-align: center"><?//= $get->namaKlasifikasi ?></td> -->
                <td style="text-align: center"><?= date('d-m-Y',strtotime($get->tgl_mulai_berlakuDokumen)) ?></td>
                <td style="text-align: center"><?= date('d-m-Y',strtotime($get->tgl_habis_berlakuDokumen)) ?></td>
                <td><?= $get->rentang_hari_berlakuDokumen ?></td>
<!--                            <td style="text-align: center"></td>
                <td style="text-align: center"></td> -->
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php
}
$this->load->view('frontend/user_log/JSDatatable');