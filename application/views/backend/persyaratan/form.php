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
                        Document Requirements
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
                                Form Document Requirements
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * Untuk Create
                 */
                if (empty($get_persyaratan)) {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("B_Persyaratan/savePersyaratan") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formPersyaratan">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formPersyaratan_msg">
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
                                    Document Requirements *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input autofocus type="text"
                                           class="form-control m-input" name="namaPersyaratan"
                                           placeholder="Enter document requirements...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">
                                    Status OSS *
                                </label>
                                <div class="col-3">
                                    <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_persyaratan)) {
                                                   if ($get_persyaratan->statusOSSPersyaratan == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusOSSPersyaratan">
                                        <span></span>
                                    </label>
                                </span>
                                    </div>
                                    <span class="m-form__help">
                                Please set status OSS.
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
                                        <a href="<?= site_url("B_Persyaratan/index"); ?>"
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
                /**
                 * Untuk Update
                 */
                if (!empty($get_persyaratan)) {
                    if ($get_persyaratan == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_persyaratan !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("B_Persyaratan/savePersyaratan") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formPersyaratan">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formPersyaratan_msg">
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
                                if (isset($get_persyaratan)) {
                                    ?>
                                    <input type="hidden" name="idPersyaratan"
                                           value="<?= !empty($get_persyaratan) ? $get_persyaratan->idPersyaratan : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_persyaratan) ? $get_persyaratan->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_persyaratan) ? $get_persyaratan->createdDate : null; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Document Requirements *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input autofocus type="text"
                                               value="<?= !empty($get_persyaratan) ? $get_persyaratan->namaPersyaratan : null; ?>"
                                               class="form-control m-input" name="namaPersyaratan"
                                               placeholder="Enter document requirements...">
                                        <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label">
                                        Status OSS *
                                    </label>
                                    <div class="col-3">
                                        <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_persyaratan)) {
                                                   if ($get_persyaratan->statusOSSPersyaratan == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusOSSPersyaratan">
                                        <span></span>
                                    </label>
                                </span>
                                        </div>
                                        <span class="m-form__help">
                                Please set status OSS.
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
                                            <a href="<?= site_url("B_Persyaratan/index"); ?>"
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
$this->load->view("backend/persyaratan/JSValidasi");
$this->load->view("backend/persyaratan/JSNotify");
