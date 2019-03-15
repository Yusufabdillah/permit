<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
<script src="<?= site_url('assets/vendor/frontend/js/helpers/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.config.toolbarCanCollapse = true;
    CKEDITOR.config.toolbar = [
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format', 'FontSize' ] }
    ];
</script>
<div class="modal fade" id="modalDecline">
    <form action="<?= site_url('F_Estafet/declineEstafet'); ?>" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-times-circle-o text-danger"></i> Tolak Pengajuan Estafet</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPengajuan" id="d_idPengajuan" required>
                    <input type="hidden" name="idEstafet" id="d_idEstafet" required>
                    <input type="hidden" name="approve_createdby" id="d_approve_createdby" required>
                    <input type="hidden" name="idPerusahaan" id="d_idPerusahaan_asal" required>
                    <input type="hidden" name="idUser" id="d_idUser_asal" required>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Judul Pengajuan</label>
                                <input type="text" name="namaJudul" class="form-control" id="d_namaJudul" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Keterangan Penolakan</label>
                                <textarea name="ktrDecline_estafet" class="ckeditor"></textarea>
                            </div>
                        </div>
                    </div>
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
                                <input type="text" class="form-control" id="d_ASAL_PRS_namaPerusahaan" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Nama Koordinator</label>
                                <input type="text" class="form-control" id="d_namaUser_asal" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Tidak</button>
                    <button type="submit" class="btn btn-danger btn-outline"><i class="fa fa-check"></i>&nbsp; Ya, saya yakin</button>
                </div>
            </div>
        </div>
    </form>
</div>
