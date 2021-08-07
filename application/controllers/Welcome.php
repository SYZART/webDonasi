<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['title'] = "Yuk Donasi";
		$time = time();
		$data['iklan'] = $this->Model->data_awal($time);

		$this->load->view('templates/header', $data);
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}
	public function donasi($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'numeric|trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Yuk Donasi";
			$data['totalDonasi'] = $this->db->query("SELECT SUM(nominal) as total 
            FROM donasi WHERE id_iklan= $id")->result();
			$data['totalPendonasi'] = $this->db->query("SELECT COUNT(name) as pendonasi 
            FROM donasi WHERE id_iklan = $id")->result();
			$data['donasi'] = $this->Model->ambil_id_iklan($id);
			$data['dataDonasi'] = $this->db->query("SELECT * FROM donasi WHERE id_iklan = $id")->result();
			$data['dataIklan'] = $this->db->query("SELECT * FROM iklan")->result();

			$this->load->view('templates/header', $data);
			$this->load->view('donasi', $data);
			$this->load->view('templates/footer');
		} else {
			$id_iklan = $this->input->post('id_iklan');
			$name = $this->input->post('name');
			$nominal = $this->input->post('nominal');
			$date = $this->input->post('date');
			$pesan = $this->input->post('pesan');

			$data = array(
				'id_iklan' => $id_iklan,
				'name' => $name,
				'nominal' => $nominal,
				'date' => $date,
				'pesan' => $pesan

			);
			$this->Model->insert_data($data, 'donasi');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Terimakasih Sudah berdonasi.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
			redirect('welcome/donasi/' . $id_iklan);
		}
	}
}
