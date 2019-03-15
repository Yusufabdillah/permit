<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 16:53
 */

class B_Referensi extends MY_Controller {

    private $VIEW_PATH = 'referensi';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Referensi', 'M_Persyaratan', 'M_Judul'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_referensi'] = $this->M_Referensi->getReferensi('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Referensi Persyaratan", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idJudul) {
        if (empty($idJudul)) {
            redirect(site_url('B_Referensi/index'));
        } else if (!empty($idJudul)) {
            $data['get_persyaratan'] = $this->M_Persyaratan->getPersyaratan('getAll', NULL, NULL, NULL, false);
            $data['get_judul'] = $this->M_Judul->getJudul("getDataByPK", null, null, decode_str($idJudul));
            $data['get_referensi'] = $this->M_Referensi->getReferensi("getDataByJudul", null, null, decode_str($idJudul));
            $this->template->backend($this->VIEW_PATH."/form", "Update Referensi", $data);
        }
    }

    public function saveReferensi() {
        $RETURN_MODEL = $this->M_Referensi->saveReferensi($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    public function deleteReferensi() {
        $RETURN_MODEL = $this->M_Referensi->deleteReferensi($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
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