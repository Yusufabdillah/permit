<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 04/03/2019
 * Time: 15.47
 */

class M_Perpanjangan extends CI_Model {

	private $PK = "idPengajuan";
	private $Code_UNAUTHORIZED = '401';

	/*
     * Fungsi   :   getPerpanjangan
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
	public function getPerpanjangan($key = "cekDokumenPerpanjangan", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
		if ($key === "cekDokumenPerpanjangan") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Perpanjangan/cekDokumenPerpanjangan', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			} if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} if ($key === "getDraft") {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$parsedBody['idPerusahaan'] = $_SESSION['idPerusahaan'];
			$Fetch = $this->guzzle->API_Get('F_Perpanjangan/getDraft', $parsedBody, $json);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch;
			}
		} else {
			self::getPerpanjangan("cekDokumenPerpanjangan");
		}
	}

	public function savePerpanjangan($DATA_POST) {
		if (isset($DATA_POST['draft'])) {
			$data['draft_status'] = '1';
			$data['draft_createdby'] = $_SESSION['idUser'];
			$data['draft_createddate'] = date('Y-m-d H:i:s');

			$RETURN_VALUE = array(
				"STATUS" => "Draft",
				"PESAN" => "Perpanjangan " . $DATA_POST['desk_judulPengajuan'] . " berhasil disimpan ke draft"
			);
		}

		if (isset($DATA_POST['submit'])) {
			/**
			 * Jika officer langsung menekan tombol submit tanpa draft
			 * maka sistem akan menset langsung draft ke status true
			 * dan menset data jejak user ke session yang aktif
			 */
			if (!empty($DATA_POST['draft_createdby'])) {
				$data['draft_status'] = '1';
				$data['draft_createdby'] = $DATA_POST['draft_createdby'];
				$data['draft_createddate'] = $DATA_POST['draft_createddate'];
			} else {
				$data['draft_status'] = '1';
				$data['draft_createdby'] = $_SESSION['idUser'];
				$data['draft_createddate'] = date('Y-m-d H:i:s');
			}
			$data['submit_status'] = '1';
			$data['submit_createdby'] = $_SESSION['idUser'];
			$data['submit_createddate'] = date('Y-m-d H:i:s');

			$RETURN_VALUE = array(
				"STATUS" => "Submit",
				"PESAN" => "Perpanjangan " . $DATA_POST['desk_judulPengajuan'] . " menunggu persetujuan koordinator"
			);
		}

		/**
		 * Create pengajuan
		 */
		if (!isset($DATA_POST[$this->PK])) {
			$data['idPengajuan_renewal'] = $DATA_POST['idPengajuan_renewal'];
			$data['idKlasifikasi'] = $DATA_POST['idKlasifikasi'];
			$data['idInstansi'] = $DATA_POST['idInstansi'];
			$data['idPerusahaan'] = $DATA_POST['idPerusahaan'];
			$data['idPerusahaan_asal'] = $DATA_POST['idPerusahaan'];
			$data['idTipe'] = $DATA_POST['idTipe'];
			$data['idKelurahan'] = $DATA_POST['idKelurahan'];
			$data['idCurrency'] = $DATA_POST['idCurrency'];
			$data['idJudul'] = $DATA_POST['idJudul'];
			$data['kpl_instansiPengajuan'] = $DATA_POST['kpl_instansiPengajuan'];
			$data['jbt_kpl_insPengajuan'] = $DATA_POST['jbt_kpl_insPengajuan'];
			$data['desk_judulPengajuan'] = $DATA_POST['desk_judulPengajuan'];
			$data['nomorPengajuan'] = $DATA_POST['nomorPengajuan'];
			$data['biayaPengajuan'] = $DATA_POST['biayaPengajuan'];
			$data['kurs_biayaPengajuan'] = $DATA_POST['kurs_biayaPengajuan'];
			$data['persyaratanPengajuan'] = isset($DATA_POST['persyaratanPengajuan']) ? json_encode($DATA_POST['persyaratanPengajuan']) : null;
			$data['deskripsiPengajuan'] = $DATA_POST['deskripsiPengajuan'];
			$data['statusOSSPengajuan'] = isset($DATA_POST['statusOSSPengajuan']) ? 1 : 0;
			$data['ktrDecline'] = '';

			$Post = $this->guzzle->API_Post('F_Pengajuan/post/', $data);
			$RETURN_VALUE['PK'] = encode_str($Post->idPengajuan);
			$RETURN_VALUE['PK_renewal'] = encode_str($DATA_POST['idPengajuan_renewal']);
		}

		/**
		 * Update Pengajuan
		 */
		if (isset($DATA_POST[$this->PK])) {
			$data[$this->PK] = $DATA_POST[$this->PK];
			$data['idPengajuan_renewal'] = $DATA_POST['idPengajuan_renewal'];
			$data['idKlasifikasi'] = $DATA_POST['idKlasifikasi'];
			$data['idInstansi'] = $DATA_POST['idInstansi'];
			$data['idPerusahaan'] = $DATA_POST['idPerusahaan'];
			$data['idPerusahaan_asal'] = $DATA_POST['idPerusahaan'];
			$data['idTipe'] = $DATA_POST['idTipe'];
			$data['idKelurahan'] = $DATA_POST['idKelurahan'];
			$data['idCurrency'] = $DATA_POST['idCurrency'];
			$data['idJudul'] = $DATA_POST['idJudul'];
			$data['kpl_instansiPengajuan'] = $DATA_POST['kpl_instansiPengajuan'];
			$data['jbt_kpl_insPengajuan'] = $DATA_POST['jbt_kpl_insPengajuan'];
			$data['desk_judulPengajuan'] = $DATA_POST['desk_judulPengajuan'];
			$data['nomorPengajuan'] = $DATA_POST['nomorPengajuan'];
			$data['biayaPengajuan'] = $DATA_POST['biayaPengajuan'];
			$data['kurs_biayaPengajuan'] = $DATA_POST['kurs_biayaPengajuan'];
			$data['persyaratanPengajuan'] = isset($DATA_POST['persyaratanPengajuan']) ? json_encode($DATA_POST['persyaratanPengajuan']) : null;
			$data['deskripsiPengajuan'] = $DATA_POST['deskripsiPengajuan'];
			$data['statusOSSPengajuan'] = isset($DATA_POST['statusOSSPengajuan']) ? 1 : 0;
			$data['ktrDecline'] = '';

			if (isset($DATA_POST['Notif_idUser'])) {
				$this->notification->createMultiple($DATA_POST['Notif_idUser'], 'N100', $DATA_POST[$this->PK]);
			}

			$this->guzzle->API_Put('F_Pengajuan/put/', $data);
			$RETURN_VALUE['PK'] = encode_str($DATA_POST[$this->PK]);
			$RETURN_VALUE['PK_renewal'] = encode_str($DATA_POST['idPengajuan_renewal']);
		}

		return $RETURN_VALUE;
	}

}
