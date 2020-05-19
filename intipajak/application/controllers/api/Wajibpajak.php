<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Wajibpajak extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('wajibpajak_model');
		$this->load->library("form_validation");
	}

	public function indexwajibpajak_get()
	{
		$id = $this->get('idnpwp');

		if ($id === null) {
			$wajibpajak = $this->wajibpajak_model->getAllWajibPajak();
		} else {
			$wajibpajak = $this->wajibpajak_model->getAllWajibPajak($id);
		}

		if ($wajibpajak) {
			$this->response([
				'status' => true,
				'data' => $wajibpajak
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'id 404'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	public function index_post()
	{
		# code...
		$data = [
			'nama' => $this->post('nama'),
			'namalengkap' => $this->post('namalengkap'),
			'alamat' => $this->post('alamat'),
			'idobjekpajakfk' => $this->post('idobjekpajakfk'),
			'notelp' => $this->post('notelp')
		];

		if ($this->wajibpajak_model->tambahdatawjbp($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'wajib pajak telah ditambah'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => false,
				'message' => 'wajib pajak 404'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete()
	{
		$idnpwp = $this->delete('idnpwp');
		if ($idnpwp === null) {
			$this->response([
				'status' => false,
				'message' => 'tidak ada id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->wajibpajak_model->hapusdatawjbp($idnpwp) > 0) {
				$this->response([
					'status' => true,
					'idnpwp' => $idnpwp,
					'message' => 'deleted!'
				], REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => false,
					'message' => 'id 404'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function detail($idnpwp)
	{
		# code...
		$data['title'] = 'Detail wajib Pajak';
		$data['wajibpajak'] = $this->wajibpajak_model->getAllWajibPajakbyID($idnpwp);
		$this->load->view('template/header', $data);
		$this->load->view('wajibpajak/detailwajibpajak', $data);
		$this->load->view('template/footer');
	}

	public function index_put()
	{
		$id = $this->put('idnpwp');
		$data = [
			'idnpwp' => $this->put('idnpwp'),
			'nama' => $this->put('nama'),
			'namalengkap' => $this->put('namalengkap'),
			'alamat' => $this->put('alamat'),
			'idobjekpajakfk' => $this->put('idobjekpajakfk'),
			'notelp' => $this->put('notelp')

		];

		if ($this->wajibpajak_model->ubahwjbp($data, $id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'wajib pajak telah dirubah'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'wajib pajak 404'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}

/* End of file wajibpajak.php */
/* Location: ./application/controllers/wajibpajak.php */
