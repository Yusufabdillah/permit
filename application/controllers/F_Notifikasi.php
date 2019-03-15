<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:35
 */

class F_Notifikasi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    protected function load_models(){
        $this->load->model(array(
        	'M_Notifikasi'
		));
    }

    public function cekNotif() {
		echo $this->M_Notifikasi->getNotifikasi('getHitungNotif');
	}

	public function updateNotifikasi() {
    	$this->M_Notifikasi->updateNotifikasi($_POST);
	}

	/**
	 * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
	 * segala konstruksi proses ajax dapat dilihat di model
	 */
	public function AJAX()
	{
		$Fungsi = $this->input->post('fungsi');
		if ($Fungsi == 'toListNotifikasi') {
			$data['get_notifikasi'] = $this->M_Notifikasi->getNotifikasi('getAllByUser');
			$data['__CLASS'] = $this->input->post('__CLASS');
			$data['__METHOD'] = $this->input->post('__METHOD');
			$data['__PARAM_1'] = $this->input->post('__PARAM_1');
			$data['__PARAM_2'] = $this->input->post('__PARAM_2');
			$this->load->view('tmp_frontend/ajax_view/notifikasi', $data);
		}
	}

}
