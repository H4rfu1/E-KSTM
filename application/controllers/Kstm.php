<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kstm extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index(){
    $data['title'] = 'Laporan KSTM Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['laporan_kstm'] = $this->db->get('laporan_kstm')->result_array();


    $this->form_validation->set_rules('name','Nama', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('akun/index', $data);
      $this->load->view('templates/dash_footer');
    }else {
      $data = [
        'name' => htmlspecialchars( $this->input->post('name')),
        'email' => htmlspecialchars( $this->input->post('email')),
        'image' => 'default.jpg',
        'password' => password_hash('secret', PASSWORD_DEFAULT),
        'role_id' =>  $this->input->post('role_id'),
        'is_active' => $this->input->post('is_active'),
        'date_create' => time()
      ];
      $this->db->insert('user', $data);
      $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun added, password default "secret"</div>');
      redirect('akun');
    }

  }

  public function edit(){

  }

  public function delete_laporan_kstm($id){
    $this->db->delete('user', ['id_laporan_kstm' => $id]);
    $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan has been delete </div>');
    redirect('akun');
  }
}
