<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 06/02/2019
 * Time: 9:51
 */

class M_Pengajuan extends CI_Model
{

    private $PK = "idPengajuan";
    private $Code_UNAUTHORIZED = '401';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    /*
     * Fungsi   :   getPengajuan
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Read berbagai kondisi
     * Kondisi  :   Membatasi perintah Read berdasarkan value key
     * @param   :   $key, Default = getAll
     *              $kolom, Default = null
     *              $value_kolom, Default = null, $value_pk = null
     * $return  :   $FETCH (Data dari database yang telah ditangkap)
     */
    public function getPengajuan($key = "getAll", $kolom = null, $value_kolom = null, $value_pk = null, $json = false)
    {
        if ($key === "getAll") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === "getDraft") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getDraft', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === "getSubmit") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getSubmit', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === "getPending") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getPending', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === "getPosting") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getPosting', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === "getEstafet") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $parsedBody['idAkses'] = $_SESSION['idAkses'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getEstafet', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        }
        if ($key === 'cekKode') {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $parsedBody['idGrup'] = $_SESSION['idGrup'];
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getAll', $parsedBody, $json);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return 200;
            }
        }
        if ($key === "getDataByPK") {
            $parsedBody['idUser'] = encode_str($_SESSION['idUser']);
            $Fetch = $this->guzzle->API_Get('F_Pengajuan/getData/' . $value_pk, $parsedBody);
            if ($Fetch == $this->Code_UNAUTHORIZED) {
                return $this->Code_UNAUTHORIZED;
            }
            if ($Fetch !== $this->Code_UNAUTHORIZED) {
                return $Fetch;
            }
        } else {
            self::getPengajuan("getAll");
        }
    }

    public function savePengajuan($DATA_POST)
    {
        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!isset($DATA_POST['simpan'])) {
            if (!empty($DATA_POST[$this->PK])) {
                $dataNotif = array(
                    'idPengajuan' => $DATA_POST[$this->PK],
                    'statusNotif' => true
                );
                $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
            }
        }

        if (isset($DATA_POST['draft'])) {
            $data['draft_status'] = '1';
            $data['draft_createdby'] = $_SESSION['idUser'];
            $data['draft_createddate'] = date('Y-m-d H:i:s');

            $RETURN_VALUE = array(
                "STATUS" => "Draft",
                "PESAN" => "Pengajuan " . $DATA_POST['desk_judulPengajuan'] . " berhasil disimpan ke draft"
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

            if (isset($DATA_POST['statusOSSPengajuan'])) {
                $dataUserOSS = $this->M_User->getUser('getOSS');
                $this->notification->createOSS($dataUserOSS, 'N102', $DATA_POST[$this->PK]);
            }

            $RETURN_VALUE = array(
                "STATUS" => "Submit",
                "PESAN" => "Pengajuan " . $DATA_POST['desk_judulPengajuan'] . " menunggu persetujuan koordinator"
            );
        }

        if (isset($DATA_POST['simpan'])) {
            if (isset($DATA_POST['statusOSSPengajuan'])) {
                $dataUserOSS = $this->M_User->getUser('getOSS');
                $this->notification->createOSS($dataUserOSS, 'N102', $DATA_POST[$this->PK]);
            }

            $data['draft_createdby'] = $_SESSION['idUser'];
            $data['draft_createddate'] = date('Y-m-d H:i:s');
            $RETURN_VALUE = array(
                "STATUS" => "Simpan",
                "PESAN" => "Pengajuan " . $DATA_POST['desk_judulPengajuan'] . " berhasil disimpan"
            );
        }

        /**
         * Create pengajuan
         */
        if (!isset($DATA_POST[$this->PK])) {
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
        }

        /**
         * Update Pengajuan
         */
        if (isset($DATA_POST[$this->PK])) {
            $data[$this->PK] = $DATA_POST[$this->PK];
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
        }

        return $RETURN_VALUE;
    }

    /*
     * Fungsi   :   deletePengajuan
     * Tipe     :   Public
     * Tujuan   :   Untuk melakukan Delete
     * Kondisi  :   Jika data kosong STATUS = Error
     *              Jika data berisi dan berisi PK maka STATUS = Delete
     * @param   :   $DATA_POST, Default = null
     * $return  :   $RETURN_VALUE
     *
     * Note     :   $DATA_POST wajib berisi Primary Key dan Nama Pengajuan
     */
    public function deletePengajuan($DATA_POST = null)
    {
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
        }
        if (isset($DATA_POST)) {
            /*
             * Delete data pengajuan
             */
            $id[$this->PK] = $DATA_POST[$this->PK];
            $this->guzzle->API_Delete('F_Pengajuan/delete/', $id);

            $RETURN_VALUE = array(
                "STATUS" => "Delete",
                "PESAN" => "Draft Pengajuan " . $DATA_POST['namaJudul'] . " berhasil dihapus"
            );
            return $RETURN_VALUE;
        }
    }

    public function pendingPengajuan($DATA_POST)
    {
        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!empty($DATA_POST[$this->PK])) {
            $dataNotif = array(
                'idPengajuan' => $DATA_POST[$this->PK],
                'statusNotif' => true
            );
            $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        }

        /**
         * Buat Notifikasi untuk koordinator yang menyetujui
         */
        $this->notification->create($DATA_POST['approve_createdby'], 'N201', $DATA_POST[$this->PK]);

        $data = array(
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'pending_status' => true,
            'pending_createdby' => $this->session->idUser,
            'pending_createddate' => date('Y-m-d H:i:s'),
            'pending_ktr' => $DATA_POST['pending_ktr']
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);

        $STATUS_MODEL = array(
            "STATUS" => "Update",
            "PESAN" => "Berhasil pending pengajuan $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;

    }

    public function aktifkanPengajuan($DATA_POST)
    {
        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!empty($DATA_POST[$this->PK])) {
            $dataNotif = array(
                'idPengajuan' => $DATA_POST[$this->PK],
                'statusNotif' => true
            );
            $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        }

        /**
         * Buat Notifikasi untuk koordinator yang menyetujui
         */
        $this->notification->create($DATA_POST['approve_createdby'], 'N202', $DATA_POST[$this->PK]);

        $data = array(
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'pending_status' => false,
            'pending_createdby' => $this->session->idUser,
            'pending_createddate' => date('Y-m-d H:i:s'),
            'pending_ktr' => $DATA_POST['pending_ktr']
        );
        $this->guzzle->API_Put('F_Pengajuan/put/', $data);

        $STATUS_MODEL = array(
            "STATUS" => "Update",
            "PESAN" => "Berhasil aktifkan pengajuan $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;

    }

    public function postingPengajuan($DATA_POST)
    {
        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!empty($DATA_POST[$this->PK])) {
            $dataNotif = array(
                'idPengajuan' => $DATA_POST[$this->PK],
                'statusNotif' => true
            );
            $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        }

        /**
         * Buat Notifikasi untuk koordinator yang menyetujui
         */
        $idUser = array(
            $DATA_POST['approve_createdby'],
            $DATA_POST['draft_createdby']
        );
        $this->notification->createMultiple($idUser, 'N300', $DATA_POST[$this->PK]);

        /**
         * Proses Upload Codeigniter =======================================
         */
        $config['file_name'] = 'Dokumen(' . $DATA_POST['idPengajuan'] . ")(" . $DATA_POST['singkatanPerusahaan'] . ')(' . $DATA_POST['namaJudul'] . ')(' . rand(0, 10000) . ')';
        $config['upload_path'] = "assets/data_uploads/(" . $DATA_POST['idPerusahaan'] . ")" . $DATA_POST['singkatanPerusahaan'] . "/Dokumen";
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|csv';
        $config['max_size'] = 100000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileDokumen')) {
            $file = $DATA_POST['fileDokumen'];
        } else {
            $file = $this->upload->data('file_name');
        }
        //===================================================================

        $data = array(
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'idKelurahan' => $DATA_POST['idKelurahan'],
            'idPerusahaan' => $DATA_POST['idPerusahaan'],
            'idInstansi' => $DATA_POST['idInstansi'],
            'idJudul' => $DATA_POST['idJudul'],
            'idTipe' => $DATA_POST['idTipe'],
            'desk_judulDokumen' => $DATA_POST['desk_judulDokumen'],
            'exp_selamanyaDokumen' => isset($DATA_POST['exp_selamanyaDokumen']) ? $DATA_POST['exp_selamanyaDokumen'] : null,
            'jbt_kpl_instansiDokumen' => $DATA_POST['jbt_kpl_instansiDokumen'],
            'nomorDokumen' => $DATA_POST['nomorDokumen'],
            'kpl_instansiDokumen' => $DATA_POST['kpl_instansiDokumen'],
            'tgl_mulai_berlakuDokumen' => isset($DATA_POST['tgl_mulai_berlakuDokumen']) ? formatTanggalProUI("/", $DATA_POST['tgl_mulai_berlakuDokumen']) : null,
            'tgl_habis_berlakuDokumen' => isset($DATA_POST['tgl_habis_berlakuDokumen']) ? formatTanggalProUI("/", $DATA_POST['tgl_habis_berlakuDokumen']) : null,
            'rentang_hari_berlakuDokumen' => isset($DATA_POST['rentang_hari_berlakuDokumen']) ? $DATA_POST['rentang_hari_berlakuDokumen'] : null,
            'deskripsiDokumen' => $DATA_POST['deskripsiDokumen'],
            'casenumberDokumen' => caseNumber($DATA_POST['singkatanPerusahaan'], '01'),
            'mulai_reminderDokumen' => isset($DATA_POST['mulai_reminderDokumen']) ? formatTanggalProUI('/', $DATA_POST['mulai_reminderDokumen']) : null,
            'harike_reminderDokumen' => isset($DATA_POST['harike_reminderDokumen']) ? $DATA_POST['harike_reminderDokumen'] : null,
            'geocoderDokumen' => $DATA_POST['geocoderDokumen'],
            'fileDokumen' => $file
        );

        $this->guzzle->API_Post('F_Dokumen/post/', $data);
        self::updateStatusDokumen($DATA_POST['idPengajuan']);

        $STATUS_MODEL = array(
            "STATUS" => "Posting",
            "PESAN" => "Berhasil membuat dokumen berjudul $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;

    }

    private function updateStatusDokumen($idPengajuan)
    {
        $data['idPengajuan'] = $idPengajuan;
        $data['dokumen_status'] = '1';
        $data['dokumen_createdby'] = $this->session->idUser;
        $data['dokumen_createddate'] = date('Y-m-d H:i:s');

        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
    }

    public function estafetPengajuan($DATA_POST, $FILES)
    {
        /**
         * Set Semua notifikasi menjadi True (Reset Notif)
         */
        if (!empty($DATA_POST[$this->PK])) {
            $dataNotif = array(
                'idPengajuan' => $DATA_POST[$this->PK],
                'statusNotif' => true
            );
            $this->guzzle->API_Put('F_Notifikasi/putByPengajuan/', $dataNotif);
        }

        $dataKoorPerusahaan = $this->M_User->getUser('getKoordinatorPerusahaan', null, null, $DATA_POST['idPerusahaan_EST']);
        $this->notification->createEstafet($dataKoorPerusahaan, 'N400', $DATA_POST[$this->PK]);

        if (!empty($FILES['filePengajuan']['name'])) {
            /**
             * Proses Upload Codeigniter =======================================
             */
            $config['file_name'] = 'Pengajuan_Estafet(' . $DATA_POST['idPengajuan'] . ")(" . $DATA_POST['singkatanPerusahaan'] . ')(' . $DATA_POST['namaJudul'] . ')(' . rand(0, 10000) . ')';
            $config['upload_path'] = "assets/data_uploads/(" . $DATA_POST['idPerusahaan'] . ")" . $DATA_POST['singkatanPerusahaan'] . "/Pengajuan_Estafet";
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc|csv';
            $config['max_size'] = 100000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('filePengajuan')) {
                $file = $DATA_POST['filePengajuan'];
            } else {
                $file = $this->upload->data('file_name');
            }
            //===================================================================
        }

        $historyEstafet = array(
            'idInstansi' => $DATA_POST['idInstansi'],
            'idTipe' => $DATA_POST['idTipe'],
            'idUser' => $DATA_POST['idUser'],
            'idKelurahan' => $DATA_POST['idKelurahan'],
            'idPerusahaan' => $DATA_POST['idPerusahaan'],
            'idPerusahaan_asal' => $DATA_POST['idPerusahaan_asal'],
            'idCurrency' => $DATA_POST['idCurrency'],
            'idJudul' => $DATA_POST['idJudul'],
            'kpl_instansiPengajuan' => $DATA_POST['kpl_instansiPengajuan'],
            'jbt_kpl_insPengajuan' => $DATA_POST['jbt_kpl_insPengajuan'],
            'desk_judulPengajuan' => $DATA_POST['desk_judulPengajuan'],
            'nomorPengajuan' => $DATA_POST['nomorPengajuan'],
            'tgl_mulaiPengajuan' => $DATA_POST['tgl_mulaiPengajuan'],
            'tgl_selesaiPengajuan' => $DATA_POST['tgl_selesaiPengajuan'],
            'waktu_pengurusanPengajuan' => $DATA_POST['waktu_pengurusanPengajuan'],
            'biayaPengajuan' => $DATA_POST['biayaPengajuan'],
            'kurs_biayaPengajuan' => $DATA_POST['kurs_biayaPengajuan'],
            'persyaratanPengajuan' => $DATA_POST['persyaratanPengajuan'],
            'deskripsiPengajuan' => $DATA_POST['deskripsiPengajuan'],
            'idST' => $DATA_POST['idST'],
            'statusOSSPengajuan' => $DATA_POST['statusOSSPengajuan'],
            'draft_createdby' => $DATA_POST['draft_createdby'],
            'submit_createdby' => $DATA_POST['submit_createdby'],
            'approve_createdby' => $DATA_POST['approve_createdby'],
            'pending_createdby' => $DATA_POST['pending_createdby'],
            'srtterima_createdby' => $DATA_POST['srtterima_createdby'],
            'filePengajuan' => isset($file) ? $file : null
        );

        $data = array(
            'idPerusahaan' => $DATA_POST['idPerusahaan_EST'],
            'idPengajuan' => $DATA_POST['idPengajuan'],
            'historyEstafet' => json_encode($historyEstafet),
            'statusEstafet' => 0,
            'createdBy' => $this->session->idUser,
            'createdDate' => date('Y-m-d H:i:s')
        );

        $Post = $this->guzzle->API_Post('F_Estafet/post/', $data);
        self::setStatusEstafet($Post->idEstafet, $DATA_POST['idPerusahaan_EST'], $DATA_POST['idPengajuan']);

        $STATUS_MODEL = array(
            "STATUS" => "Estafet",
            "PESAN" => "Berhasil estafet dokumen berjudul $DATA_POST[namaJudul]"
        );
        return $STATUS_MODEL;
    }

    private function setStatusEstafet($idEstafet, $idPerusahaan, $idPengajuan) {
        $data['idPengajuan'] = $idPengajuan;
        $data['idPerusahaan'] = $idPerusahaan;
        $data['ktrDecline_estafet'] = null;
        $data['idEstafet'] = $idEstafet;
        $data['draft_status'] = '1';
        $data['draft_createdby'] = $_SESSION['idUser'];
        $data['draft_createddate'] = date('Y-m-d H:i:s');
        $data['estafet_status'] = true;
        $data['estafet_createdby'] = $_SESSION['idUser'];
        $data['estafet_createddate'] = date('Y-m-d H:i:s');

        $this->guzzle->API_Put('F_Pengajuan/put/', $data);
    }

}
