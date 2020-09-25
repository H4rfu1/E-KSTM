<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
  }

  public function index(){
    $data['title'] = 'Kelola Akun';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Akun_model', 'akun');

    $data['akun'] = $this->akun->getAkun();

    $this->db->where('id != 1');
    $data['role'] = $this->db->get('user_role')->result_array();


    $this->form_validation->set_rules('name','Nama', 'required');
    $this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
      'is_unique' => 'this email has already registered'
    ]);

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

  public function edit($id){
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    if($this->form_validation->run() == false){
      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('akun/edit', $data);
      $this->load->view('templates/dash_footer');
    }else{
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      $this->db->set('name',$name);
      $this->db->where('email', $email);
      $this->db->update('user');

      $pesan = '<div class="alert alert-success" role="alert"> Akun has been updated</div>';
      $this->session-> set_flashdata('message', $pesan);
      redirect('akun');
    }
  }

  public function delete_akun($id){
    $this->db->delete('user', ['id' => $id]);
    $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun has been delete </div>');
    redirect('akun');
  }
}
