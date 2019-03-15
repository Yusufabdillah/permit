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
                        Classification
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
                                Form Classification
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                if (empty($get_klasifikasi)) {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_klasifikasi/saveKlasifikasi") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formKlasifikasi">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formKlasifikasi_msg">
                                    <div class="m-alert__icon">
                                        <i class="la la-warning"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        Oh snap! Change a few things up and try submitting again.
                                    </div>
                                    <div class="m-alert__close">
                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            //#########################################################################
                            ?>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Classification Name *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           class="form-control m-input" name="namaKlasifikasi"
                                           placeholder="Enter classification name...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Sub Sub Classification *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idSub_subk" name="idSub_subk">
                                        <option></option>
                                        <?php
                                        foreach ($get_subSubk as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_klasifikasi)) {
                                                if ($get_klasifikasi->idSub_subk === $data->idSub_subk) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idSub_subk ?>">
                                                <?= $data->namaSub_subk; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                Please choose a sub sub category.
                            </span>
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Kompleksitas *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="m-radio-list">
                                        <label class="m-radio m-radio--solid m-radio--state-brand">
                                            <input type="radio" checked name="kompleksitasKlasifikasi" value="0">
                                            Non Set
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-success">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="1">
                                            Normal
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-warning">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="2">
                                            Lumayan Rumit
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-danger">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="3">
                                            Rumit
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-metal">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="4">
                                            Sangat Rumit
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">
                                        Pilih salah satu tingkatan kompleksitas.
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
                                        <button type="reset" class="btn m-btn--pill btn-warning">
                                            Cancel
                                        </button>
                                        <a href="<?= site_url("b_klasifikasi/index"); ?>"
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
                } else if (!empty($get_klasifikasi)) {
                    if ($get_klasifikasi == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_klasifikasi !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("b_klasifikasi/saveKlasifikasi") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formKlasifikasi">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formKlasifikasi_msg">
                                        <div class="m-alert__icon">
                                            <i class="la la-warning"></i>
                                        </div>
                                        <div class="m-alert__text">
                                            Oh snap! Change a few things up and try submitting again.
                                        </div>
                                        <div class="m-alert__close">
                                            <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                //#########################################################################
                                if (isset($get_klasifikasi)) {
                                    ?>
                                    <input type="hidden" name="idKlasifikasi"
                                           value="<?= !empty($get_klasifikasi) ? $get_klasifikasi->idKlasifikasi : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_klasifikasi) ? $get_klasifikasi->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_klasifikasi) ? $get_klasifikasi->createdDate : null; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Classification Name *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_klasifikasi) ? $get_klasifikasi->namaKlasifikasi : null; ?>"
                                               class="form-control m-input" name="namaKlasifikasi"
                                               placeholder="Enter classification name...">
                                        <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Sub Sub Classification *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idSub_subk" name="idSub_subk">
                                            <option></option>
                                            <?php
                                            foreach ($get_subSubk as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->idSub_subk === $data->idSub_subk) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idSub_subk ?>">
                                                    <?= $data->namaSub_subk; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a sub sub category.
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Kompleksitas *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="m-radio-list">
                                        <label class="m-radio m-radio--solid m-radio--state-brand">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="0"
                                                <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->kompleksitasKlasifikasi == 0) {
                                                        echo 'checked';
                                                    } else {
                                                        null;
                                                    }
                                                }
                                                ?>
                                            >
                                            Non Set
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-success">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="1"
                                                <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->kompleksitasKlasifikasi == 1) {
                                                        echo 'checked=';
                                                    } else {
                                                        null;
                                                    }
                                                }
                                                ?>
                                            >
                                            Normal
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-warning">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="2"
                                                <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->kompleksitasKlasifikasi == 2) {
                                                        echo 'checked';
                                                    } else {
                                                        null;
                                                    }
                                                }
                                                ?>
                                            >
                                            Lumayan Rumit
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-danger">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="3"
                                                <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->kompleksitasKlasifikasi == 3) {
                                                        echo 'checked';
                                                    } else {
                                                        null;
                                                    }
                                                }
                                                ?>
                                            >
                                            Rumit
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid m-radio--state-metal">
                                            <input type="radio" name="kompleksitasKlasifikasi" value="4"
                                                <?php
                                                if (!empty($get_klasifikasi)) {
                                                    if ($get_klasifikasi->kompleksitasKlasifikasi == 4) {
                                                        echo 'checked';
                                                    } else {
                                                        null;
                                                    }
                                                }
                                                ?>
                                            >
                                            Sangat Rumit
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">
                                        Pilih salah satu tingkatan kompleksitas.
                                    </span>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-9 ml-lg-auto">
                                            <button type="submit" class="btn m-btn--pill btn-accent">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn m-btn--pill btn-warning">
                                                Cancel
                                            </button>
                                            <a href="<?= site_url("b_klasifikasi/index"); ?>"
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
                    }
                }
                ?>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
<?php
$this->load->view("backend/klasifikasi/JSValidasi");
$this->load->view("backend/klasifikasi/JSNotify");
$this->load->view("backend/klasifikasi/JSSelect2");
