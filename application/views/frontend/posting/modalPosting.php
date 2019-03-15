<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
    <div class="modal fade" id="modalPosting">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-save text-success"></i> Posting Pengajuan</h4>
                </div>
                <div class="modal-body" style="margin-left: 25px; margin-right: 25px">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Judul Pengajuan</label>
                                <input type="text" name="namaJudul" value="<?= $get_pengajuan->namaJudul; ?>"
                                       class="form-control" readonly="true">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                            <div class="form-group" style="margin-left: 10px">
                                <label>Expired Unlimited</label>
                                <label class="switch switch-success"><input type="checkbox" id="AJAX_exp_selamanyaDokumen" name="exp_selamanyaDokumen" value="1" checked><span></span></label>
                            </div>
                        </div>
                    </div>
                    <div id="AJAX_tglBerlaku">
                        <hr>
                        <h5 class="text-center text-warning animation-fadeInQuickInv">
                            <i class="fa fa-info-circle"></i> Tanggal Berlaku dan Reminder akan aktif apabila status Expired Unlimited "Non Aktif"
                        </h5>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label">File Dokumen</label>
                                    <input type="file" name="fileDokumen" class="form-control input-sm">
                                    <span class="help-block">
                                        File berformat .pdf atau .doc
                                        <a href="javascript:;" id="helpForm" data-help="File Dokumen">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;
                        Tidak
                    </button>
                    <button type="submit" name="Posting" id="posting" class="btn btn-success btn-outline"><i class="fa fa-save"></i>&nbsp;
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
$this->load->view('frontend/approve/JSSelect2');
$this->load->view('frontend/approve/JSValidasi');
