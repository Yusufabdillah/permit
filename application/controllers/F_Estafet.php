<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 18/02/2019
 * Time: 20:02
 */

class F_Estafet extends MY_Controller {

    private $VIEW_PATH = 'estafet';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Pengajuan',
            'M_Aspek',
            'M_Klasifikasi',
            'M_SSKategori',
            'M_SKategori',
            'M_Kategori',
            'M_Tipe',
            'M_Perusahaan',
            'M_Instansi',
            'M_Judul',
            'M_Negara',
            'M_Provinsi',
            'M_Kota',
            'M_Kecamatan',
            'M_Kelurahan',
            'M_Currency',
            'M_Referensi',
            'M_Estafet',
            'M_User'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Pengajuan->getPengajuan('cekKode');
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan('getEstafet');
        $this->template->frontend($this->VIEW_PATH."/index", "Estafet", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idPengajuan) {
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan("getDataByPK", null, null, decode_str($idPengajuan));
        $data['get_tipe'] = $this->M_Tipe->getTipe('getAll', NULL, NULL, NULL, false);
        $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getDataByKecamatan', NULL, NULL, $data['get_pengajuan']->idKecamatan);
        $data['get_instansi'] = $this->M_Instansi->getInstansi('getAll', NULL, NULL, NULL, false);

        /**
         * Data wilayah indonesia
         */
        $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
        $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getDataByNegara', NULL, NULL, $data['get_pengajuan']->idNegara);
        $data['get_kota'] = $this->M_Kota->getKota('getDataByProvinsi', NULL, NULL, $data['get_pengajuan']->idProvinsi);
        $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('getDataByKota', NULL, NULL, $data['get_pengajuan']->idKota);
        $data['get_kelurahan'] = $this->M_Kelurahan->getKelurahan('getDataByKecamatan', NULL, NULL, $data['get_pengajuan']->idKecamatan);

        /**
         * Klasifikasi dokumen
         */
        $data['get_aspek'] = $this->M_Aspek->getAspek('getAll', NULL, NULL, NULL, false);
        $data['get_kategori'] = $this->M_Kategori->getKategori('getDataByAspek', NULL, NULL, $data['get_pengajuan']->idAspek);
        $data['get_subk'] = $this->M_SKategori->getSKategori('getDataByKategori', NULL, NULL, $data['get_pengajuan']->idKategori);
        $data['get_sub_subk'] = $this->M_SSKategori->getSSKategori('getDataBySubk', NULL, NULL, $data['get_pengajuan']->idSubk);
        $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi('getDataBySub_subk', NULL, NULL, $data['get_pengajuan']->idSub_subk);
        $data['get_judul'] = $this->M_Judul->getJudul('getDataByKlasifikasi', NULL, NULL, $data['get_pengajuan']->idKlasifikasi);

        /**
         * Referensi Pengajuan by judul
         */
        $data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
        $data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);

        /**
         * Currency
         */
        // Ambil Data
        $AUD = $this->M_Currency->getCurrency("getIDR")->AUD;
        $SGD = $this->M_Currency->getCurrency("getIDR")->SGD;
        $EUR = $this->M_Currency->getCurrency("getIDR")->EUR;
        $USD = $this->M_Currency->getCurrency("getIDR")->USD;

        // Konversi
        $data['get_AUD'] = $data['get_pengajuan']->biayaPengajuan/$AUD;
        $data['get_SGD'] = $data['get_pengajuan']->biayaPengajuan/$SGD;
        $data['get_EUR'] = $data['get_pengajuan']->biayaPengajuan/$EUR;
        $data['get_USD'] = $data['get_pengajuan']->biayaPengajuan/$USD;
        $data['get_IDR'] = $data['get_pengajuan']->biayaPengajuan;

        $this->template->frontend($this->VIEW_PATH."/form", "Form Pengajuan", $data);
    }

    public function detail($idPengajuan = null) {
        $data['get_user'] = $this->M_User->getUser('getDataByPerusahaan');
        $data['get_pengajuan'] = $this->M_Pengajuan->getPengajuan("getDataByPK", null, null, decode_str($idPengajuan));
        $data['get_referensi'] = $this->M_Referensi->getReferensi('getDataByJudul', NULL, NULL, $data['get_pengajuan']->idJudul);
        $data['get_persyaratan_pengajuan'] = json_decode($data['get_pengajuan']->persyaratanPengajuan);
        $this->template->frontend($this->VIEW_PATH."/detail", "Pengajuan Estafet", $data);
    }

    public function approveEstafet() {
        $RETURN_MODEL = $this->M_Estafet->approveEstafet($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function declineEstafet() {
        $RETURN_MODEL = $this->M_Estafet->declineEstafet($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function savePengajuan() {
        $RETURN_MODEL = $this->M_Pengajuan->savePengajuan($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Draft') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
            } if ($RETURN_MODEL["STATUS"] === 'Submit') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/index');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    public function deletePengajuan() {
        $RETURN_MODEL = $this->M_Pengajuan->deletePengajuan($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAX() {
        $Fungsi = $this->input->post('fungsi');
        if ($Fungsi == 'toSubmit') {
            $data['status'] = $this->input->post('status');
            if ($data['status'] == 'aktif') {
                $data['get_koordinator'] = $this->M_User->getUser('getKoordinator');
            }
            $this->load->view('frontend/estafet/ajax_view/notif_submit', $data);
        }

        /**
         * Untuk klasifikasi dokumen
         */
        if ($Fungsi == 'toKategori') {
            $data['get_kategori'] = $this->M_Kategori->getKategori("getDataByAspek", null, null, $_POST['idAspek']);
            $this->load->view('frontend/estafet/ajax_view/kategori',$data);
        } if ($Fungsi == 'toSKategori') {
            $data['get_subk'] = $this->M_SKategori->getSKategori("getDataByKategori", null, null, $_POST['idKategori']);
            $this->load->view('frontend/estafet/ajax_view/subkategori',$data);
        } if ($Fungsi == 'toSSKategori') {
            $data['get_sub_subk'] = $this->M_SSKategori->getSSKategori("getDataBySubk", null, null, $_POST['idSubk']);
            $this->load->view('frontend/estafet/ajax_view/subsubkategori',$data);
        } if ($Fungsi == 'toKlasifikasi_Subk') {
            $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi("getDataBySubk", null, null, $_POST['idSubk']);
            $this->load->view('frontend/estafet/ajax_view/klasifikasi',$data);
        } if ($Fungsi == 'toKlasifikasi') {
            $data['get_klasifikasi'] = $this->M_Klasifikasi->getKlasifikasi("getDataBySub_subk", null, null, $_POST['idSub_subk']);
            $this->load->view('frontend/estafet/ajax_view/klasifikasi',$data);
        } if ($Fungsi == 'toJudul') {
            $data['get_judul'] = $this->M_Judul->getJudul("getDataByKlasifikasi", null, null, $_POST['idKlasifikasi']);
            $this->load->view('frontend/estafet/ajax_view/judul',$data);
        }

        /**
         * Untuk data wilayah dokumen
         */
        if ($Fungsi == 'toProvinsi') {
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getDataByNegara', null, null, $_POST['idNegara']);
            $this->load->view('frontend/estafet/ajax_view/provinsi',$data);
        } if ($Fungsi == 'toKota') {
            $data['get_kota'] = $this->M_Kota->getKota('getDataByProvinsi', null, null, $_POST['idProvinsi']);
            $this->load->view('frontend/estafet/ajax_view/kota',$data);
        } if ($Fungsi == 'toKecamatan') {
            $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('getDataByKota', null, null, $_POST['idKota']);
            $this->load->view('frontend/estafet/ajax_view/kecamatan',$data);
        } if ($Fungsi == 'toKelurahan') {
            $data['get_kelurahan'] = $this->M_Kelurahan->getKelurahan('getDataByKecamatan', null, null, $_POST['idKecamatan']);
            $this->load->view('frontend/estafet/ajax_view/kelurahan',$data);
        }

        /**
         * Untuk data site
         */
        if ($Fungsi == 'toPerusahaan') {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getDataByKecamatan', null, null, $_POST['idKecamatan']);
            $this->load->view('frontend/estafet/ajax_view/perusahaan',$data);
        } if ($Fungsi == 'toInstansi') {
            $data['get_instansi'] = $this->M_Instansi->getInstansi('getDataByKota', null, null, $_POST['idKota']);
            $this->load->view('frontend/estafet/ajax_view/instansi',$data);
        }

        /**
         * Untuk referensi persyaratan
         */
        if ($Fungsi == 'toReferensi') {
            $data['get_referensi'] = $this->M_Referensi->getReferensi("getDataByJudul", null, null, $_POST['idJudul']);
            $this->load->view('frontend/estafet/ajax_view/referensi',$data);
        }
        if ($Fungsi == 'toRekomSyarat') {
            $data['get_judul'] = $this->M_Judul->getJudul("getDataByPK", null, null, $_POST['idJudul']);
            $this->load->view('frontend/estafet/ajax_view/rekom_syarat',$data);
        }

        /**
         * Untuk Konversi mata uang
         */
        if ($Fungsi == 'toCurrency_INS') {
            $data['get_instansi'] = $this->M_Instansi->getInstansi('getDataByPK', null, null, $_POST['idInstansi']);
            $this->load->view('frontend/estafet/ajax_view/currency',$data);
        }
        if ($Fungsi == 'toKonversi') {
            $idCurrency = $this->input->post('idCurrency');
            $biayaPengajuan = $this->input->post('biayaPengajuan');
            // Ambil Data
            $data_currency = $this->M_Currency->getCurrency("get".$idCurrency);
            foreach ($data_currency as $key => $data) {
                $currency[$key] = $biayaPengajuan / $data;
            }
            $parsingData['get_currency'] = $currency;
            $this->load->view('frontend/estafet/ajax_view/konversi',$parsingData);
        }

        /**
         * Untuk Kepala Instansi
         */
        if ($Fungsi == 'toKepalaInstansi') {
            $data['get_instansi'] = $this->M_Instansi->getInstansi('getDataByPK', null, null, $_POST['idInstansi']);
            $this->load->view('frontend/estafet/ajax_view/kepala_instansi',$data);
        }


    }

}