<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 12:38
 */

class B_SSKategori extends MY_Controller {

    private $VIEW_PATH = 'kategori_sub_sub';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_SSKategori','M_SKategori'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_subSubk'] = $this->M_SSKategori->getSSKategori('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Sub Sub Category", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idSub_Subk = null) {
        if (empty($idSub_Subk)) {
            $data['get_subk'] = $this->M_SKategori->getSKategori('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Sub Sub Category", $data);
        } if (!empty($idSub_Subk)) {
            $data['get_subk'] = $this->M_SKategori->getSKategori('getAll', NULL, NULL, NULL, false);
            $data['get_subSubk'] = $this->M_SSKategori->getSSKategori("getDataByPK", null, null, decode_str($idSub_Subk));
            $this->template->backend($this->VIEW_PATH."/form", "Update Sub Sub Category", $data);
        }
    }

    public function saveSSKategori() {
        $RETURN_MODEL = $this->M_SSKategori->saveSSKategori($_POST);
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

    public function deleteSSKategori() {
        $RETURN_MODEL = $this->M_SSKategori->deleteSSKategori($_POST);
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
                echo $this->M_SSKategori->AJAXencode($_POST['idSub_subk']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_SSKategori->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_SSKategori->getSSKategori();
        }
    }


}