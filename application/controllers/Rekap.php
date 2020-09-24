<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index($tipe = 'kstm'){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Laporan_model', 'laporan');
    if (strtolower($tipe) == 'kstm') {
      $data['title'] = 'Rekap Laporan KSTM';
      $data['laporan'] = $this->laporan->getLaporanKSTM();
      $data['tipe'] = 'kstm';
    } elseif (strtolower($tipe) == 'pengontrol') {
      $data['title'] = 'Rekap Laporan Pengontrol Lapangan';
      $data['laporan'] = $this->laporan->getLaporanPengontrol();
      $data['tipe'] = 'pengontrol';
    }

    $this->load->view('templates/dash_header', $data);
    $this->load->view('templates/dash_sidebar', $data);
    $this->load->view('templates/dash_topbar', $data);
    $this->load->view('rekap/index', $data);
    $this->load->view('templates/dash_footer');

  }
}
