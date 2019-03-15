<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/02/2019
 * Time: 16:30
 */

class M_Estafet extends CI_Model {

    private $PK = "idEstafet";
    private $Code_UNAUTHORIZED = '401';
    private $URI = 'F_Estafet';

    public function getEstafet($key = "getByPengajuan", $idPengajuan = null , $idEstafet = null)
    {
        if ($key === "getByPengajuan") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idPengajuan'] = $idPengajuan;
            $Fetch = $this->guzzle->API_Get($this->URI.'/getByPengajuan', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch->data;
            }
        }
        if ($key === "getDataHistory") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody[$this->PK] = $idEstafet;
            $Fetch = $this->guzzle->API_Get($this->URI.'/getDataHistory', $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch->data;
            }
        } else {
            self::getEstafet("getByPengajuan");
        }
    }

    public function approveEstafet($DATA_POST) {
        $DataNotif = array(
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'statusNotif' => true
        );
        $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $DataNotif);
        $this->notification->create($DATA_POST['approve_createdby'], 'N403', $DATA_POST['idPengajuan']);
        $this->notification->create($DATA_POST['idUser'], 'N404', $DATA_POST['idPengajuan']);

        $data['idEstafet'] = $DATA_POST['idEstafet'];
        $data['statusEstafet'] = true;

        $this->guzzle->API_Put('F_Estafet/put/', $data);
        self::updateStatusPengajuan($DATA_POST['idPengajuan'] ,$DATA_POST['idUser']);

        $STATUS_MODEL = array(
            "STATUS" => "Approve",
            "PESAN" => "Berhasil menyetujui dokumen berjudul $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;
    }

    private function updateStatusPengajuan($idPengajuan, $idUser) {
        /**
         * Mereset kembali status data
         * Data sebelumnya sudah di simpan pada tabel history (tblmst_estafet) dengan tipe JSON
         */
        $data['idPengajuan'] = $idPengajuan;
        $data['idUser'] = $idUser;
        $data['idUser_asal'] = $idUser;
        $data['draft_status'] = 1;
        $data['draft_createdby'] = $idUser;
        $data['draft_createddate'] = date('Y-m-d H:i:s');
        $data['srtterima_status'] = '0';
        $data['srtterima_createdby'] = "";
        $data['srtterima_createddate'] = "";
        $data['pending_status'] = '0';
        $data['pending_createdby'] = "";
        $data['pending_createddate'] = "";
        $data['approve_status'] = '0';
        $data['approve_createdby'] = "";
        $data['approve_createddate'] = "";
        $data['submit_status'] = '0';
        $data['submit_createdby'] = "";
        $data['submit_createddate'] = "";
        $data['estafet_status'] = '0';
        $data['estafet_createdby'] = "";
        $data['estafet_createddate'] = "";

        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
    }

    public function declineEstafet($DATA_POST) {
        $data = array(
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'statusNotif' => true
        );
        $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $data);
        $this->notification->create($DATA_POST['approve_createdby'], 'N402', $DATA_POST['idPengajuan']);
        
        $data['idPengajuan'] = $DATA_POST['idPengajuan'];
        $data['idPerusahaan'] = $DATA_POST['idPerusahaan'];
        $data['ktrDecline_estafet'] = $DATA_POST['ktrDecline_estafet'];

        $this->guzzle->API_Put('F_Pengajuan/declineEstafet/', $data);
        $STATUS_MODEL = array(
            "STATUS" => "Decline",
            "PESAN" => "Berhasil menolak dokumen berjudul $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;
    }

}