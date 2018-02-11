<?php
class Homepage extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Main');
    if(!$this->session->userdata('login')){
      redirect('login');
    }
  }
  function index(){
    $data['judul'] = "Dashboard";
    $data['aktif'] = "m-menu__item--active";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['aktivitas'] = $this->M_Main->get_aktivitas()->result();
    $this->load->view('v-home',$data);
  }
}
 ?>
