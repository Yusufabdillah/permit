<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 11/03/2019
 * Time: 14.25
 */

class M_Notifikasi extends CI_Model {

	private $PK = 'idNotif';
	private $Code_UNAUTHORIZED = '401';

	public function getNotifikasi($Key = 'getAllByUser') {
		if ($Key == 'getAllByUser') {
			$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
			$Fetch = $this->guzzle->API_Get('F_Notifikasi/getAllByUser', $parsedBody);
			if ($Fetch == $this->Code_UNAUTHORIZED) {
				return $this->Code_UNAUTHORIZED;
			}
			if ($Fetch !== $this->Code_UNAUTHORIZED) {
				return $Fetch->data;
			}
		} if ($Key == 'getHitungNotif') {
			if (!isset($_SESSION['idUser'])) {
				return 0;
			} else if (isset($_SESSION['idUser'])) {
				$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
				$Fetch = $this->guzzle->API_Get('F_Notifikasi/getHitungNotif', $parsedBody);
				if ($Fetch == $this->Code_UNAUTHORIZED) {
					return $this->Code_UNAUTHORIZED;
				}
				if ($Fetch !== $this->Code_UNAUTHORIZED) {
					return $Fetch->data->idUser;
				}
			}
		} else {
			self::getNotifikasi('getAllByUser');
		}
	}

	public function updateNotifikasi($DATA_POST) {
		$data[$this->PK] = $DATA_POST[$this->PK];
		$data['statusNotif'] = true;
		$this->guzzle->API_Put('F_Notifikasi/put/', $data);

		/**
		 * Logika redirect
		 * terdapat perbedaan ketika N104 (Ke Form Disposisi) karena memakai idST sebagai PK
		 * sedangkan yang lain memakai idPengajuan sebagai PK
		 */
		if ($DATA_POST['idKode'] == 'N104') {
			$parsedBody['idPengajuan'] = $DATA_POST['idPengajuan'];
			$fetchST = $this->guzzle->API_Get('F_Notifikasi/getSuratTerima', $parsedBody)->data->idST;
			if ($DATA_POST['statusRedirect'] == true) {
				redirect($DATA_POST['controllerKode']."/".$DATA_POST['methodKode']."/".encode_str($fetchST));
			} else if ($DATA_POST['statusRedirect'] == false) {
				if (isset($DATA_POST['__PARAM_1'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']."/".$DATA_POST['__PARAM_1']);
				} else if (isset($DATA_POST['__PARAM_2'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']."/".$DATA_POST['__PARAM_1']."/".$DATA_POST['__PARAM_2']);
				} else if (!isset($DATA_POST['__PARAM_1']) AND !isset($DATA_POST['__PARAM_2'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']);
				}
			}
		} else if ($DATA_POST['idKode'] !== 'N104') {
			if ($DATA_POST['statusRedirect'] == true) {
				redirect($DATA_POST['controllerKode']."/".$DATA_POST['methodKode']."/".encode_str($DATA_POST['idPengajuan']));
			} else if ($DATA_POST['statusRedirect'] == false) {
				if (isset($DATA_POST['__PARAM_1'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']."/".$DATA_POST['__PARAM_1']);
				} else if (isset($DATA_POST['__PARAM_2'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']."/".$DATA_POST['__PARAM_1']."/".$DATA_POST['__PARAM_2']);
				} else if (!isset($DATA_POST['__PARAM_1']) AND !isset($DATA_POST['__PARAM_2'])) {
					redirect($DATA_POST['__CLASS']."/".$DATA_POST['__METHOD']);
				}
			}
		}
	}
}
