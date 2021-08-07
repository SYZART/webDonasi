<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
	public function data_awal($time)
	{
		return $this->db->query("SELECT iklan.id, iklan.id_kategori, iklan.id_user,
iklan.judul, iklan.date, iklan.date_end, iklan.gambar, iklan.cerita,
iklan.status,iklan.total_dana, kategori_iklan.id_kategori, kategori_iklan.nama_kategori, user.name, user.image
FROM iklan, kategori_iklan, user 
WHERE kategori_iklan.id_kategori = iklan.id_kategori 
AND iklan.id_user = user.id_usr
AND iklan.status =1
AND iklan.date_end > $time")->result();
	}
	public function get_data($table)
	{
		return $this->db->get($table);
	}


	public function ambil_id_iklan($id)
	{
		$hasil = $this->db->where('id', $id)->get('iklan');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}


	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}


	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_data($where, $data, $table)
	{

		$this->db->where($where);

		$this->db->update($table, $data);
	}

	public function edit_user($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_iklan($where, $table)
	{
		return $this->db->get_where($table, $where);
	}


	public function get_detail($id)
	{
		return $this->db->get_where(['id' => $id])->first();
	}
}
