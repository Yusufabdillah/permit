<?php


class F_MonitoringDokumen extends MY_Controller {

    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->perPage = 4 ;
        // $this->load->library('Pagination');
        $this->load->library('Ajax_Pagination');

    }

    protected function load_models(){
        $this->load->model(array(
            'M_Pengajuan',
            'M_Aspek',
            'M_Klasifikasi',
            'M_SSKategori',
            'M_SKategori',
            'M_Kategori',
            'M_Tipe',
            'M_User',
            'M_Perusahaan',
            'M_Instansi',
            'M_Judul',
            'M_Negara',
            'M_Provinsi',
            'M_Kota',
            'M_Kecamatan',
            'M_Kelurahan',
            'M_Referensi',
            'M_Currency',
            'M_Dokumen'
        ));
    }

    protected function load_librarys(){
        //load library
    }

    function index(){
        $groupID   = $this->session->userdata('group_user');
        $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', null, null, null, false);
        // $data['get_perusahaan']      = $this->M_akses_perusahaan->get_akses_per($groupID);
        // $jumlah_data=$this->M_dokumen->jumlah_DataDokumen($groupID);
        // $d['jumlah']           = $jumlah_data;
        // $config['target']      = '#ajaxready';
        // $config['base_url']    = base_url().'F_Monitoring/dataDocument';
        // $config['total_rows']  = $jumlah_data;
        // $config['per_page']    = $this->perPage;
        // $config['link_func']   = 'searchFilter';
        // $this->ajax_pagination->initialize($config);
        $data['get_data']    = $this->M_Dokumen->getDokumen();
        $this->template->frontend('monitoring_dokumen/index','Data Dokumen',$data);
    }

    function ajaxDataDocument(){
        $conditions = array();
        $groupID   = $this->session->userdata('group_user');
        $judul=$this->input->post('judul');
        $casenumber=$this->input->post('casenumber');
        $lokasi=$this->input->post('lokasi');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        //calc offset number
        $page = $this->input->post('page');
        if($page==''){$offset = 0;}else{$offset = $page;}
        if(!empty($judul)){$conditions['search']['keywords'] = $judul;}
        //pagination configuration
        $jumlah=count($this->M_Dokumen->ajaxSearchDokumen($judul,$casenumber,$lokasi,$groupID,$bulan,$tahun,$conditions));
        $config['target']      = '#ajaxready';
        $config['base_url']    = base_url().'F_Monitoring/ajaxDataDocument';
        $config['total_rows']  = $jumlah;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $d['jumlah']         = $jumlah;
        $this->ajax_pagination->initialize($config);
        $d['get_data'] = $this->M_Dokumen->ajaxSearchDokumen($judul,$casenumber,$lokasi,$groupID,$bulan,$tahun,$conditions);
        $this->load->view('frontend/monitoring_dokumen/ajax_data_dokumen',$d);
    }

    public function detailDokumen($dokumenid = null) {
        $id = $dokumenid !== null ? decode_str($dokumenid) : null;
        $data['get_dokumen']   = $this->M_Dokumen->getDokumen("getDataByPK", NULL, NULL, $id);

        if (!empty($data['get_dokumen']->idJudul)) {
            $dataJudul = $this->M_Judul->getJudul('getDataByPK', NULL, NULL, $data['get_dokumen']->idJudul, false);
            $data['get_aspek'] = $dataJudul->namaAspek;
            $data['get_kategori'] = $dataJudul->namaKategori;
            $data['get_subk'] = $dataJudul->namaSubk;
            $data['get_sub_subk'] = $dataJudul->namaSub_subk;
            $data['get_klasifikasi'] = $dataJudul->namaKlasifikasi;
            $data['get_judul'] = $dataJudul->namaJudul;
        }

        $data['get_geocoder'] = json_decode($data['get_dokumen']->geocoderDokumen);
        $this->template->frontend('monitoring_dokumen/dtl_data_dokumen','Data Dokumen',$data);
    }
    
}


