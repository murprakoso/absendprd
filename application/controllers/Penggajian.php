<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Penggajian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Absensi_model', 'absensi');
		$this->load->model('Karyawan_model', 'karyawan');
		$this->load->model('Jam_model', 'jam');
		$this->load->helper('Tanggal');
		$this->load->helper('currency_helper');
	}

	public function index()
	{
		$data = $this->detail_data_gaji();
		return $this->template->load('template', 'penggajian/index', $data);
	}

	private function detail_data_gaji()
	{
		$id_user = @$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->id_user;
		$bulan_awal = @$this->input->get('bulan_awal') ? $this->input->get('bulan_awal') : date('m');
		$bulan_akhir = @$this->input->get('bulan_akhir') ? $this->input->get('bulan_akhir') : date('m');
		$tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');

		$data['selisih'] = str_replace('-', '', (int) $bulan_awal - (int) $bulan_akhir);
		$data['karyawan'] = $this->karyawan->get_all();
		$data['jam_kerja'] = (array) $this->jam->get_all();
		$data['all_bulan'] = bulan();
		$data['bulan_awal'] = $bulan_awal;
		$data['bulan_akhir'] = $bulan_akhir;
		$data['tahun'] = $tahun;
		// $data['hari'] = hari_bulan($bulan, $tahun);

		return $data;
	}

	public function export_pdf()
	{
		$this->load->library('pdf');
		$data = $this->detail_data_gaji();
		$html_content = $this->load->view('penggajian/print_pdf', $data, true);
		$filename = 'Penggajian Periode - ' . bulan($data['bulan_awal']) . '-' . bulan($data['bulan_akhir']) . '-' . $data['tahun'] . '.pdf';

		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$this->pdf->stream($filename, ['Attachment' => 1]);
	}

	public function export_excel()
	{
		echo 'export excel';
	}
}
