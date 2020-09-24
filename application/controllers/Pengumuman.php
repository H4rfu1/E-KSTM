<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index(){
    $data['title'] = 'Pengumuman';
    $data['role_id'] = $this->session->userdata('role_id');
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Pengumuman_model', 'pengumuman');

    if ($data['role_id'] == 3) {
      $data['pengumuman'] = $this->pengumuman->getAllPengumuman();
    } else {
      $data['pengumuman'] = $this->pengumuman->getRolePengumuman($data['role_id']);
    }

    $this->db->where('id != 1');
    $this->db->where('id != 3');
    $data['role'] = $this->db->get('user_role')->result_array();


    $this->form_validation->set_rules('name','Nama', 'required');
    $this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
      'is_unique' => 'this email has already registered'
    ]);

    if($this->form_validation->run() == false){
      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('pengumuman/index', $data);
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
      $this->db->insert('pemberitahuan', $data);
      $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun added </div>');
      redirect('pengumuman');
    }

  }

  public function edit(){

  }

  public function delete_pengumuman($id){
    $this->db->delete('pemberitahuan', ['id' => $id]);
    $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun has been delete </div>');
    redirect('pengumuman');
  }
}
