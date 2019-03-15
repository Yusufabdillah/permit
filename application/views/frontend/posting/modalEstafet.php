<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:42
 */
?>
    <div class="modal fade" id="modalEstafet">
        <form enctype="multipart/form-data" id="formModalPosting" action="<?= site_url('F_Posting/postingPengajuan'); ?>" method="post" class="form-horizontal">
            <input type="hidden" value="<?= $get_pengajuan->idPengajuan; ?>" name="idPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->idInstansi; ?>" name="idInstansi">
            <input type="hidden" value="<?= $get_pengajuan->idTipe; ?>" name="idTipe">
            <input type="hidden" value="<?= $get_pengajuan->idUser; ?>" name="idUser">
            <input type="hidden" value="<?= $get_pengajuan->idKelurahan; ?>" name="idKelurahan">
            <input type="hidden" value="<?= $get_pengajuan->idPerusahaan; ?>" name="idPerusahaan">
            <input type="hidden" value="<?= $get_pengajuan->singkatanPerusahaan; ?>" name="singkatanPerusahaan">
            <input type="hidden" value="<?= $get_pengajuan->idPerusahaan_asal; ?>" name="idPerusahaan_asal">
            <input type="hidden" value="<?= $get_pengajuan->idCurrency; ?>" name="idCurrency">
            <input type="hidden" value="<?= $get_pengajuan->idJudul; ?>" name="idJudul">
            <input type="hidden" value="<?= $get_pengajuan->kpl_instansiPengajuan; ?>" name="kpl_instansiPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->jbt_kpl_insPengajuan; ?>" name="jbt_kpl_insPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->desk_judulPengajuan; ?>" name="desk_judulPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->nomorPengajuan; ?>" name="nomorPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->tgl_mulaiPengajuan; ?>" name="tgl_mulaiPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->tgl_selesaiPengajuan; ?>" name="tgl_selesaiPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->waktu_pengurusanPengajuan; ?>" name="waktu_pengurusanPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->biayaPengajuan; ?>" name="biayaPengajuan">
            <textarea style="display: none;" name="kurs_biayaPengajuan"><?= $get_pengajuan->kurs_biayaPengajuan; ?></textarea>
            <textarea style="display: none;" name="persyaratanPengajuan"><?= $get_pengajuan->persyaratanPengajuan; ?></textarea>
            <textarea style="display: none;" name="deskripsiPengajuan"><?= $get_pengajuan->deskripsiPengajuan; ?></textarea>
            <input type="hidden" value="<?= $get_pengajuan->idST; ?>" name="idST">
            <input type="hidden" value="<?= $get_pengajuan->statusOSSPengajuan; ?>" name="statusOSSPengajuan">
            <input type="hidden" value="<?= $get_pengajuan->draft_createdby; ?>" name="draft_createdby">
            <input type="hidden" value="<?= $get_pengajuan->submit_createdby; ?>" name="submit_createdby">
            <input type="hidden" value="<?= $get_pengajuan->approve_createdby; ?>" name="approve_createdby">
            <input type="hidden" value="<?= $get_pengajuan->pending_createdby; ?>" name="pending_createdby">
            <input type="hidden" value="<?= $get_pengajuan->srtterima_createdby; ?>" name="srtterima_createdby">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-send text-info"></i> Posting Pengajuan</h4>
                    </div>
                    <div class="modal-body" style="margin-left: 25px; margin-right: 25px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Pengajuan</label>
                                    <input type="text" name="namaJudul" value="<?= $get_pengajuan->namaJudul; ?>"
                                           class="form-control" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row container-fluid">
                            <label>Wilayah Dokumen</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    $negara = array(
                                        'label' => 'Negara',
                                        'id' => 'AJAX_idNegara',
                                        'name' => 'idNegara',
                                        'placeholder' => 'Pilih negara',
                                        'help' => 'Mohon pilih negara'
                                    );
                                    ?>
                                    <div class="col-md-12">
                                        <label class="control-label"><?= $negara['label']; ?></label><br>
                                        <select id="<?= $negara['id']; ?>" name="<?= $negara['name']; ?>"
                                                class="<?= $negara['name']; ?>"
                                                data-placeholder="<?= $negara['placeholder']; ?>" style="width: 100%;">
                                            <option></option>
                                            <?php
                                            foreach ($get_negara as $data) {
                                                ?>
                                                <option value="<?= $data->idNegara; ?>"><?= $data->namaNegara; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block">
                                    <?= $negara['help']; ?>
                                    <a href="javascript:;" id="helpForm" data-help="Negara">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $provinsi = array(
                                            'label' => 'Provinsi',
                                            'name' => 'idProvinsi',
                                            'id' => 'AJAX_idProvinsi',
                                            'placeholder' => 'Pilih provinsi',
                                            'help' => 'Mohon pilih provinsi'
                                        );
                                        ?>
                                        <label class="control-label"><?= $provinsi['label']; ?></label><br>
                                        <select id="<?= $provinsi['id']; ?>" name="<?= $provinsi['name']; ?>"
                                                class="<?= $provinsi['name']; ?>"
                                                data-placeholder="<?= $provinsi['placeholder']; ?>"
                                                style="width: 100%;">
                                            <?php
                                            /**
                                             * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                             */
                                            if (isset($get_pengajuan)) {
                                                ?>
                                                <option></option>
                                                <?php
                                                foreach ($get_provinsi as $data) {
                                                    ?>
                                                    <option value="<?= $data->idProvinsi; ?>"><?= $data->namaProvinsi; ?></option>
                                                    <?php
                                                }
                                            }
                                            //====================================
                                            ?>
                                        </select>
                                        <span class="help-block">
                                    <?= $provinsi['help']; ?>
                                    <a href="javascript:;" id="helpForm" data-help="Provinsi">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $kota = array(
                                            'label' => 'Kota',
                                            'name' => 'idKota',
                                            'id' => 'AJAX_idKota',
                                            'placeholder' => 'Pilih kota',
                                            'help' => 'Mohon pilih kota'
                                        );
                                        ?>
                                        <label class="control-label"><?= $kota['label']; ?></label><br>
                                        <select id="<?= $kota['id']; ?>" name="<?= $kota['name']; ?>"
                                                class="<?= $kota['name']; ?>"
                                                data-placeholder="<?= $kota['placeholder']; ?>"
                                                style="width: 100%;">
                                            <?php
                                            /**
                                             * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                             */
                                            if (isset($get_pengajuan)) {
                                                ?>
                                                <option></option>
                                                <?php
                                                foreach ($get_kota as $data) {
                                                    ?>
                                                    <option value="<?= $data->idKota; ?>"><?= $data->namaKota; ?></option>
                                                    <?php
                                                }
                                            }
                                            //====================================
                                            ?>
                                        </select>
                                        <span class="help-block">
                                    <?= $kota['help']; ?>
                                    <a href="javascript:;" id="helpForm" data-help="Kota">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $kecamatan = array(
                                            'label' => 'Kecamatan',
                                            'name' => 'idKecamatan',
                                            'id' => 'AJAX_idKecamatan',
                                            'placeholder' => 'Pilih kecamatan...',
                                            'help' => 'Mohon pilih kecamatan'
                                        );
                                        ?>
                                        <label class="control-label"><?= $kecamatan['label']; ?></label><br>
                                        <select id="<?= $kecamatan['id']; ?>" name="<?= $kecamatan['name']; ?>"
                                                class="<?= $kecamatan['name']; ?>"
                                                data-placeholder="<?= $kecamatan['placeholder']; ?>"
                                                style="width: 100%;">
                                            <?php
                                            /**
                                             * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                             */
                                            if (isset($get_pengajuan)) {
                                                ?>
                                                <option></option>
                                                <?php
                                                foreach ($get_kecamatan as $data) {
                                                    ?>
                                                    <option
                                                        <?php
                                                        if ($data->idKecamatan == $get_pengajuan->idKecamatan) {
                                                            echo "selected";
                                                        }
                                                        ?>
                                                        value="<?= $data->idKecamatan; ?>"><?= $data->namaKecamatan; ?></option>
                                                    <?php
                                                }
                                            }
                                            //====================================
                                            ?>

                                        </select>
                                        <span class="help-block">
                                    <?= $kecamatan['help']; ?>
                                    <a href="javascript:;" id="helpForm" data-help="Kecamatan">
                                        <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                    </a>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $kelurahan = array(
                                            'label' => 'Kelurahan',
                                            'name' => 'idKelurahan',
                                            'id' => 'AJAX_idKelurahan',
                                            'placeholder' => 'Pilih kelurahan',
                                            'help' => 'Mohon pilih kelurahan'
                                        );
                                        ?>
                                        <label class="control-label"><?= $kelurahan['label']; ?></label><br>
                                        <select id="<?= $kelurahan['id']; ?>" name="<?= $kelurahan['name']; ?>"
                                                class="<?= $kelurahan['name']; ?>"
                                                data-placeholder="<?= $kelurahan['placeholder']; ?>"
                                                style="width: 100%;">
                                            <?php
                                            /**
                                             * Berikut ini hanya untuk update karena data akan di DOM AJAX
                                             */
                                            if (isset($get_pengajuan)) { ?>
                                                <option></option>
                                                <?php
                                                foreach ($get_kelurahan as $data) {
                                                    ?>
                                                    <option
                                                        <?php
                                                        if ($data->idKelurahan == $get_pengajuan->idKelurahan) {
                                                            echo "selected";
                                                        }
                                                        ?>
                                                        value="<?= $data->idKelurahan; ?>"><?= $data->namaKelurahan; ?></option>
                                                    <?php
                                                }
                                            }
                                            //====================================
                                            ?>
                                        </select>
                                        <span class="help-block">
                                        <?= $kelurahan['help']; ?>
                                        <a href="javascript:;" id="helpForm" data-help="Kelurahan">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row container-fluid">
                            <label>Site</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        $perusahaan = array(
                                            'label' => 'Perusahaan',
                                            'name' => 'idPerusahaan_EST',
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
                                                <option value="<?= $data->idPerusahaan; ?>"><?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block">
                                        <?= $perusahaan['help']; ?> 
                                        <a href="javascript:;" id="helpForm" data-help="Perusahaan">
                                            <i class="fa fa-question-circle-o" style="padding-left: 10px;font-size: 20px"></i>
                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">File Dokumen</label>
                                        <input type="file" name="filePengajuan" class="form-control input-sm">
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
                            Batal
                        </button>
                        <button type="submit" name="Estafet" id="Estafet" class="btn btn-info btn-outline"><i class="fa fa-send"></i>&nbsp;
                            Estafet
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<script>
    $('.idPerusahaan_EST').select2({allowClear: true});
    $('#formModalPosting').validate({
        errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
        errorElement: 'div',
        errorPlacement: function (error, e) {
            e.parents('.form-group > div').append(error);
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
            $(e).closest('.help-block').remove();
        },
        success: function (e) {
            // You can use the following if you would like to highlight with green color the input after successful validation!
            e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
            //e.closest('.form-group').removeClass('has-success has-error');
            e.closest('.help-block').remove();
        },
        rules: {
            idPerusahaan_EST: {
                required: true
            }
        },
        messages: {
            idPerusahaan_EST: {
                required: 'Form ini wajib diisi'
            }
        }
    });
</script>
<?php
$this->load->view('frontend/posting/JSSelect2');
$this->load->view('frontend/posting/AJAX');
