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
    $data['perbln'] = $this->M_Main->pendapatanperbulan()->result();
    $data['pendapatan'] = $this->M_Main->get_pendapatan()->result();
    $data['transaksi'] = $this->M_Main->get_transaksi()->result();
    $data['detail'] = $this->M_Main->get_detail()->result();
      // $datacek = [1,2,3,4];
    // print_r($perbln[0]->jml);

    $this->load->view('v-home',$data);
  }
}
 ?>
