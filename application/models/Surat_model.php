<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Surat_model extends CI_Model
{
	protected $tb_surat = 'surat';

	public function select_perihal()
	{
		return ['Permohonan Cuti Melahirkan', 'Permohonan Cuti Tahunan'];
	}

	public function get_all()
	{
		$this->db->join('users', 'users.id_user = surat.id_user', 'LEFT');
		$this->db->join('divisi', 'divisi.id_divisi = users.divisi', 'LEFT');
		$result = $this->db->get('surat');
		return $result->result();
	}

	public function get_by_id_user($id_user)
	{
		$this->db->join('users', 'users.id_user = surat.id_user', 'LEFT');
		$this->db->join('divisi', 'divisi.id_divisi = users.divisi', 'LEFT');
		$this->db->where('surat.id_user', $id_user);
		$result = $this->db->get('surat');
		return $result->result();
	}

	public function find($id)
	{
		$this->db->join('users', 'users.id_user = surat.id_user', 'LEFT');
		$this->db->join('divisi', 'divisi.id_divisi = users.divisi', 'LEFT');
		$this->db->where('id_surat', $id);
		$result = $this->db->get('surat');
		return $result->row();
	}

	public function insert_data($data)
	{
		$result = $this->db->insert($this->tb_surat, $data);
		return $result;
	}

	public function update_data($id, $data)
	{
		$this->db->where('id_surat', $id);
		$result = $this->db->update($this->tb_surat, $data);
		return $result;
	}
}
