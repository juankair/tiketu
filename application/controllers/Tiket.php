<?php
class Tiket extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Tiket');
    $this->load->model('M_Rute');
  }
  function index(){
    // $data['judul'] = "Beli Tiket";
    // $data['aktif'] = "";
    // $data['aktiflap'] = "";
    // $data['aktiftik'] ="m-menu__item--active";
    // $data['getkereta'] = $this->M_Tiket->getkereta()->result();
    // $data['getpesawat'] = $this->M_Tiket->getpesawat()->result();
    // $data['dari'] = $this->M_Tiket->getdari()->result();
    // $data['ke'] = $this->M_Tiket->getke()->result();
    // $this->load->view('v-tiket',$data);

    redirect('tiket/kereta');
  }
  function pesawat(){
    $data['judul'] = "Beli Tiket Pesawat";
    $data['aktif'] = "";
    $data['aktiflap'] = "";
    $data['aktiftik'] ="m-menu__item--active";
    $data['getkereta'] = $this->M_Tiket->getkereta()->result();
    $data['getpesawat'] = $this->M_Tiket->getpesawat()->result();
    $data['dari'] = $this->M_Tiket->getdari()->result();
    $data['ke'] = $this->M_Tiket->getke()->result();
    $this->load->view('v-tiketpesawat',$data);
  }
  function order(){
    $data['judul'] = "Beli Tiket";
    $data['aktif'] = "";
    $data['aktiflap'] = "";
    $data['aktiftik'] ="m-menu__item--active";
    $data['waktu'] = $this->input->post('waktu');
    $data['dari'] = $this->input->post('dari');
    $data['ke'] = $this->input->post('ke');
    $data['harga'] = $this->input->post('harga');
    $data['nama'] = $this->input->post('nama');
    $data['dewasa'] = $this->input->post('dewasa');
    $data['jmltempatduduk'] = $this->M_Tiket->get_jml_seat($this->input->post('nama'))->row();
    $data['seat_block'] = $this->M_Tiket->get_seat_block(strtoupper("TIK".substr($this->input->post('nama'),0,3).date('Ymd')).$this->input->post('idrute') , $this->input->post('estp'))->result();

    $this->load->view('v-order',$data);
  }
  function checkout(){
    $data['judul'] = "Pembayaran";
    $data['aktiflap'] = "";
    $data['aktif'] = "";
    $data['aktiftik'] ="m-menu__item--active";
    $data['koderes'] = strtoupper("TIK".substr($this->input->post('tnama'),0,3).date('Ymd').$this->input->post('idrute'));
    

    $this->load->view('v-checkout',$data);
  }
  function kereta(){
    $data['judul'] = "Beli Tiket Kereta Api";
    $data['aktif'] = "";
    $data['aktiflap'] = "";
    $data['aktiftik'] ="m-menu__item--active";
    $data['getkereta'] = 
    $data['getpesawat'] = $this->M_Tiket->getpesawat()->result();

    $listkereta = $this->M_Tiket->getkereta()->result();
    
    $datana = array();
    foreach ($listkereta as $r) {
    $roow = array();
      $roow[] = $r->id;
      $roow[] = $r->depart_at;
      $roow[] = $this->ubahfrom($r->rute_from);
      $roow[] = $this->ubahto($r->rute_to);
      $roow[] = $r->price;
      $roow[] = $r->description;
      $roow[] = $r->estp;

      //add html for action
      $roow[] = '<button class="btn btn-primary btn-pilih">Pilih</button>';

      $datana[] = $roow;
    }
    $datajadi[] = $datana;
      $data['datana'] = $datana;
      $data['datajadi'] = $datajadi;

    $listf = $this->M_Tiket->getdari()->result();
    foreach ($listf as $l) {
      $rowf[] = $this->ubahfrom($l->rute_from);
    }
      $data['dari'] = $rowf;


    $listt = $this->M_Tiket->getke()->result();
    foreach ($listt as $l) {
      $rowt[] = $this->ubahto($l->rute_to);
    }
      $data['ke'] = $rowt;


    $this->load->view('v-tiketkereta',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Tiket->simpan();
    }else{
      redirect('tiket');
    }
  }
  function faktur(){
    $data['judul'] = "Faktur";
    $this->load->view('v-fakturtiket',$data);
  }

  function ubahfrom($idfrom){
      $a = $this->M_Rute->getfrom($idfrom)->result();

      foreach ($a as $k) {
        return $k->nama."(".$k->abbr.") ".$k->city;
      }
    }
    function ubahto($idto){
      $a = $this->M_Rute->getto($idto)->result();

      foreach ($a as $k) {
        return $k->nama."(".$k->abbr.") ".$k->city;
      }
    }

}

 ?>
