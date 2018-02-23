<?php
class Laporan extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Laporan');
    $this->load->model('M_User');
    $this->load->model('M_Transportasi');
    $this->load->model('M_Rute');
    $this->load->model('M_Penumpang');
  }
  function index(){
    $this->load->view('v-laporan');
  }
  function transportasi(){
    $data['judul'] = "Laporan Transportasi";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";
    $this->load->view('laporan/v-transportasi',$data);
  }

  public function list_transportasi(){
    $list = $this->M_Transportasi->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $t) {
      $row = array();
      $row[] = $t->code;
      $row[] = $t->description;
      $row[] = $t->seat_qty;
      if ($t->transportation_typeid == 1) {
        $row[] = "Pesawat";
      }else{
        $row[] = "Kereta Api";
      }


      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Transportasi->count_all(),
            "recordsFiltered" => $this->M_Transportasi->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }


  function penumpang(){
    $data['judul'] = "Laporan Penumpang";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";
    $this->load->view('laporan/v-penumpang',$data);
  }
public function list_penumpang(){
    $list = $this->M_Penumpang->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $p) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $p->name;
      $row[] = $p->address;
      $row[] = $p->phone;
      if ($p->gander == 1) {
        $row[] = "Laki-laki";
      }else{
        $row[] = "Perempuan";
      }

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Penumpang->count_all(),
            "recordsFiltered" => $this->M_Penumpang->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }


  function user(){
    $data['judul'] = "Laporan User";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";
    $this->load->view('laporan/v-user',$data);
  }
  public function list_user(){
    $list = $this->M_User->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $u) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $u->username;
      $row[] = str_repeat("*", strlen($u->password));;
      $row[] = $u->fullname;
      if ($u->level == 1) {
        $row[] = "Admin";
      }else{
        $row[] = "Operator";
      }

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_User->count_all(),
            "recordsFiltered" => $this->M_User->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  function rute(){
    $data['judul'] = "Laporan Rute";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";
    $this->load->view('laporan/v-rute',$data);
  }

  public function list_rute(){
    $list = $this->M_Rute->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $r) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $r->depart_at;
      $row[] = $r->rute_from;
      $row[] = $r->rute_to;
      $row[] = $r->price;
      $row[] = $r->description;

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Rute->count_all(),
            "recordsFiltered" => $this->M_Rute->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  function pendapatan(){
    $data['judul'] = "Laporan Pendapatan";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";

    // $data['pendapatan'] = $this->M_Laporan->get_lap_pendapatan()->result();
    $listpendapatan = $this->M_Laporan->get_lap_pendapatan()->result();
    
    $datana = array();
    foreach ($listpendapatan as $r) {
    $roow = array();
      $roow[] = $r->reservation_date;
      if ($r->transportation_typeid == "1") {
        $roow[] = $this->ubahfromb($r->rute_from);
        $roow[] = $this->ubahtob($r->rute_to);
      }else{
        $roow[] = $this->ubahfrom($r->rute_from);
        $roow[] = $this->ubahto($r->rute_to);
      }
      $roow[] = $r->name;
      $roow[] = $r->description;
      $roow[] = $r->price;
      $roow[] = $r->transportation_typeid;

      $datana[] = $roow;
    }
    $datajadi[] = $datana;
      $data['datana'] = $datana;
      $data['datajadi'] = $datajadi;

    $this->load->view('laporan/v-pendapatan',$data);
  }

  function pemberangkatan(){
    $data['judul'] = "Laporan Pendapatan";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "m-menu__item--active";

  $listpemberangkatan = $this->M_Laporan->get_lap_pemberangkatan()->result();
      
    $datana = array();
    foreach ($listpemberangkatan as $r) {
    $roow = array();
      if ($r->transportation_typeid == "1") {
        $roow[] = $this->ubahfromb($r->rute_from);
      }else{
        $roow[] = $this->ubahfrom($r->rute_from);
      }
      $roow[] = $r->description;
      if ($r->transportation_typeid == "1") {
        $roow[] = $this->ubahfromb($r->rute_to);
      }else{
        $roow[] = $this->ubahfrom($r->rute_to);
      }
      $roow[] = $r->depart_at;
      $roow[] = $r->price;
      $roow[] = $r->seat_qty;
      $roow[] = $r->reserved;
      $roow[] = $r->transportation_typeid;
      $roow[] = $r->reservation_date;
      $roow[] = $r->estp;

      $datana[] = $roow;
    }
    $datajadi[] = $datana;
      $data['datana'] = $datana;
      $data['datajadi'] = $datajadi;

    $this->load->view('laporan/v-pemberangkatan',$data);
    
    


  }

  public function list_pemberangkatan(){
    $list = $this->M_Laporan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $p) {
      $row = array();
      $row[] = $this->ubahfrom($p->rute_from);
      $row[] = $p->description;
      $row[] = $this->ubahto($p->rute_to);
      $row[] = $p->depart_at . " - 03.01";
      $row[] = $p->price;
      $row[] = $p->seat_qty;
      $row[] = $p->reserved;
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Rute->count_all(),
            "recordsFiltered" => $this->M_Rute->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);

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

    function tambahjam($time){
      $a = '1';
      $time = date('H:i', strtotime('+'.$a.' hour'));
      echo $time;
    }

    function ubahfromb($idfrom){
      $a = $this->M_Rute->getfromb($idfrom)->result();

      foreach ($a as $k) {
        return $k->nama."(".$k->abbr.") ".$k->city;
      }
    }
    function ubahtob($idto){
      $a = $this->M_Rute->gettob($idto)->result();

      foreach ($a as $k) {
        return $k->nama."(".$k->abbr.") ".$k->city;
      }
    }


}
 ?>
