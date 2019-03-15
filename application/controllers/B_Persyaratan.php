<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 15:42
 */

class B_Persyaratan extends MY_Controller {

    private $VIEW_PATH = 'persyaratan';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model('M_Persyaratan');
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_persyaratan'] = $this->M_Persyaratan->getPersyaratan('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Document Requirements", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idPersyaratan = null) {
        if (empty($idPersyaratan)) {
            $this->template->backend($this->VIEW_PATH."/form", "Create Document Requirements");
        } if (!empty($idPersyaratan)) {
            $data['get_persyaratan'] = $this->M_Persyaratan->getPersyaratan("getDataByPK", null, null, decode_str($idPersyaratan));
            $this->template->backend($this->VIEW_PATH."/form", "Update Document Requirements", $data);
        }
    }

    public function savePersyaratan() {
        $RETURN_MODEL = $this->M_Persyaratan->savePersyaratan($_POST);
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

    public function deletePersyaratan() {
        $RETURN_MODEL = $this->M_Persyaratan->deletePersyaratan($_POST);
        if ($RETURN_MODEL) {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAX() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'encode') {
                echo $this->M_Persyaratan->AJAXencode($_POST['idPersyaratan']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Persyaratan->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Persyaratan->getPersyaratan();
        }
    }

}