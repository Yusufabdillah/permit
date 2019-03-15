<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/03/2019
 * Time: 22:32
 */
?>
<style>
    .pengaturanSwal{
        padding: 2rem !important;
        font-size: 15px;
    }
</style>
<script type="text/javascript">
	$(document).on('click', '#helpForm', function() {
		var helpName = $(this).data('help');
		fireSwal(helpName);
	});

	function fireSwal(nameForm) {
		const Help = Swal.mixin({
			type: 'info',
            title: nameForm,
            customClass: 'pengaturanSwal',
            showCloseButton: true,
		  	showConfirmButton: false,
            html: htmlSwal(nameForm)
        });
        Help.fire();
	}

	function htmlSwal(nameForm) {
		if (nameForm == 'Negara') {
			return '<p>' +
		    'Negara dibutuhkan untuk menentukan negara dari wilayah perusahaan anda'+
		    '</p>'
		} else if (nameForm == 'Provinsi') {
			return '<p>' +
		    'Provinsi dibutuhkan untuk menentukan provinsi dari wilayah perusahaan anda '+
		    '</p>'
		} else if (nameForm == 'Kota') {
			return '<p>' +
		    'Kota dibutuhkan untuk menentukan kota dari wilayah perusahaan anda dan instansi tujuan '+
		    '</p>'
		} else if (nameForm == 'Kecamatan') {
			return '<p>' +
		    'Kecamatan dibutuhkan untuk menentukan kecamatan dari wilayah perusahaan anda '+
		    '</p>'
		} else if (nameForm == 'Kelurahan') {
			return '<p>' +
		    'Kelurahan dibutuhkan untuk menentukan kelurahan dari wilayah perusahaan anda '+
		    '</p>'
		} else if (nameForm == 'Perusahaan') {
			return '<p>' +
		    'Perusahaan adalah nama site lokasi kantor wilayah anda'+
		    '</p>'
		} else if (nameForm == 'Instansi') {
			return '<p>' +
		    'Instansi adalah nama instansi tujuan anda melakukan pengajuan'+
		    '</p>'
		} else if (nameForm == 'Tipe') {
			return '<p>' +
		    'Tipe adalah tipe dokumen untuk membedakan kategori akses kerahasian dari dokumen tersebut'+
		    '</p>'
		} else if (nameForm == 'Kepala Instansi') {
			return '<p>' +
		    'Kepala Instansi adalah nama orang yang menjabat atau atas nama yang menandatangani dokumen'+
		    '</p>'
		} else if (nameForm == 'Jabatan Kepala Instansi') {
			return '<p>' +
		    'Jabatan Kepala Instansi adalah jabatan orang yang menjabat sebagai kepala instansi/dinas'+
		    '</p>'
		} else if (nameForm == 'Aspek') {
			return '<p>' +
		    'Aspek berfungsi untuk menentukan kategori dokumen'+
		    '</p>'
		} else if (nameForm == 'Kategori') {
			return '<p>' +
		    'Kategori berfungsi untuk menentukan sub kategori dokumen'+
		    '</p>'
		} else if (nameForm == 'Sub Kategori') {
			return '<p>' +
		    'Sub Kategori berfungsi untuk menentukan sub sub kategori dokumen'+
		    '</p>'
		} else if (nameForm == 'Sub Sub Kategori') {
			return '<p>' +
		    'Sub Sub Kategori berfungsi untuk menentukan klasifikasi dokumen'+
		    '</p>'
		} else if (nameForm == 'Klasifikasi') {
			return '<p>' +
		    'Klasifikasi berfungsi sebagai pengelompokan dokumen anda, untuk mempermudah dalam pencarian'+
		    '</p>'
		} else if (nameForm == 'Judul') {
			return '<p>' +
		    'Judul adalah judul dari pengajuan dokumen anda'+
		    '</p>'
		} else if (nameForm == 'Nomor Dokumen') {
			return '<p>' +
		    'Nomor Dokumen adalah nomor yang dikeluarkan oleh instansi/dinas terkait'+
		    '</p>'
		} else if (nameForm == 'Deskripsi Dokumen') {
			return '<p>' +
		    'Deskripsi Dokumen adalah penjelasan lengkap tentang dokumen anda'+
		    '</p>'
		} else if (nameForm == 'Persyaratan') {
			return '<p>' +
		    'Persyaratan adalah berkas persyaratan dalam pengajuan dokumen anda'+
		    '</p>'
		} else if (nameForm == 'Biaya Pengajuan') {
			return '<p>' +
		    'Biaya Pengajuan adalah biaya estimasi pengajuan dokumen anda'+
		    '</p>'
		} else if (nameForm == 'Deskripsi Disposisi') {
			return '<p>' +
		    'Deskripsi Disposisi adalah penjelasan tentang surat tanda terima yang anda terima berkaitan dengan dokumen pengajuan anda'+
		    '</p>'
		} else if (nameForm == 'File Disposisi') {
			return '<p>' +
		    'File Disposisi adalah file PDF yang surat tanda terima anda'+
		    '</p>'
		} else if (nameForm == 'Download File Disposisi') {
			return '<p>' +
		    'Download File Disposisi adalah file PDF tanda surat terima anda'+
		    '</p>'
		} else if (nameForm == 'Notifikasi') {
			return '<p>' +
		    'Notifikasi adalah pemberitahuan informasi tentang proses pengajuan dokumen anda'+
		    '</p>'
		} else if (nameForm == 'File Dokumen') {
			return '<p>' +
		    'File Dokumen adalah file PDF dari dokumen anda yang telah terbit'+
		    '</p>'
		} else if (nameForm == 'Indeks Disposisi') {
			return '<p>' +
		    'Indeks Disposisi adalah nomor yang dikeluarkan oleh dinas.instansi terkait'+
		    '</p>'
		}
	}
</script>