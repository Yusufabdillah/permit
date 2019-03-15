<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 0:37
 */
?>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= site_url("B_Referensi/deleteReferensi"); ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-2x fa-trash"></i> Hapus Referensi Persyaratan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idReferensi" id="d_idReferensi" required>
                    <input type="hidden" name="idJudul" id="d_idJudul" required>
                    <div class="form-group m-form__group">
                        <label>
                            Deskripsi Persyaratan
                        </label>
                        <input type="text" readonly class="form-control m-input" name="deskripsiReferensi" id="d_deskripsiReferensi">
                    </div>
                    <hr>
                    <h3>
                        Anda yakin ?
                    </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times-circle-o"></i> Tidak.
                    </button>
                    <button type="submit" class="btn m-btn--pill btn-danger">
                        <i class="fa fa-trash"></i> Ya, saya yakin.
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
