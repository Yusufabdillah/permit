<div class="content-header">
	<div class="header-section">
		<h1>
			<i class="fa fa-file-text"></i> Perpanjangan Dokumen
		</h1>
	</div>
</div>
<?php $this->load->view('tmp_frontend/breadcrumb') ?>
<div class="row animation-fadeInQuickInv">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#draft">Draft</a></li>
					<li><a href="#filter">Pilih Dokumen</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="draft">
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
									<small>Belum ada dokumen perpanjangan dari officer...</small>
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
									<?php
									if ($data->tolak_status == 1) {
										?>
										<div class="row">
											<div class="form-group col-md-12">
												<a
													data-t_id="<?= $data->idPengajuan; ?>"
													data-t_jdl="<?= $data->namaJudul; ?>"
													data-t_ket="<?= $data->tolak_ktr; ?>"
													data-t_user="<?= $data->TLK_namaUser; ?>"

													data-toggle="modal"
													class="modalKetTolak btn btn-md btn-danger pull-right"
													href="#modalKetTolak"><i class="fa fa-book"></i> Keterangan
													Penolakan</a>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-12">
												<h3 class="pull-right text-danger"><i class="fa fa-times-circle"></i>
													Pengajuan Ditolak</h3>
											</div>
										</div>
										<?php
									} else if ($data->tolak_status == 0) {
										?>
										<div class="row">
											<div class="btn-group pull-right">
												<a class="btn btn-md btn-success"
												   href="<?= site_url('F_Perpanjangan/form/' . encode_str($data->idPengajuan)); ?>"><i
														class="fa fa-edit"></i> Edit</a>
												<a
													data-h_id="<?= $data->idPengajuan; ?>"
													data-h_jdl="<?= $data->namaJudul; ?>"

													data-toggle="modal" class="modalDelete btn btn-md btn-danger"
													href="#modalDelete"><i class="fa fa-trash-o"></i> Delete</a>
											</div>
										</div>
										<?php
									}
									?>
								</li>
								<hr>
								<?php
							}
						}
						?>
					</ul>
				</div>
				<div class="tab-pane" id="filter">
					<div class="row">
						<div class="col-md-12">
							<div class="block">
								<div class="block-title">
									<div class="block-options pull-right">
										<button data-toggle="collapse" data-target="#filter_collapse"
												class="btn btn-alt btn-sm btn-primary"><i class="fa fa-angle-down"></i></button>
									</div>
									<h2>Filter</h2>
								</div>
								<div class="collapse row" id="filter_collapse">
									<div class="col-md-4">
										<div class="form-group">
											<label>Case Number</label>
											<input type="text" id="AJAX_casenumberDokumen" class="form-control" placeholder="..."
												   name="casenumberDokumen"/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Judul Dokumen</label>
											<input type="text" placeholder="..." id="AJAX_judulDokumen" class="form-control"
												   value="" name="judulDokumen"/>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<div class="col-md-12">
												<?php
												$perusahaan = array(
													'label' => 'Perusahaan',
													'name' => 'idPerusahaan',
													'id' => 'AJAX_idPerusahaan',
													'placeholder' => 'Pilih site perusahaan',
													'help' => 'Mohon pilih site perusahaan'
												);
												?>
												<label class="control-label"><?= $perusahaan['label']; ?></label><br>
												<select name="<?= $perusahaan['name']; ?>"
														class="<?= $perusahaan['name']; ?> form-control"
														id="<?= $perusahaan['id']; ?>"
														data-placeholder="<?= $perusahaan['placeholder']; ?>" style="width: 100%;">
													<option></option>
													<?php
													foreach ($get_perusahaan as $data) {
														?>
														<option
															<?php
															if (isset($_SESSION['idPerusahaan'])) {
																if ($data->idPerusahaan == $_SESSION['idPerusahaan']) {
																	echo "selected";
																}
															}
															?>
															value="<?= $data->idPerusahaan; ?>"><?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?></option>
														<?php
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group text-center">
											<button style="width: 100px" class="btn btn-info" onclick="JSAJAXSearch()"><i
													class="fa fa-search"></i> Cari
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="block">
								<div class="block-title">
									<h2>Daftar Dokumen</h2>
								</div>
								<table id="tabel" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th style="text-align: center" width="20px">No</th>
										<th style="text-align: center" width="20px">Aksi</th>
										<th style="text-align: center" width="200px">Case Number</th>
										<th style="text-align: center" width="200px">Deskripsi Dokumen</th>
										<th style="text-align: center" width="200px">Perusahaan (Site)</th>
										<th style="text-align: center" width="150px">Instansi</th>
										<!-- <th style="text-align: center" width="100px">Klasifikasi</th> -->
										<th style="text-align: center" width="100px">Tanggal Terbit</th>
										<th style="text-align: center" width="100px">Expired Dokumen</th>
										<th style="text-align: center" width="100px">Jumlah Hari</th>
									</tr>
									</thead>
									<tbody id="AJAX_get_dokumen">
									<?php
									foreach ($get_dokumen as $Key => $data) {
										$cek = !empty($get_cek_perpanjangan) ? array_search($data->idDokumen, $get_cek_perpanjangan) : null;
										?>
										<tr>
											<td style="text-align: center"><?= $Key + 1; ?></td>
											<td style="text-align: center">
												<?php
												if (empty($cek)) {
													?>
													<a class="btn btn-md btn-primary"
													   href="<?= site_url('F_Perpanjangan/formCreate/' . encode_str($data->idDokumen)."/".encode_str($data->idPengajuan)); ?>">
														<i class="fa fa-edit"></i>
													</a>
													<?php
												} else if (!empty($cek)) {
													?>
													<i class="fa fa-2x fa-check-circle-o text-success"></i>
													<?php
												}
												?>
											</td>
											<td><?= $data->casenumberDokumen ?></td>
											<td><?= $data->deskripsiDokumen; ?></td>
											<td><?= $data->namaPerusahaan . ' - ' . $data->lokasiPerusahaan ?></td>
											<td><?= $data->namaInstansi ?></td>
											<!-- <td><?//= $data->namaKlasifikasi ?></td> -->
											<td><?= isset($data->tgl_mulai_berlakuDokumen) ? formatTanggal('-', $data->tgl_mulai_berlakuDokumen, true) : null ?></td>
											<td><?= isset($data->tgl_habis_berlakuDokumen) ? formatTanggal('-', $data->tgl_habis_berlakuDokumen, true) : null ?></td>
											<td><?= $data->rentang_hari_berlakuDokumen ?></td>
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
	</div>
</div>
<?php
$this->load->view('frontend/perpanjangan/JSDatatable');
$this->load->view('frontend/perpanjangan/JSSelect2');
$this->load->view('frontend/perpanjangan/JSAJAXSearch');
$this->load->view('frontend/perpanjangan/modalDelete');
$this->load->view('frontend/perpanjangan/modalKetTolak');
$this->load->view('frontend/perpanjangan/JS');
