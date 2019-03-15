<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 14:38
 */

class B_Divisi extends MY_Controller {

    private $VIEW_PATH = 'divisi';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Divisi','M_Perusahaan'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_divisi'] = $this->M_Divisi->getDivisi('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Division", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idDivisi = null) {
        if (empty($idDivisi)) {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Division", $data);
        } if (!empty($idDivisi)) {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $data['get_divisi'] = $this->M_Divisi->getDivisi("getDataByPK", null, null, decode_str($idDivisi));
            $this->template->backend($this->VIEW_PATH."/form", "Update Division", $data);
        }
    }

    public function saveDivisi() {
        $RETURN_MODEL = $this->M_Divisi->saveDivisi($_POST);
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

    public function deleteDivisi() {
        $RETURN_MODEL = $this->M_Divisi->deleteDivisi($_POST);
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
                echo $this->M_Divisi->AJAXencode($_POST['idDivisi']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Divisi->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Divisi->getDivisi();
        }
    }

}