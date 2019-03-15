<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:56
 */

class M_Dokumen extends CI_Model {

    private $PK = "idDokumen";
    private $Code_UNAUTHORIZED = '401';

    /*
     * Fungsi   :   getDokumen
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH[0] (Data dari database yang telah ditangkap)
     */
    public function getDokumen($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getDokumen("getAll");
        }
    }
    public function getDokumenExpired($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getAllExpired', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataBySite") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idPerusahaan'] = $_SESSION['idPerusahaan'];
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Dokumen/getDataBySiteExpired', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        else {
            self::getDokumen("getAll");
        }
    }
	
	public function getDokumenPerpanjangan($DATA_POST) {
		$parsedBody['idUser'] = encode_str($_SESSION['idUser']);
		$parsedBody['casenumberDokumen'] = isset($DATA_POST['casenumberDokumen']) ? $DATA_POST['casenumberDokumen'] : null;
		$parsedBody['judulDokumen'] = isset($DATA_POST['judulDokumen']) ? $DATA_POST['judulDokumen'] : null;
		$parsedBody['idPerusahaan'] = isset($DATA_POST['idPerusahaan']) ? $DATA_POST['idPerusahaan'] : null;
		$Fetch = $this->guzzle->API_Get('F_Dokumen/getDokumenPerpanjangan', $parsedBody);
		if ($Fetch == $this->Code_UNAUTHORIZED) {
			return $this->Code_UNAUTHORIZED;
		} if ($Fetch !== $this->Code_UNAUTHORIZED) {
			return $Fetch;
		}
	}

    public function ajaxSearchDokumen($judul,$casenumber,$lokasi,$groupID,$bulan,$tahun,$conditions){
        // $parsedBody['juduldokumen'] = $judul;
        $parsedBody['casenumber']   = isset($casenumber) ? $casenumber : null;
        $parsedBody['perusahaan']   = isset($lokasi) ? $lokasi : null;
        $parsedBody['bulan']        = isset($bulan) ? $bulan : null;
        $parsedBody['tahun']        = isset($tahun) ? $tahun : null;
        $parsedBody['groupid']      = isset($groupID) ? $groupID : null;
        $parsedBody['params']       = isset($judul) ? $judul: null;
        $parsedBody['idUser']       = encode_str($_SESSION['idUser']);
        $Fetch = $this->guzzle->API_Get('F_Dokumen/ajaxSearchDokumen', $parsedBody, false);
        if ($Fetch == $this->Code_UNAUTHORIZED) {
            return $this->Code_UNAUTHORIZED;
        } if ($Fetch !== $this->Code_UNAUTHORIZED) {
            return $Fetch;
        }
    }


}