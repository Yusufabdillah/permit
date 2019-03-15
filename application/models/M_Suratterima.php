<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 9:51
 */

class M_Suratterima extends CI_Model {

    private $PK = "idST";
    private $Code_UNAUTHORIZED = '401';
    /*
     * Fungsi   :   getSuratterima
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH (Data dari database yang telah ditangkap)
     */
    public function getSuratterima($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false) {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Suratterima/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Suratterima/getData/'.$value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } if ($key === "getDataByPerusahaan") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idPerusahaan'] = $this->session->idPerusahaan;
            $Fetch = $this->guzzle->API_Get('F_Suratterima/getByPerusahaan', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            } if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getSuratterima("getAll");
        }
    }

    public function saveSuratterima($DATA_POST, $inDB) {
        /*
         * Proses Upload Codeigniter =======================================
         */
        $config['file_name']            = 'Surat_Terima('.$inDB->idST.")(".$inDB->singkatanPerusahaan.')('.$inDB->namaJudul.')('.rand(0,10000).')';
        $config['upload_path']          = "assets/data_uploads/($inDB->idPerusahaan)$inDB->singkatanPerusahaan/Surat_Terima";
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|csv';
        $config['max_size']             = 100000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileST')) {
            $file = $inDB->fileST;
        } else {
            if ($inDB->fileST !== null) {
                unlink("assets/data_uploads/($inDB->idPerusahaan)$inDB->singkatanPerusahaan/Surat_Terima/".$inDB->fileST);
            }
            $file = $this->upload->data('file_name');
        }
        //===================================================================


        /**
         * Update Suratterima
         */
        $data[$this->PK] = $DATA_POST[$this->PK];
        $data['ktrST'] = $DATA_POST['ktrST'];
        $data['indeksST'] = $DATA_POST['indeksST'];
        $data['deskripsiST'] = $DATA_POST['deskripsiST'];
        $data['fileST'] = $file;
        $data['updatedBy'] = $this->session->idUser;
        $data['updatedDate'] = date("Y-m-d h:i:s");

        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!empty($inDB->idPengajuan)) {
            $dataNotif = array(
                'idPengajuan' => $inDB->idPengajuan,
                'statusNotif' => true
            );
            $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        }

        /**
         * Buat Notifikasi untuk koordinator yang menyetujui
         */
        $this->notification->create($DATA_POST['approve_createdby'], 'N200', $inDB->idPengajuan);

        $this->guzzle->API_Put('F_Suratterima/put/', $data);
        self::updatePengajuanST($inDB->idPengajuan);

        $RETURN_VALUE = array(
            "STATUS" => "Update",
            "PESAN" => "Surat Terima ".$DATA_POST['namaJudul']." berhasil dibuat"
        );

        return $RETURN_VALUE;
    }

    private function updatePengajuanST($idPengajuan) {
        $data = array(
            'idPengajuan' => $idPengajuan,
            'srtterima_status' => true,
            'srtterima_createdby' => $this->session->idUser,
            'srtterima_createddate' => date('Y-m-d H:i:s'),
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
    }

    /*
     * Fungsi   :   deleteSuratterima
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Suratterima
     */
    public function deleteSuratterima($DATA_POST = null) {
        /*
         * Bila $DATA_POST kosong maka akan mengembalikan data ke
         * controller dengan isi pesan pada $RETURN_VALUE
         * Bertujuan untuk pengecekan data.
         */
        if (empty($DATA_POST)) {
            $RETURN_VALUE = array(
                "STATUS" => "Error",
                "PESAN" => "Sorry... process unsuccessfuly, because something error."
            );
            return $RETURN_VALUE;
        } if (isset($DATA_POST)) {
            /*
             * Delete data suratterima
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('F_Suratterima/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Surat Terima ".$DATA_POST['namaJudul']." berhasil dihapus"
            );
            return $RETURN_VALUE;
        }
    }

}