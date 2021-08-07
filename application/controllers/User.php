<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu WHERE user_sub_menu.menu_id = $role_id")->result_array();
        $time = time();
        $data['iklan'] = $this->db->query("SELECT iklan.id, iklan.id_kategori, iklan.id_user, iklan.judul, iklan.total_dana, iklan.date, iklan.date_end, iklan.gambar, iklan.cerita, iklan.status, kategori_iklan.id_kategori, kategori_iklan.nama_kategori, user.name, user.image
        FROM iklan, kategori_iklan, user 
        WHERE kategori_iklan.id_kategori = iklan.id_kategori 
        AND iklan.id_user = user.id_usr
        AND iklan.status =1
        AND iklan.date_end > $time")->result();
        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer');
    }
    public function donasi($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'numeric|trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Donasi User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $role_id = $this->session->userdata('role_id');
            $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
            WHERE user_sub_menu.menu_id = $role_id
            ")->result_array();
            $data['donasi'] = $this->Model->ambil_id_iklan($id);
            $data['totalDonasi'] = $this->db->query("SELECT SUM(nominal) as total 
		FROM donasi WHERE id_iklan= $id")->result();
            $data['totalPendonasi'] = $this->db->query("SELECT COUNT(name) as pendonasi 
		FROM donasi WHERE id_iklan = $id")->result();

            $this->load->view('user/header', $data);
            $this->load->view('user/donasi', $data);
            $this->load->view('user/footer');
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
            redirect('user/donasi/' . $id_iklan);
        }
    }


    public function pengajuanDonasi()
    {

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('date_end', 'Tanggal Akhir', 'trim|required');
        $this->form_validation->set_rules('total_dana', 'Total dana', 'trim|required');
        $this->form_validation->set_rules('cerita', 'Cerita', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Pengajuan Donasi Iklan";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
            $role_id = $this->session->userdata('role_id');
            $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
            WHERE user_sub_menu.menu_id = $role_id
            ")->result_array();
            $this->load->view('user/header', $data);
            $this->load->view('user/pengajuan_donasi');
            $this->load->view('user/footer');
        } else {
            $id_kategori = $this->input->post('id_kategori');
            $id_user = $this->input->post('id_user');
            $judul = $this->input->post('judul');
            $date = $this->input->post('date');
            $date_end = $this->input->post('date_end');
            $total_dana = $this->input->post('total_dana');
            $cerita = $this->input->post('cerita');
            $status = $this->input->post('status');
            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gambar Gagal Diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_kategori' => $id_kategori,
                'id_user' => $id_user,
                'judul' => $judul,
                'date' => $date,
                'date_end' => strtotime($date_end),
                'total_dana' => $total_dana,
                'cerita' => $cerita,
                'status' => $status,
                'gambar' => $gambar
            );
            $this->Model->insert_data($data, 'iklan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Permintaan iklan berhasil Ditambahkan 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/pengajuanDonasi');
        }
    }

    public function pencairanDana()
    {
        $data['title'] = "Pencairan Dana Donasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->userdata('role_id');
        $id_usr = $this->session->userdata('id_usr');
        $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
        WHERE user_sub_menu.menu_id = $role_id
        ")->result_array();
        $data['iklan'] = $this->db->query("SELECT * FROM iklan,user
        WHERE iklan.id_user = user.id_usr
        AND iklan.id_user =$id_usr")->result();

        $this->load->view('user/header', $data);
        $this->load->view('user/pencairanDana', $data);
        $this->load->view('user/footer');
    }

    public function pencairanDanaAksi($id)
    {
        $this->form_validation->set_rules('total_dana', 'Total dana', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $data['title'] = "Pencairan Dana Donasi";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $role_id = $this->session->userdata('role_id');
            $id_usr = $this->session->userdata('id_usr');
            $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
        WHERE user_sub_menu.menu_id = $role_id
        ")->result_array();
            $data['iklan'] = $this->db->query("SELECT * FROM iklan,user
        WHERE iklan.id_user = user.id_usr
        AND iklan.id_user =$id_usr
        AND iklan.id =$id")->result();
            $data['donasi'] = $this->db->query("SELECT * FROM donasi WHERE donasi.id_iklan = $id")->result();

            $this->load->view('user/header', $data);
            $this->load->view('user/pencairanDanaAksi', $data);
            $this->load->view('user/footer');
        } else {
            $id         = $this->input->post('id');
            $total_dana = $this->input->post('total_dana');
            $id_iklan = $this->input->post('id_iklan');


            $data = array(
                'id' => $id,
                'total_dana' => $total_dana

            );
            $where = array(
                'id' => $id
            );
            $this->Model->update_data($where, $data, 'iklan');
            $data = array(
                'nominal' => 0
            );
            $where = array(
                'id_iklan' => $id_iklan
            );
            $this->Model->update_data($where, $data, 'donasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Dana sudah tercairkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/pencairanDanaAksi/' . $id);
        }
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $role_id = $this->session->userdata('role_id');
            $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
            WHERE user_sub_menu.menu_id = $role_id
            ")->result_array();

            $this->load->view('user/header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('user/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //CEK GAMBAR
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratultion your profile has been updated </div>');
            redirect('user/edit');
        }
    }
}
