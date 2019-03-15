<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 8:29
 */

class F_Suratterima extends MY_Controller {

    private $VIEW_PATH = 'surat_terima';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Suratterima',
            'M_Pengajuan'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Suratterima->getSuratterima('cekKode');
        $data['get_suratterima'] = $this->M_Suratterima->getSuratterima('getDataByPerusahaan');
        $this->template->frontend($this->VIEW_PATH."/index", "Surat Terima", $data);
    }

    public function coba()
    {
        echo decode_str('DsSGdXhg0O1BAYX2Ypf5w70794RW4_Wtudg7r-QNygI');
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idST = null) {
        $data['get_suratterima'] = $this->M_Suratterima->getSuratterima("getDataByPK", null, null, decode_str($idST));
        $this->template->frontend($this->VIEW_PATH."/form", "Update Surat Terima", $data);
    }

    public function saveSuratterima() {
        $inDB = $this->M_Suratterima->getSuratterima("getDataByPK", null, null, $_POST['idST']);
        $RETURN_MODEL = $this->M_Suratterima->saveSuratterima($_POST, $inDB);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function deleteSuratterima() {
        $RETURN_MODEL = $this->M_Suratterima->deleteSuratterima($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function pendingPengajuan() {
        $RETURN_MODEL = $this->M_Pengajuan->pendingPengajuan($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

}