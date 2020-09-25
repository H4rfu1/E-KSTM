<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
  }
  public function index(){
    if($this->session->userdata('email')){
      redirect('user');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if($this->form_validation->run() == false){
      $data['title'] = 'E-KSTM - User login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    }else{
      //validation succeess
      $this->_login();
    }

  }

  private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //jika user ada
    if($user){
      //jika usernya ada
      if($user['is_active'] == 1){
        // cek password
        if(password_verify($password, $user['password'])){
          $data = [
            'email' => $user['email'],
            'id' => $user['id'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if($user['role_id'] == 1){
            redirect('admin');
          } else{
            redirect('user');
          }


        } else {
          $this->session-> set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password </div>');
          redirect('auth');
        }
      } else{
        $this->session-> set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email email has not been activated </div>');
        redirect('auth');
      }
    } else {
      $this->session-> set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not registered </div>');
      redirect('auth');
    }
  }

  public function registration(){
    date_default_timezone_set('Asia/Jakarta');
    if($this->session->userdata('email')){
      redirect('user');
    }
    $this->form_validation->set_rules('fullname','Name', 'required|trim');
    $this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]',[
      'is_unique' => 'this email has already registered'
    ]);
    $this->form_validation->set_rules('password1','Password','trim|min_length[3]|matches[password2]', [
      'matches' => "password don't match",
      'min_length' => 'password to short'
    ]);
    $this->form_validation->set_rules('password2','Password2','trim|matches[password1]');


    if($this->form_validation
    ->run() == false){

      $data['title'] = 'E-KSTM - User Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('fullname', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_create' => time()

      ];
      $pesan = '<div class="alert alert-success" role="alert"> congratulation '.$this->input->post('fullname').'!! your account has been registered, activation has been sent to your email and will valid until 24 hours. check on spam if the email didn\'t appear. </div>';

      //siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token =[
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      $this->db->insert('user',$data);
      $this->db->insert('user_token',$user_token);
      $this->_sendEmail($token, 'verify');

      $this->session-> set_flashdata('message', $pesan);
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type){
     $config = [
       'protocol'  => 'smtp',
       'smtp_host' => 'mail.e-kstm.com',
       'smtp_user' => 'no-reply@e-kstm.com',
       'smtp_pass' => 'E-KSTM123',
       'smtp_port' => 465,
       'mailtype'  => 'html',
       'charset' => 'utf-8',
       'newline' => "\r\n",
     ];
     $this->load->library('email', $config);
     $this->email->from('no-reply@e-kstm.com', 'e-kstm');
     $this->email->to($this->input->post('email'));

     if($type == 'verify'){
       $this->email->subject('e-KSTM - Account verification');
       $message = '<html><head>';
       $message = '<title>E-KSTM - email verif<title>';
       $message = '<head><body>';
       $message .= '<p>click this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a></p>';
       $message .= '<p>atau</p> <p>link: '. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '</p>';
       $message .= '</body></html>';
       $this->email->message($message);
       $this->email->set_mailtype('html');
     }

     if($this->email->send()){
       return true;
     }else{
       echo $this->email->print_debugger(); die;
     }

  }

  public function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if($user_token) {
        if(time()->$user_token['date_created'] < (60*60*24)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');
          $this->db->delete('user_token', ['email' => $email]);

          $pesan = '<div class="alert alert-success" role="alert"> ' . $email .' account has been activated!, please login</div>';
          $this->session-> set_flashdata('message', $pesan);
          redirect('auth');
        }else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);


          $pesan = '<div class="alert alert-danger" role="alert"> account activation  failed, takon has been expied.</div>';
          $this->session-> set_flashdata('message', $pesan);
          redirect('auth');
        }
      } else {
        $pesan = '<div class="alert alert-danger" role="alert"> account activation  failed, wrong token</div>';
        $this->session-> set_flashdata('message', $pesan);
        redirect('auth');
      }
    } else {
      $pesan = '<div class="alert alert-danger" role="alert"> account activation dont use to playing man</div>';
      $this->session-> set_flashdata('message', $pesan);
      redirect('auth');
    }

  }

  public function logout(){
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $pesan = '<div class="alert alert-success" role="alert"> you have been logout</div>';
    $this->session-> set_flashdata('message', $pesan);
    redirect('auth');

  }
  public function blocked(){
    $this->load->view('auth/blocked');
  }
}
