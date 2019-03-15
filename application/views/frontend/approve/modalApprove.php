<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
    <div class="modal fade" id="modalApprove">
        <form action="<?= site_url('F_Approve/approvePengajuan'); ?>" id="form_modalApprove" method="post">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-check-circle-o text-success"></i> Setujui Pengajuan</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idPengajuan" value="<?= $get_pengajuan->idPengajuan; ?>" required>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Pengajuan</label>
                                    <input type="text" name="namaJudul" value="<?= $get_pengajuan->namaJudul; ?>"
                                           class="form-control" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <label class="control-label">Tanggal Pengurusan</label>
                                        <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                                            <input autocomplete="off" type="text" id="tglMulai"
                                                   name="tgl_mulaiPengajuan" class="form-control text-center"
                                                   placeholder="Tanggal Mulai">
                                            <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                            <input autocomplete="off" type="text" id="tglSelesai"
                                                   name="tgl_selesaiPengajuan" class="form-control text-center"
                                                   placeholder="Tanggal Selesai">
                                            <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">Hari</label>
                                        <input type="text" readonly id="hasilTgl" name="waktu_pengurusanPengajuan"
                                               class="form-control text-center" placeholder="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Person In Charge</label>
                                    <select name="idUser"
                                            class="select2_idUser"
                                            data-placeholder="Pilih person in charge"
                                            style="width: 100%;">
                                        <option></option>
                                        <?php
                                        if ($get_user->status !== 'empty') {
                                            foreach ($get_user as $data) {
                                                ?>
                                                <option value="<?= $data->idUser; ?>"><?= $data->namaUser; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div class="col-md-12">
                                        <label class="control-label">Estafet</label>&nbsp;
                                        <label class="switch switch-success"><input type="checkbox" id="TRIGGER_estafetNotif" name="tombol_estafetPengajuan" value="1" ><span></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="AJAX_estafetNotif">
                            <div class="col-md-12">
                                <hr>
                                <h5 class="text-center text-warning animation-fadeInQuickInv">
                                    <i class="fa fa-info-circle"></i> Set notifikasi akan aktif bila status estafet di aktifkan
                                </h5>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;
                            Tidak
                        </button>
                        <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-check"></i>&nbsp;
                            Setujui
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
$this->load->view('frontend/approve/JSSelect2');
$this->load->view('frontend/approve/JSValidasi');
$this->load->view('frontend/approve/AJAX');
