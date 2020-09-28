<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index(){
    $breadcrumb         = array(
            "Rekap Laporan KSTM" => ""
        );
    $data['breadcrumb'] = $breadcrumb;
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Laporan_model', 'laporan');
    $data['title'] = 'Rekap';
    $data['laporan'] = $this->laporan->getLaporanKSTM();
    $data['tipe'] = 'kstm';

    $this->load->view('templates/dash_header', $data);
    $this->load->view('templates/dash_sidebar', $data);
    $this->load->view('templates/dash_topbar', $data);
    $this->load->view('rekap/index', $data);
    $this->load->view('templates/dash_footer');

  }

  public function kstm($id = ''){
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Laporan_model', 'laporan');
    if ($id == '') {
      $breadcrumb         = array(
              "Rekap Laporan KSTM" => ""
          );
      $data['breadcrumb'] = $breadcrumb;
      $data['title'] = 'Rekap Laporan KSTM';
      $data['laporan'] = $this->laporan->getLaporanKSTM();
      $data['tipe'] = 'kstm';

      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('rekap/index', $data);
      $this->load->view('templates/dash_footer');
    } else {
      $breadcrumb         = array(
              "Rekap Laporan KSTM" => "kstm",
              "Detail Laporan KSTM" => ""
          );
      $data['breadcrumb'] = $breadcrumb;
      $data['title'] = 'Detail Laporan KSTM';
      $data['laporan'] = $this->laporan->getLaporanKSTM();
      $data['tipe'] = 'kstm';

      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('rekap/index', $data);
      $this->load->view('templates/dash_footer');
    }



  }
  public function laporan(){
    $breadcrumb         = array(
            "Rekap Laporan Pengontrol Lapangan" => ""
        );
    $data['breadcrumb'] = $breadcrumb;
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Laporan_model', 'laporan');
    $data['title'] = 'Rekap Laporan Pengontrol Lapangan';
    $data['laporan'] = $this->laporan->getLaporanPengontrol();
    $data['tipe'] = 'pengontrol';

    $this->load->view('templates/dash_header', $data);
    $this->load->view('templates/dash_sidebar', $data);
    $this->load->view('templates/dash_topbar', $data);
    $this->load->view('rekap/index', $data);
    $this->load->view('templates/dash_footer');

  }

  // Export data in CSV format
  public function exportCSV(){
    $this->load->model('Laporan_model', 'laporan');
    // file name
    $filename = 'laporan_kstm_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");

    // get data
    $usersData = $this->laporan->getExportLaporanKSTM();;

    // file creation
    $file = fopen('php://output', 'w');

    $header = array("Name","tanggal","deskripsi");
    fputcsv($file, $header);
    foreach ($usersData as $key){
      $row = array($key['name'],date('d F Y', $key['tanggal_laporan']),$key['deskripsi_laporan']);
      fputcsv($file,$row);
    }
    fclose($file);
    exit;
  }
}
