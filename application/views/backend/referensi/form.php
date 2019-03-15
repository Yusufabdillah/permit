<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:47
 */
?>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title">
                        Referensi Persyaratan
                    </h3>
                </div>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?= site_url("B_Dashboard/index"); ?>">
                            <i style="font-size: 20px" class="fa fa-2x fa-home"></i>
                        </a>
                    </li>
                    <li>&nbsp;>&nbsp;</li>
                    <li>
                        <a href="<?= site_url($this->router->fetch_class() . "/index") ?>">
                            <?php
                            $EXPL = explode('_', $this->router->fetch_class());
                            echo $EXPL[1];
                            ?>
                        </a>
                    </li>
                    <li>&nbsp;>&nbsp;</li>
                    <li>
                        <?= $this->router->fetch_method(); ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Judul Dokumen <i class="la la-arrow-right"></i> "<?= $get_judul->namaJudul; ?>"
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                if ($get_referensi == '401') {
                    ?>
                    <div class="m-portlet__body">
                        <div class="text-center">
                            <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                izin..</h2>
                        </div>
                    </div>
                    <?php
                } else if ($get_referensi !== '401') {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_referensi/saveReferensi") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formReferensi">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formReferensi_msg">
                                    <div class="m-alert__icon">
                                        <i class="la la-warning"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        Oh snap! Change a few things up and try submitting again.
                                    </div>
                                    <div class="m-alert__close">
                                        <button type="button" class="close" data-close="alert"
                                                aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            //#########################################################################
                            ?>
                            <input type="hidden" name="idJudul" value="<?= $get_judul->idJudul; ?>" required>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Persyaratan *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idPersyaratan"
                                            name="idPersyaratan">
                                        <option></option>
                                        <?php
                                        foreach ($get_persyaratan as $KEY_ARRAY => $data) {
                                            ?>
                                            <option value="<?= $data->idPersyaratan ?>">
                                                <?= $data->namaPersyaratan; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                            Mohon pilih persyaratan.
                                        </span>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Deskripsi Referensi
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text" class="form-control m-input" name="deskripsiReferensi"
                                           placeholder="Masukkan deskripsi referensi...">
                                    <span class="m-form__help">
                                            Please fill with format text.
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <button type="submit" class="btn m-btn--pill btn-accent">
                                            Submit
                                        </button>
                                        <a href="<?= site_url("b_referensi/index"); ?>"
                                           class="btn m-btn--pill btn-danger">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                    <?php
                    if (isset($get_referensi->status)) {
                        if ($get_referensi->status !== 'empty') {
                            ?>
                            <div class="m-portlet__body col-md-12">
                                <div class="m-section">
                                    <div class="m-section__content">
                                        <table class="table m-table m-table--head-separator-primary">
                                            <thead>
                                            <tr>
                                                <th width="5%">
                                                    #
                                                </th>
                                                <th width="40%">
                                                    Persyaratan
                                                </th>
                                                <th width="*">
                                                    Deskripsi
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($get_referensi as $data) {
                                                ?>
                                                <tr class="m-table__row--active">
                                                    <th scope="row">
                                                        <?= $i++; ?>
                                                    </th>
                                                    <td>
                                                        <?= $data->namaPersyaratan; ?>
                                                    </td>
                                                    <td>
                                                        <form action="<?= site_url("B_Referensi/saveReferensi") ?>"
                                                              method="post"
                                                              class="m-form m-form--fit m-form--label-align-right">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <input type="hidden" name="idReferensi"
                                                                           value="<?= $data->idReferensi; ?>">
                                                                    <input type="hidden" name="idJudul"
                                                                           value="<?= $data->idJudul; ?>">
                                                                    <input type="hidden" name="idPersyaratan"
                                                                           value="<?= $data->idPersyaratan; ?>">
                                                                    <input type="hidden" name="createdBy"
                                                                           value="<?= $data->createdBy; ?>">
                                                                    <input type="hidden" name="createdDate"
                                                                           value="<?= $data->createdDate; ?>">
                                                                    <textarea class="form-control m-input"
                                                                              id="deskripsiReferensi"
                                                                              name="deskripsiReferensi"
                                                                              rows="1"><?= $data->deskripsiReferensi; ?></textarea>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="btn-toolbar" role="toolbar">
                                                                        <button type="submit"
                                                                                class="m-btn btn btn-secondary m-btn--hover-info">
                                                                            <i class="la la-edit"></i>
                                                                        </button>
                                                                        <a
                                                                                data-d_id="<?= $data->idReferensi; ?>"
                                                                                data-d_idjudul="<?= $data->idJudul; ?>"
                                                                                data-d_deskripsi="<?= $data->deskripsiReferensi; ?>"
                                                                                class="modalDelete m-btn btn btn-secondary m-btn--hover-danger"
                                                                                data-toggle="modal" href="#modalDelete">
                                                                            <i class="la la-trash"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else if ($get_referensi->status == 'empty') {
                            ?>
                            <div class="m-portlet__body">
                                <div class="text-center">
                                    <h2><i style="font-size: 25px" class="fa fa-2x fa-info-circle"></i> Data Kosong..
                                    </h2>
                                </div>
                            </div>
                            <?php
                        }
                    } else if (!isset($get_referensi->status)) {
                        ?>
                        <div class="m-portlet__body col-md-12">
                            <div class="m-section">
                                <div class="m-section__content">
                                    <table class="table m-table m-table--head-separator-primary">
                                        <thead>
                                        <tr>
                                            <th width="5%">
                                                #
                                            </th>
                                            <th width="40%">
                                                Persyaratan
                                            </th>
                                            <th width="*">
                                                Deskripsi
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($get_referensi as $data) {
                                            ?>
                                            <tr class="m-table__row--active">
                                                <th scope="row">
                                                    <?= $i++; ?>
                                                </th>
                                                <td>
                                                    <?= $data->namaPersyaratan; ?>
                                                </td>
                                                <td>
                                                    <form action="<?= site_url("B_Referensi/saveReferensi") ?>"
                                                          method="post"
                                                          class="m-form m-form--fit m-form--label-align-right">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="idReferensi"
                                                                       value="<?= $data->idReferensi; ?>">
                                                                <input type="hidden" name="idJudul"
                                                                       value="<?= $data->idJudul; ?>">
                                                                <input type="hidden" name="idPersyaratan"
                                                                       value="<?= $data->idPersyaratan; ?>">
                                                                <input type="hidden" name="createdBy"
                                                                       value="<?= $data->createdBy; ?>">
                                                                <input type="hidden" name="createdDate"
                                                                       value="<?= $data->createdDate; ?>">
                                                                <textarea class="form-control m-input"
                                                                          name="deskripsiReferensi"
                                                                          rows="1"><?= $data->deskripsiReferensi; ?></textarea>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="btn-toolbar" role="toolbar">
                                                                    <button type="submit"
                                                                            class="m-btn btn btn-secondary m-btn--hover-info">
                                                                        <i class="la la-edit"></i>
                                                                    </button>
                                                                    <a
                                                                            data-d_id="<?= $data->idReferensi; ?>"
                                                                            data-d_idjudul="<?= $data->idJudul; ?>"
                                                                            data-d_deskripsi="<?= $data->deskripsiReferensi; ?>"
                                                                            class="modalDelete m-btn btn btn-secondary m-btn--hover-danger"
                                                                            data-toggle="modal" href="#modalDelete">
                                                                        <i class="la la-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <form action="<?= site_url("B_Judul/saveJudul") ?>" method="post" class="m-form m-form--state m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <input type="hidden" name="idJudul" value="<?= $get_judul->idJudul; ?>" required>
                            <input type="hidden" name="idKlasifikasi" value="<?= $get_judul->idKlasifikasi; ?>" required>
                            <input type="hidden" name="namaJudul" value="<?= $get_judul->namaJudul; ?>" required>
                            <input type="hidden" name="createdBy" value="<?= $get_judul->createdBy; ?>" required>
                            <input type="hidden" name="createdDate" value="<?= $get_judul->createdDate; ?>" required>
                            <input type="hidden" name="redirectKe" value="<?= $this->router->fetch_class()."/".$this->router->fetch_method()."/" ?>">
                            <div class="m-form__seperator m-form__seperator--dashed  m-form__seperator--space m--margin-bottom-40"></div>
                            <div class="form-group  m-form__group row">
                                <label class="col-md-5 col-form-label">
                                    <h3>Rekomendasi Persyaratan</h3>
                                </label>
                            </div>
                            <div class="form-group  m-form__group row">
                                <div class="container-fluid">
                                    <textarea name="rekom_syaratJudul" class="summernote"><?= $get_judul->rekom_syaratJudul; ?></textarea>
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <div class="btn-group m-btn-group" role="group" aria-label="...">
                                        <button type="submit" class="btn m-btn--icon btn-success">
                                            <i class="la la-save"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
<?php
$this->load->view("backend/referensi/JSValidasi");
$this->load->view("backend/referensi/JSNotify");
$this->load->view("backend/referensi/JSSelect2");
$this->load->view("backend/referensi/JS");
$this->load->view("backend/referensi/JSSummernote");
$this->load->view("backend/referensi/modalDelete");
