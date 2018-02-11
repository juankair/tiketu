<?php 

class Login extends CI_Controller{

  function __construct(){
    parent::__construct();    
    $this->load->model('M_Login');
   if($this->session->userdata('login') && 
      $this->uri->segment(2) != 'logout')
      redirect('homepage');

  }

  function index(){
    $this->load->view('v-login');
  }

  function aksi_login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => $password
      );
    $cek = $this->M_Login->cek_login("t_user",$where);
    if ($cek->num_rows() == 1) {
      foreach ($cek ->result() as $sess) {
        $sess_data['id'] = $sess->id;
        $sess_data['username'] = $sess->username;
        $sess_data['fullname'] = $sess->fullname;
        $sess_data['level'] = $sess->level;
        $sess_data['login'] = true;
        $this->session->set_userdata($sess_data);
      }
      redirect('homepage');
    }else{
      echo "salah";
    }

  }

  function logout(){
    $this->session->sess_destroy();
    redirect('login');
  }
}