<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<div class="modal fade" id="modalApprove">
    <form id="formModalApprove_EST" action="<?= site_url('F_Estafet/approveEstafet'); ?>" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-check-circle-o text-success"></i> Setujui Pengajuan Estafet</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPengajuan" id="a_idPengajuan" required>
                    <input type="hidden" name="idEstafet" id="a_idEstafet" required>
                    <input type="hidden" name="approve_createdby" id="a_approve_createdby" required>
                    <input type="hidden" name="idPerusahaan" id="a_idPerusahaan_asal" required>
                    <input type="hidden" name="idUser" id="a_idUser_asal" required>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Judul Pengajuan</label>
                                <input type="text" name="namaJudul" class="form-control" id="a_namaJudul" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                    </div>
                    <script>
                        $('.select2_idUser').select2({allowClear: true});
                    </script>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 style="text-align: center">Asal Perusahaan</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Site</label>
                                <input type="text" class="form-control" id="a_ASAL_PRS_namaPerusahaan" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Nama Koordinator</label>
                                <input type="text" class="form-control" id="a_namaUser_asal" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Tidak</button>
                    <button type="submit" class="btn btn-success btn-outline"><i class="fa fa-check"></i>&nbsp; Ya, saya yakin</button>
                </div>
            </div>
        </div>
    </form>
</div>
