<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
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
                    <a href="<?= site_url("F_Dashboard/index"); ?>">
                        <i style="font-size: 20px" class="fa fa-2x fa-home"></i>
                    </a>
                </li>
                <li>&nbsp;>&nbsp;</li>
                <li>
                    <a href="<?= site_url($this->router->fetch_class()."/".$this->router->fetch_method()) ?>">
                        <?= $this->router->fetch_class(); ?>
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
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            List Document Requirements
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-center"  data-dropdown-persistent="true" data-dropdown-toggle="click">
                                <a href="#" class="m-dropdown__toggle btn m-btn--pill btn-primary dropdown-toggle">
                                    <i class="la la-search"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href="<?= site_url('f_persyaratan/form'); ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                <span>
                                    <i class="la la-plus-circle"></i>
                                    <span>
                                        Add Document Requirements
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="m-datatable" id="html_table" width="100%">
                    <thead>
                        <tr>
                            <th>
                                [No] Document Requirements
                            </th>
                            <th>
                                Created
                            </th>
                            <th>
                                Updated
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($get_persyaratan as $data) {
                            ?>
                            <tr>
                                <td>
                                    [<?= $data['idPersyaratan']; ?>] <?= $data['namaPersyaratan']; ?>
                                </td>
                                <td>
                                    <?= $data['createdBy']; ?><br><?= formatDateTime($data['createdDate'],"WIB", true); ?>
                                </td>
                                <td>
                                    <?= $data['updatedBy']; ?><br><?= formatDateTime($data['updatedDate'],"WIB", true); ?>
                                </td>
                                <td>
                                    <div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="First group">
                                        <a href="<?= site_url("f_Persyaratan/form/".encode_str($data['idPersyaratan'])) ?>" class="m-btn m-btn m-btn--pill btn btn-info">
                                            <i class="la la-edit"></i> Edit
                                        </a>
                                        <a
                                                data-d_id="<?= $data['idPersyaratan']; ?>"
                                                data-d_nama="<?= $data['namaPersyaratan']; ?>"

                                                data-toggle="modal" href="#modalDelete" class="modalDelete m-btn m-btn m-btn--pill btn btn-danger">
                                            <i class="la la-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('frontend/persyaratan/modalDelete');
$this->load->view('frontend/persyaratan/JSDatatable');
$this->load->view('frontend/persyaratan/JS');


