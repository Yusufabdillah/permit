<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 8:29
 */

class F_Posting extends MY_Controller {

    private $VIEW_PATH = 'posting';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Dokumen',
            'M_Pengajuan',
            'M_Perusahaan',
            'M_Referensi',
            'M_Provinsi',
            'M_Kota',
            'M_Kecamatan',
            'M_Kelurahan',
            'M_Negara'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Pengajuan->getPengajuan('cekKode');
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan('getPosting');
        $this->template->frontend($this->VIEW_PATH."/index", "Pengajuan", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idPengajuan = null) {
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan("getDataByPK", null, null, decode_str($idPengajuan));
        $data['get_negara'] = $this->M_Negara->getNegara("getAll", null, null, null, false);
        $data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
        $data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);
        $this->template->frontend($this->VIEW_PATH."/form", "Approve Pengajuan", $data);
    }

    public function postingPengajuan() {
        if (isset($_POST['Posting'])) {
            $RETURN_MODEL = $this->M_Pengajuan->postingPengajuan($_POST);
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        } else if (isset($_POST['Estafet'])) {
            $RETURN_MODEL = $this->M_Pengajuan->estafetPengajuan($_POST, $_FILES);
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    public function AJAX() {
        $Fungsi = $this->input->post('fungsi');
        if ($Fungsi == 'toMasaBerlaku') {
            $data['status'] = $this->input->post('status');
            $this->load->view('frontend/posting/ajax_view/tgl_berlaku', $data);
        }

        /**
         * Untuk data wilayah dokumen
         */
        if ($Fungsi == 'toProvinsi') {
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getDataByNegara', null, null, $_POST['idNegara']);
            $this->load->view('frontend/posting/ajax_view/provinsi',$data);
        } if ($Fungsi == 'toKota') {
            $data['get_kota'] = $this->M_Kota->getKota('getDataByProvinsi', null, null, $_POST['idProvinsi']);
            $this->load->view('frontend/posting/ajax_view/kota',$data);
        } if ($Fungsi == 'toKecamatan') {
            $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('getDataByKota', null, null, $_POST['idKota']);
            $this->load->view('frontend/posting/ajax_view/kecamatan',$data);
        } if ($Fungsi == 'toKelurahan') {
            $data['get_kelurahan'] = $this->M_Kelurahan->getKelurahan('getDataByKecamatan', null, null, $_POST['idKecamatan']);
            $this->load->view('frontend/posting/ajax_view/kelurahan',$data);
        }
        
        /**
         * Untuk data site
         */
        if ($Fungsi == 'toPerusahaan') {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getDataByKecamatan', null, null, $_POST['idKecamatan']);
            $this->load->view('frontend/pengajuan/ajax_view/perusahaan',$data);
        }
    }

}