<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:01
 */

class F_Dokumen extends MY_Controller {

    private $VIEW_PATH = 'dokumen';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }

        $this->load->model(array(
            'M_Dokumen',
            'M_Referensi',
            'M_User'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Dokumen->getDokumen('cekKode');
        $data['get_dokumen'] = $this->M_Dokumen->getDokumen();
        $this->template->frontend($this->VIEW_PATH."/index", "Master Document", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idDokumen = null) {
        $data['get_user'] = $this->M_User->getUser('getDataByPerusahaan');
        $data['get_dokumen'] = $this->M_Dokumen->getDokumen("getDataByPK", null, null, decode_str($idDokumen));
        $data['get_geocoder'] = json_decode($data['get_dokumen']->geocoderDokumen);
        $this->template->frontend($this->VIEW_PATH."/form", "Detail Dokumen", $data);
    }

}