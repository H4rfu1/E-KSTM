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
  public function excelKstm(){
    // Filter the excel data
    function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    // Excel file name for download
    $fileName = "laporan_kstm_data-" . date('Ymd') . ".xlsx";

    // Column names
    $fields = array('No.','ID Laporan', 'Nama pelapor', 'Tanggal laporan', 'Deskripsi Laporan');

    // Display column names as first row
    $excelData = implode("\t", array_values($fields)) . "\n";
    // Get records from the database
    $que = "SELECT `laporan_kstm`.*, `user`.`name`
             FROM `laporan_kstm` JOIN `user`
             ON `laporan_kstm`.`id_pelapor` = `user`.`id`
             ORDER BY  `user`.`name` ASC";
    $query = $this->db->query($que);
    if($query->num_rows > 0){
        // Output each row of the data
        $i=0;
        while($row = $query->fetch_assoc()){ $i++;
            $rowData = array($i, $row['id_laporan_kstm'], $row['name'], date('d F Y', $row['tanggal_laporan']), $row['deskripsi_laporan']);
            array_walk($rowData, 'filterData');
            $excelData .= implode("\t", array_values($rowData)) . "\n";
        }
    }else{
        $excelData .= 'No records found...'. "\n";

    }

    // Headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    // Render excel data
    echo $excelData;

    exit;
  }
}
