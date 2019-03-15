<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 13:31
 */

class B_Klasifikasi extends MY_Controller {

    private $VIEW_PATH = 'klasifikasi';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Klasifikasi','M_SSKategori'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Classification", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idKlasifikasi = null) {
        if (empty($idKlasifikasi)) {
            $data['get_subSubk'] = $this->M_SSKategori->getSSKategori('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Classification", $data);
        } if (!empty($idKlasifikasi)) {
            $data['get_subSubk'] = $this->M_SSKategori->getSSKategori('getAll', NULL, NULL, NULL, false);
            $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi("getDataByPK", null, null, decode_str($idKlasifikasi));
            $this->template->backend($this->VIEW_PATH."/form", "Update Classification", $data);
        }
    }

    public function saveKlasifikasi() {
        $RETURN_MODEL = $this->M_Klasifikasi->saveKlasifikasi($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/form');
        }
    }

    public function deleteKlasifikasi() {
        $RETURN_MODEL = $this->M_Klasifikasi->deleteKlasifikasi($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAX() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'encode') {
                echo $this->M_Klasifikasi->AJAXencode($_POST['idKlasifikasi']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Klasifikasi->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Klasifikasi->getKlasifikasi();
        }
    }

}