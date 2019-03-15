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
<div class="modal fade" id="modalBatal">
    <form action="<?= site_url('F_Approve/batalPengajuan'); ?>" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-times-circle text-danger"></i> Batalkan Pengajuan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPengajuan" id="b_idPengajuan" required>
                    <input type="hidden" name="draft_createdby" id="b_draft_createdby" required>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Judul Pengajuan</label>
                                <input type="text" name="namaJudul" class="form-control" id="b_namaJudul" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>Keterangan Pembatalan</label>
                                <textarea name="tolak_ktr" class="ckeditor"></textarea>
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
