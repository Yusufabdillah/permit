<?php

/**
 * Created By 	: Yusuf Abdillah Putra
 * Created Date : 09:33 WIB
 * Credential	: PT Sambu Groups
 * Autoload 	: True
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification
{
	private $CI;
	private $API = 'F_Notifikasi';
	private $PK = 'idNotif';
	private $Code_UNAUTHORIZED = '401';

	/**
	 * @var string
	 * Deklarasi tbl_mstakses
	 */
	private $SYSTEM_ADMINISTRATOR = '1';
	private $DIREKSI = '2';
	private $KOORDINATOR_PERMIT = '3';
	private $PERMIT_OFFICER = '4';

	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->model(array(
			'M_Notifikasi'
		));
	}

	public function create($idUser, $idKode, $idPengajuan) {
		$dataParsed = array(
			'idKode' => $idKode,
			'idUser' => $idUser,
			'idPengajuan' => $idPengajuan
		);
		$this->CI->guzzle->API_Post($this->API.'/post/', $dataParsed);
	}

	public function createMultiple($idUser, $idKode, $idPengajuan) {
		$hitungData = count($idUser);
		if (!empty($hitungData)) {
			if ($hitungData == 1) {
				$dataParsed = array(
					'idKode' => $idKode,
					'idUser' => $idUser[0],
					'idPengajuan' => $idPengajuan
				);
				$this->CI->guzzle->API_Post($this->API.'/post/', $dataParsed);
			} else if ($hitungData > 1) {
				foreach ($idUser as $KEY => $data) {
					$DATA_POST[] = array(
						'idKode' => $idKode,
						'idUser' => $data,
						'idPengajuan' => $idPengajuan
					);
				}
				$dataParsed = array(
					'data' => $DATA_POST
				);
				$this->CI->guzzle->API_Post($this->API.'/postMultiple/', $dataParsed);
			}
		}
	}

	public function createOSS($idUser, $idKode, $idPengajuan) {
		$hitungData = count($idUser);
		if (!empty($hitungData)) {
			if ($hitungData == 1) {
				$dataParsed = array(
					'idKode' => $idKode,
					'idUser' => $idUser[0]->idUser,
					'idPengajuan' => $idPengajuan
				);
				$this->CI->guzzle->API_Post($this->API.'/post/', $dataParsed);
			} else if ($hitungData > 1) {
				foreach ($idUser as $KEY => $data) {
					$DATA_POST[] = array(
						'idKode' => $idKode,
						'idUser' => $data->idUser,
						'idPengajuan' => $idPengajuan
					);
				}
				$dataParsed = array(
					'data' => $DATA_POST
				);
				$this->CI->guzzle->API_Post($this->API.'/postMultiple/', $dataParsed);
			}
		}
	}

	public function createEstafet($idUser, $idKode, $idPengajuan) {
		$hitungData = count($idUser);
		if (!empty($hitungData)) {
			if ($hitungData == 1) {
				$dataParsed = array(
					'idKode' => $idKode,
					'idUser' => $idUser[0]->idUser,
					'idPengajuan' => $idPengajuan
				);
				$this->CI->guzzle->API_Post($this->API.'/post/', $dataParsed);
			} else if ($hitungData > 1) {
				foreach ($idUser as $KEY => $data) {
					$DATA_POST[] = array(
						'idKode' => $idKode,
						'idUser' => $data->idUser,
						'idPengajuan' => $idPengajuan
					);
				}
				$dataParsed = array(
					'data' => $DATA_POST
				);
				$this->CI->guzzle->API_Post($this->API.'/postMultiple/', $dataParsed);
			}
		}
	}

	private function refreshHitung($waktu = 3000) {
		?>
		<script type="text/javascript">
			setInterval(
				function () {
					$('#cekNotif').load('<?= site_url('F_Notifikasi/cekNotif'); ?>')
				}
				, <?= $waktu; ?>);
		</script>
		<?php
	}

	private function styleCSS() {
		?>
		<style>
			.scroll{
				width: 300px;
				padding: 10px;
				overflow-y: auto;
				height: 300px;

				/*script tambahan khusus untuk IE */
				scrollbar-face-color: #CE7E00;
				scrollbar-shadow-color: #FFFFFF;
				scrollbar-highlight-color: #6F4709;
				scrollbar-3dlight-color: #111111;
				scrollbar-darkshadow-color: #6F4709;
				scrollbar-track-color: #FFE8C1;
				scrollbar-arrow-color: #6F4709;
			}
		</style>
		<?php
	}

	private function AJAX($__CLASS, $__METHOD, $__PARAM_1 = null, $__PARAM_2 = null) {
		?>
		<script type="text/javascript">
			$(document).ready(function() {
				/**
				 * Untuk Data Wilayah Dokumen
				 */
				$('#TRIGGER_Notifikasi').on('click', function () {
					$.ajax({
						type: "POST",
						url: "<?= site_url('F_Notifikasi/AJAX')?>",
						data: {
							'fungsi' : 'toListNotifikasi',
							'__CLASS' : '<?= $__CLASS ?>',
							'__METHOD' : '<?= $__METHOD ?>',
							'__PARAM_1' : '<?= $__PARAM_1 ?>',
							'__PARAM_2' : '<?= $__PARAM_2 ?>'
						},
						success: function(msg){
							$('#AJAX_Notifikasi').html(msg);
						}
					});
				});
			});
		</script>
		<?php
	}

	public function view($__CLASS, $__METHOD, $__PARAM_1 = null, $__PARAM_2 = null) {
		self::styleCSS();
		self::refreshHitung(3000);
		?>
		<li class="dropdown">
			<a href="javascript:void(0)" id="TRIGGER_Notifikasi" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-bell"></i>
				<span id="cekNotif" class="label label-primary label-indicator animation-floating">
					<?= $this->CI->M_Notifikasi->getNotifikasi('getHitungNotif'); ?>
				</span>
			</a>
			<ul class="dropdown-menu dropdown-custom dropdown-menu-right" id="AJAX_Notifikasi">

			</ul>
		</li>
		<?php
		self::AJAX($__CLASS, $__METHOD, $__PARAM_1, $__PARAM_2);
	}

}
