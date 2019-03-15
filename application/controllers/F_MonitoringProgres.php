<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 9:51
 */

class F_MonitoringProgres extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('idUser')) {
			redirect('Auth/index');
		}
	}

	protected function load_models()
	{
		$this->load->model(array(
			'M_Pengajuan',
			'M_Estafet',
			'M_Kelurahan',
			'M_Perusahaan',
			'M_Instansi',
			'M_Tipe',
			'M_Judul',
			'M_Referensi'
		));
	}

	function index()
	{
		$data['get_data'] = $this->M_Pengajuan->getPengajuan();
		$this->template->frontend('monitoring_progres/index', 'Monitoring Progres Permit', $data);
	}

	function detail($idPengajuan) {
		$data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan("getDataByPK", null, null, decode_str($idPengajuan));
		$data['get_history'] = $this->M_Estafet->getEstafet('getByPengajuan', decode_str($idPengajuan));

		/**
		 * Referensi Pengajuan by judul
		 */
		$data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
		$data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);
		$this->template->frontend('monitoring_progres/detail', 'Progres Pengajuan', $data);
	}

	function detailHistory($idEstafet, $idPengajuan) {
		$data['get_pengajuan'] = $this->M_Estafet->getEstafet('getDataHistory', null, decode_str($idEstafet));
		$data['get_idPengajuan'] = decode_str($idPengajuan);
		/**
		 * Data wilayah indonesia
		 */
		$dataWilayah = $this->M_Kelurahan->getKelurahan('getDataByPK', NULL, NULL, $data['get_pengajuan']->idKelurahan, false);
		$data['get_negara'] = $dataWilayah->namaNegara;
		$data['get_provinsi'] = $dataWilayah->namaProvinsi;
		$data['get_kota'] = $dataWilayah->namaKota;
		$data['get_kecamatan'] = $dataWilayah->namaKecamatan;
		$data['get_kelurahan'] = $dataWilayah->namaKelurahan;

		$dataPerusahaan = $this->M_Perusahaan->getPerusahaan('getDataByPK', NULL, NULL, $data['get_pengajuan']->idPerusahaan, false);
		$data['get_perusahaan'] = $dataPerusahaan->namaPerusahaan." di ".$dataPerusahaan->lokasiPerusahaan;

		$dataInstansi = $this->M_Instansi->getInstansi('getDataByPK', NULL, NULL, $data['get_pengajuan']->idInstansi, false);
		$data['get_instansi'] = $dataInstansi->namaInstansi.' di '.$dataInstansi->namaKota;

		$data['get_tipe'] = $this->M_Tipe->getTipe('getDataByPK', NULL, NULL, $data['get_pengajuan']->idTipe, false)->namaTipe;


		$dataJudul = $this->M_Judul->getJudul('getDataByPK', NULL, NULL, $data['get_pengajuan']->idJudul, false);
		$data['get_aspek'] = $dataJudul->namaAspek;
		$data['get_kategori'] = $dataJudul->namaKategori;
		$data['get_subk'] = $dataJudul->namaSubk;
		$data['get_sub_subk'] = $dataJudul->namaSub_subk;
		$data['get_klasifikasi'] = $dataJudul->namaKlasifikasi;
		$data['get_judul'] = $dataJudul->namaJudul;

		/**
		 * Referensi Pengajuan by judul
		 */
		$data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
		$data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);
		$this->template->frontend('monitoring_progres/detail_history', 'History Pengajuan', $data);
	}

}
