<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('Tanggal');
		$this->load->model('Surat_model', 'surat');
	}

	public function index()
	{
		$data['surat'] = (is_level('Manager'))
			? $this->surat->get_all()
			: $this->surat->get_by_id_user($this->session->userdata('id_user'));
		$data['js_to_load'] = ['surat.js'];

		return $this->template->load('template', 'surat/index', $data);
	}

	public function create()
	{
		$data['perihal'] = $this->surat->select_perihal();
		return $this->template->load('template', 'surat/create', $data);
	}

	public function store()
	{
		$post = $this->input->post();
		$data = [
			'id_user'    => $this->session->userdata('id_user'),
			'perihal'    => $post['perihal'],
			'keterangan' => $post['keterangan'],
			'lampiran'   => null,
			'tanggal'    => date('Y-m-d'),
			// 'status' => $post['status'],
		];

		$result = $this->surat->insert_data($data);
		if ($result) {
			$response = [
				'status'  => 'success',
				'message' => 'Surat berhasil ditambahkan!'
			];
		} else {
			$response = [
				'status'  => 'error',
				'message' => 'Surat gagal ditambahkan!'
			];
		}

		$this->session->set_flashdata('response', $response);
		return redirect('surat');
	}

	public function view_pdf($id_surat)
	{
		$this->load->library('pdf');
		$data = $this->surat->find($id_surat);
		$html_content = $this->load->view('surat/print_pdf', $data, true);
		$filename = 'Surat - ' . $data->perihal . ' - ' . $data->nama . '.pdf';

		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$this->pdf->stream($filename, ['Attachment' => 0]); # 0|1=auto download file
	}


	public function update_status($id_surat)
	{
		$data['status'] = $this->input->post('status');

		$result = $this->surat->update_data($id_surat, $data);
		if ($result) {
			$response = [
				'status'  => 'success',
				'message' => 'Status berhasil diubah!'
			];
		} else {
			$response = [
				'status'  => 'error',
				'message' => 'Status gagal diubah!'
			];
		}

		$this->session->set_flashdata('response', $response);
		return redirect('surat');
	}


	public function destroy($id_surat)
	{
		echo 'delete: ' . $id_surat;
	}
}
