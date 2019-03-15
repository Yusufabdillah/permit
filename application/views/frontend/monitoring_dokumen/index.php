<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-database"></i> List Dokumen
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
						<h2>Filter</h2>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label>Case Number</label>
								<input type="text" id="txtcasenumber" class="form-control" value=""
									   placeholder="Search by Case Number" name="txtcasenumber"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Judul Dokumen</label>
								<input type="text" placeholder="Search by Judul Document" id="txtjuduldokumen"
									   class="form-control" value="" name="txtjuduldokumen"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Lokasi (Site)</label>
								<select id="txtlokasi" class="txtlokasi" name="idPerusahaan" style="width: 100%;">
                                    <option></option>
                                    <?php
                                    foreach ($get_perusahaan as $data) {
                                        ?>
                                        <option value="<?= $data->idPerusahaan; ?>"><?= $data->namaPerusahaan.' di '.$data->lokasiPerusahaan; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							 <div class="form-group">
                                <label>Bulan Expired:</label>
                               <select class="form-control select2" id="txtbulan" name="txtbulan">
                               		<option></option>
                                    <?php for($i=1;$i<=12;$i++){?>
                                    <?php if($i==1){$bulan="Januari";$tgl="01";}?>
                                    <?php if($i==2){$bulan="Februari";$tgl="02";}?>
                                    <?php if($i==3){$bulan="Maret";$tgl="03";}?>
                                    <?php if($i==4){$bulan="April";$tgl="04";}?>
                                    <?php if($i==5){$bulan="Mei";$tgl="05";}?>
                                    <?php if($i==6){$bulan="Juni";$tgl="06";}?>
                                    <?php if($i==7){$bulan="Juli";$tgl="07";}?>
                                    <?php if($i==8){$bulan="Agustus";$tgl="08";}?>
                                    <?php if($i==9){$bulan="September";$tgl="09";}?>
                                    <?php if($i==10){$bulan="Oktober";$tgl="10";}?>
                                    <?php if($i==11){$bulan="November";$tgl="11";}?>
                                    <?php if($i==12){$bulan="Desember";$tgl="12";}?>
                                    <option value="<?php echo $tgl ?>"><?php echo $bulan ?></option><?php };?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tahun Expired:</label>
                               <select class="form-control select2" id="txttahun" name="txttahun">
                               	<option></option>
                                    <?php for($i=date('Y')-20;$i<=date('Y')+20;$i++){?>
                                    
                                    <option value="<?php echo $i?>"><?php echo $i ?></option><?php };?>
                                </select>
                                
                            </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group text-center">
								<button style="width: 100px" class="btn btn-info" onclick="searchFilter()"><i
										class="fa fa-search"></i> Cari
								</button>
							</div>
						</div>
					</div>
					<div class="row">
						<hr>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="block">
					<div class="block-title">
						<h2>List</h2>
					</div>
					<div id="AJAX_Tabel">
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
			            </tr>
			            </thead>
			            <tbody>
			            <?php
			            foreach ($get_data as $Key => $get) {
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
			            </tr>
			            <?php
			            }
			            ?>
			            </tbody>
			        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$this->load->view('frontend/monitoring_dokumen/JSDatatable');
$this->load->view('frontend/monitoring_dokumen/JS');
$this->load->view('frontend/monitoring_dokumen/JSSelect2');