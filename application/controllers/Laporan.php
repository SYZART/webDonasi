<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function laporan_pdf_donasi()
    {
        $this->load->library('dompdf_gen');
        $data['donasi'] = $this->Model->get_data()->result_array();
        $this->load->view('admin/laporan_pdf_donasi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_donasi.pdf", array('Attachment' => 0));
    }
}
