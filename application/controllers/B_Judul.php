<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 13:31
 */

class B_Judul extends MY_Controller {

    private $VIEW_PATH = 'judul';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Judul','M_Klasifikasi'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_judul'] = $this->M_Judul->getJudul('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Judul", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idJudul = null) {
        if (empty($idJudul)) {
            $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Judul", $data);
        } if (!empty($idJudul)) {
            $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi('getAll', NULL, NULL, NULL, false);
            $data['get_judul'] = $this->M_Judul->getJudul("getDataByPK", null, null, decode_str($idJudul));
            $this->template->backend($this->VIEW_PATH."/form", "Update Judul", $data);
        }
    }

    public function saveJudul() {
        $RETURN_MODEL = $this->M_Judul->saveJudul($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($RETURN_MODEL['REDIRECT'].$RETURN_MODEL['PK']);
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/form');
        }
    }

    public function deleteJudul() {
        $RETURN_MODEL = $this->M_Judul->deleteJudul($_POST);
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
                echo $this->M_Judul->AJAXencode($_POST['idJudul']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Judul->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Judul->getJudul();
        }
    }

}