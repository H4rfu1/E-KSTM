<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengontrol extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index(){
    $data['title'] = 'Laporan Pengontrol Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['laporan_pengontrol'] = $this->db->get('laporan_pengontrol')->result_array();


    $this->form_validation->set_rules('deskripsi_laporan','Deskripsi_laporan', 'required');
    $this->form_validation->set_rules('jenis_ternak','Jenis_ternak', 'required');
    $this->form_validation->set_rules('jumlah_ternak_sebelumnya','Jumlah_ternak_sebelumnya', 'required');
    $this->form_validation->set_rules('jumlah_ternak_sekarang','Jumlah_ternak_sekarang', 'required');
    $this->form_validation->set_rules('jumlah_ternak_meninggal','Jumlah_ternak_meninggal', 'required');
    $this->form_validation->set_rules('keterangan_ternak_meninggal','Keterangan_ternak_meninggal', 'required');
    $this->form_validation->set_rules('jumlah_ternak_sehat','Jumlah_ternak_sehat', 'required');
    $this->form_validation->set_rules('jumlah_ternak_sakit','Jumlah_ternak_sakit', 'required');
    $this->form_validation->set_rules('keterangan_kesehatan_ternak','Keterangan_kesehatan_ternak', 'required');
    $this->form_validation->set_rules('jumlah_ternak_dikonsumsi','Jumlah_ternak_dikonsumsi', 'required');
    $this->form_validation->set_rules('keterangan_konsumsi','Keterangan_konsumsi', 'required');
    $this->form_validation->set_rules('jumlah_ternak_dijual','Jumlah_ternak_dijual', 'required');
    $this->form_validation->set_rules('harga_ternak_perekor','Harga_ternak_perekor', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('pengontrol/index', $data);
      $this->load->view('templates/dash_footer');
    }else {
      $data = [
        'id_pelapor' => $this->session->userdata('id'),
        'tanggal_laporan' => time(),
        'deskripsi_laporan' => htmlspecialchars( $this->input->post('deskripsi_laporan')),
        'jenis_ternak' => htmlspecialchars( $this->input->post('jenis_ternak')),
        'jumlah_ternak_sebelumnya' => htmlspecialchars( $this->input->post('jumlah_ternak_sebelumnya')),
        'jumlah_ternak_sekarang' => htmlspecialchars( $this->input->post('jumlah_ternak_sekarang')),
        'jumlah_ternak_meninggal' => htmlspecialchars( $this->input->post('jumlah_ternak_meninggal')),
        'keterangan_ternak_meninggal' => htmlspecialchars( $this->input->post('keterangan_ternak_meninggal')),
        'jumlah_ternak_sehat' => htmlspecialchars( $this->input->post('jumlah_ternak_sehat')),
        'jumlah_ternak_sakit' => htmlspecialchars( $this->input->post('jumlah_ternak_sakit')),
        'keterangan_kesehatan_ternak' => htmlspecialchars( $this->input->post('keterangan_kesehatan_ternak')),
        'jumlah_ternak_dikonsumsi' => htmlspecialchars( $this->input->post('jumlah_ternak_dikonsumsi')),
        'keterangan_konsumsi' => htmlspecialchars( $this->input->post('keterangan_konsumsi')),
        'jumlah_ternak_dijual' => htmlspecialchars( $this->input->post('jumlah_ternak_dijual')),
        'harga_ternak_perekor' => htmlspecialchars( $this->input->post('harga_ternak_perekor'))

      ];
      $this->db->insert('laporan_kstm', $data);
      $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan added </div>');
      redirect('kstm');
    }

  }

  public function edit(){

  }

  public function delete_laporan_pengontrol($id){
    $this->db->delete('laporan_pengontrol', ['id_laporan_pengontrol' => $id]);
    $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan has been delete </div>');
    redirect('kstm');
  }
}
