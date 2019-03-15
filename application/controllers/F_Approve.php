<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 8:29
 */

class F_Approve extends MY_Controller {

    private $VIEW_PATH = 'approve';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Pengajuan',
            'M_Referensi',
            'M_Approve',
            'M_User'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Pengajuan->getPengajuan('cekKode');
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan('getSubmit');
        $data['get_user'] = $this->M_User->getUser('getDataByPerusahaan');
        $this->template->frontend($this->VIEW_PATH."/index", "Aprroval", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idPengajuan = null) {
        $data['get_user'] = $this->M_User->getUser('getDataByPerusahaan');
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan("getDataByPK", null, null, decode_str($idPengajuan));
        $data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
        $data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);
        $this->template->frontend($this->VIEW_PATH."/form", "Approve Pengajuan", $data);
    }

    public function approvePengajuan() {
        $RETURN_MODEL = $this->M_Approve->approvePengajuan($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function declinePengajuan() {
        $RETURN_MODEL = $this->M_Approve->declinePengajuan($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function batalPengajuan() {
        $RETURN_MODEL = $this->M_Approve->batalPengajuan($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function AJAX()
    {
        $Fungsi = $this->input->post('fungsi');
        if ($Fungsi == 'toEstafetNotif') {
            $data['status'] = $this->input->post('status');
            if ($data['status'] == 'aktif') {
                $data['get_koordinator'] = $this->M_User->getUser('getKoordinator');
            }
            $this->load->view('frontend/approve/ajax_view/notifikasi', $data);
        }
    }

}