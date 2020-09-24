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
    $data['title'] = 'Akun Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Akun_model', 'akun');

    $data['role'] = $this->akun->getAkun();

    $this->form_validation->set_rules('title','title', 'required');
    $this->form_validation->set_rules('menu_id','Menu', 'required');
    $this->form_validation->set_rules('url','URL', 'required');
    $this->form_validation->set_rules('icon','Icon', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/dash_header', $data);
      $this->load->view('templates/dash_sidebar', $data);
      $this->load->view('templates/dash_topbar', $data);
      $this->load->view('akun/index', $data);
      $this->load->view('templates/dash_footer');
    }else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user', $data);
      $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Submenu added </div>');
      redirect('akun');
    }

  }

  public function edit(){

  }

  public function delete_akun($id){
    $this->db->delete('user', ['id' => $id]);
    $this->session-> set_flashdata('message', '<div class="alert alert-success" role="alert"> Akun has been delete </div>');
    redirect('akun');
  }
}
