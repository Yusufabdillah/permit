<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 17/02/2019
 * Time: 11:13
 */

echo "<hr>";
if ($status == 'aktif') {
    ?>
    <div class="row animation-fadeInQuickInv">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-10">
                    <label class="control-label">Tanggal Berlaku</label>
                    <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                        <input autocomplete="off" type="text" id="tglMulaiBerlaku"
                               name="tgl_mulai_berlakuDokumen" class="form-control text-center"
                               placeholder="Tanggal Mulai Berlaku">
                        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                        <input autocomplete="off" type="text" id="tglSelesaiBerlaku"
                               name="tgl_habis_berlakuDokumen" class="form-control text-center"
                               placeholder="Tanggal Selesai Berlaku">
                        <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="control-label">Hari</label>
                    <input type="text" readonly id="hasilTglBerlaku" name="rentang_hari_berlakuDokumen"
                           class="form-control text-center" placeholder="...">
                </div>
            </div>
        </div>
    </div>
    <div class="row animation-fadeInQuickInv">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-10">
                    <label class="control-label">Reminder</label>
                    <input type="hidden" id="tglRentangReminder">
                    <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                        <input autocomplete="off" type="text" id="mulaiReminder"
                               name="mulai_reminderDokumen" class="form-control text-center"
                               placeholder="Tanggal Mulai Reminder">
                        <span class="input-group-addon"><i class="fa fa-arrow-right"></i></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="control-label">Dimulai Hari Ke</label>
                    <input type="text" readonly id="hasilTglReminder" name="harike_reminderDokumen"
                           class="form-control text-center" placeholder="...">
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('frontend/posting/JSDatepicker');
} else if ($status == 'tidak_aktif') {
    ?>
    <h5 class="text-center text-warning animation-fadeInQuickInv">
        <i class="fa fa-info-circle"></i> Tanggal Berlaku dan Reminder akan aktif apabila status Expired Unlimited "Non
        Aktif"
    </h5>
    <?php
}
echo "<hr>";

