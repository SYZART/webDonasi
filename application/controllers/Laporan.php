<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function print()
    {

        $data['title'] = "Print";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id_usr
        AND iklan.status = 1")->result();
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();


        $this->load->view('laporan/print_data_iklan', $data);
    }

    public function laporan_pdf_donasi()
    {
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        $data['dataIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id_usr
        AND iklan.status = 1")->result();
        $this->load->view('laporan/PDF_data_iklan', $data);

        $html = $this->output->get_output();
        // var_dump($html);
        // die();
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);
        $pdfOptions->set("a4", "portrait");
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        $this->dompdf->stream("laporan_data_donasi.pdf", array('Attachment' => 0));
    }
    public function excel_data_iklan()
    {
        $data['title'] = 'Laporan Data Iklan';
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        $data['dataIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id_usr
        AND iklan.status = 1")->result();
        $this->load->view('laporan/excel_data_iklan', $data);
    }
    public function print_data_kategori()
    {

        $data['title'] = "Print";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();


        $this->load->view('laporan/print_data_kategori', $data);
    }
    public function pdf_data_kategori()
    {
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();

        $this->load->view('laporan/PDF_data_kategori', $data);

        $html = $this->output->get_output();
        // var_dump($html);
        // die();
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);
        $pdfOptions->set("a4", "portrait");
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        $this->dompdf->stream("laporan_data_donasi.pdf", array('Attachment' => 0));
    }
    public function excel_data_kategori()
    {
        $data['title'] = 'Laporan Data Kategori';
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();

        $this->load->view('laporan/excel_data_kategori', $data);
    }
}
