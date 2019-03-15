<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/02/2019
 * Time: 16:30
 */

class M_Approve extends CI_Model {

    private $PK = 'idPengajuan';
    private $FALSE = 0;

    private function createSuratterima($DATA_POST) {
        $data = array(
            $this->PK => $DATA_POST[$this->PK],
            'createdBy' => $this->session->idUser,
            'createdDate' => date("Y-m-d h:i:s")
        );
        $Post = $this->guzzle->API_Post('F_Suratterima/post/', $data);
        return $Post->idST;
    }

     public function approvePengajuan($DATA_POST) {
        $idST = self::createSuratterima($DATA_POST);

        /**
         * Set N100 Terhadap idPengajuan menjadi True (Sudah Di Eksekusi)
         */
        $data = array(
            'idPengajuan' => $DATA_POST[$this->PK],
            'statusNotif' => true
        );
        $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $data);

        /**
         * Memberikan notifikasi kepada PIC yang bersangkutan
         */
        $this->notification->create($DATA_POST['idUser'], 'N104', $DATA_POST[$this->PK]);

        /**
         * Memberikan notifikasi estafet awal
         */
        if (isset($DATA_POST['Notif_idUser'])) {
            $this->notification->createMultiple($DATA_POST['Notif_idUser'], 'N401', $DATA_POST[$this->PK]);
        }

        $data = array(
            'idPengajuan' => $DATA_POST[$this->PK],
            'tgl_mulaiPengajuan' => formatTanggalProUI('/',$DATA_POST['tgl_mulaiPengajuan']),
            'tgl_selesaiPengajuan' => formatTanggalProUI('/',$DATA_POST['tgl_selesaiPengajuan']),
            'waktu_pengurusanPengajuan' => $DATA_POST['waktu_pengurusanPengajuan'],
            'idUser' => $DATA_POST['idUser'],
            'idUser_asal' => $DATA_POST['idUser'],
            'idST' => $idST,
            'approve_status' => true,
            'approve_createdby' => $this->session->idUser,
            'approve_createddate' => date("Y-m-d h:i:s"),
            'tombol_estafetPengajuan' => isset($DATA_POST['tombol_estafetPengajuan']) ? $DATA_POST['tombol_estafetPengajuan'] : null
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
        $RETURN_VALUE = array(
            "STATUS" => "Approve",
            "PESAN" => "Pengajuan ".$DATA_POST['namaJudul']." berhasil disetujui"
        );
        return $RETURN_VALUE;
    }

    public function declinePengajuan($DATA_POST) {
        /**
         * Apabila pengajuan di tolak maka semua notif akan
         * di set ke true
         * @var array
         */
        $dataNotif = array(
            'idPengajuan' => $DATA_POST[$this->PK],
            'statusNotif' => true
        );
        $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        $this->notification->create($DATA_POST['draft_createdby'], 'N101', $DATA_POST[$this->PK]);

        /**
         * Lalu selanjutnya akan dimasukkan keterangan
         * dan status dari submit dimundurkan ke draft
         * @var array
         */
        $data = array(
            'idPengajuan' => $DATA_POST[$this->PK],
            'ktrDecline' => $DATA_POST['ktrDecline'],
            'submit_status' => $this->FALSE
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
        $RETURN_VALUE = array(
            "STATUS" => "Decline",
            "PESAN" => "Pengajuan ".$DATA_POST['namaJudul']." berhasil ditolak"
        );
        return $RETURN_VALUE;
    }

    public function batalPengajuan($DATA_POST) {
        $id[$this->PK] = $DATA_POST[$this->PK];
        $this->guzzle->API_Delete('F_Notifikasi/deleteByPengajuan/', $id);
        $this->notification->create($DATA_POST['draft_createdby'], 'N103', $DATA_POST[$this->PK]);

        $data = array(
            'idPengajuan' => $DATA_POST[$this->PK],
            'submit_status' => $this->FALSE,
            'tolak_status' => true,
            'tolak_createdby' => $this->session->idUser,
            'tolak_createddate' => date("Y-m-d h:i:s"),
            'tolak_ktr' => $DATA_POST['tolak_ktr']
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
        $RETURN_VALUE = array(
            "STATUS" => "Batal",
            "PESAN" => "Pengajuan ".$DATA_POST['namaJudul']." berhasil dibatalkan"
        );
        return $RETURN_VALUE;
    }

}