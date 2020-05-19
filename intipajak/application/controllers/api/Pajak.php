<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class pajak extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pajak_model');
		$this->load->library("form_validation");
	}

	public function index_get()
	{
		$id = $this->get('idobjekpajak');

		if ($id === null) {
			$objekpajak = $this->pajak_model->getAllObjekPajak();
		} else {
			$objekpajak = $this->pajak_model->getAllObjekPajak($id);
		}

		if ($objekpajak) {
			$this->response([
				'status' => true,
				'data' => $objekpajak
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
			'merk' => $this->post('merk'),
			'type' => $this->post('type'),
			'nomorplat' => $this->post('nomorplat'),
			'besarpajak' => $this->post('besarpajak'),
			'jeniskendaraan' => $this->post('jeniskendaraan')
		];

		if ($this->pajak_model->tambahdataobjp($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'objek pajak telah ditambah'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => false,
				'message' => 'objek pajak 404'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete()
	{
		$idobjekpajak = $this->delete('idobjekpajak');
		if ($idobjekpajak === null) {
			$this->response([
				'status' => false,
				'message' => 'tidak ada id!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->pajak_model->hapusdataobjp($idobjekpajak) > 0) {
				$this->response([
					'status' => true,
					'idobjekpajak' => $idobjekpajak,
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



	public function index_put()
	{
		$id = $this->put('idobjekpajak');
		$data = [
			'idobjekpajak' => $this->put('idobjekpajak'),
			'merk' => $this->put('merk'),
			'type' => $this->put('type'),
			'nomorplat' => $this->put('nomorplat'),
			'besarpajak' => $this->put('besarpajak'),
			'jeniskendaraan' => $this->put('jeniskendaraan')
		];

		if ($this->pajak_model->ubahobjp($data, $id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'objek pajak telah dirubah'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'objek pajak 404'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}

/* End of file pajak.php */
/* Location: ./application/controllers/pajak.php */
