<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 16:20
 */

class F_Dashboard extends MY_Controller {

    private $VIEW_PATH = 'dashboard';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Dokumen',
            'M_Departemen',
            'M_Instansi',
            'M_Pengajuan'
        ));
    }

    protected function load_models(){
        //$this->load->model();
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Dokumen->getDokumen('cekKode');
        // if ($_SESSION['idGrup'] == 1) {
        //     $data['get_data'] = $this->M_Dokumen->getDokumenExpired();

        //     // echo '1';
        // } else {
            $data['get_data']           = $this->M_Dokumen->getDokumenExpired('getDataBySite');
            $data['count_dokumen']      = $this->M_Dokumen->getDokumen();
            $data['count_pengajuan']    = $this->M_Pengajuan->getPengajuan();
            // echo '2';
        // }
        $this->template->frontend($this->VIEW_PATH."/index", "Dashboard",$data);
    }

}