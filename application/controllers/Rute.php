<?php
class Rute extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Rute');
  }
  function index(){
    redirect('rute/pesawat');
  }

  function pesawat(){
    $data['judul'] = "Rute Pesawat";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans('1')->result();
    $data['bandara'] = $this->M_Rute->get_bandara()->result();
    $data['sts'] = "pesawat";
    $this->load->view('v-rute',$data);
  }

  function kereta(){
    $data['judul'] = "Rute Kereta Api";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans('2')->result();
    $data['stasiun'] = $this->M_Rute->get_stasiun()->result();
    $data['sts'] = "kereta";
    $this->load->view('v-rute',$data);
  }
  public function list_rute($w){
    $list = $this->M_Rute->get_datatables($w);
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $r) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $r->depart_at;
      $row[] = $r->estp;
      if ($w == "1") {
        $row[] = $this->ubahfromb($r->rute_from);
        $row[] = $this->ubahtob($r->rute_to);
      }else{
        $row[] = $this->ubahfrom($r->rute_from);
        $row[] = $this->ubahto($r->rute_to);
      }
      $row[] = $r->price;
      $row[] = $r->description;

      //add html for action
     $row[] = '<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:void(0)" title="Edit" onclick="edit_rute('."'$r->id'".')"><i class="la la-edit"></i></a>
          <a class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_rute('."'$r->id'".')"><i class="la la-trash"></i></a>';
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

  function registrasi_rutekereta(){
    $data['judul'] = "Registrasi rute";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans('2')->result();
    $data['stasiun'] = $this->M_Rute->get_stasiun()->result();
    $data['sts'] = "kereta";
    $this->load->view('v-tambahrute',$data);
  }
  function registrasi_rutepesawat(){
    $data['judul'] = "Registrasi rute";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans('1')->result();
    $data['bandara'] = $this->M_Rute->get_bandara()->result();
    $data['sts'] = "pesawat";
    $this->load->view('v-tambahrute',$data);
  }
  function simpan(){
    if ($this->input->post()) {
      $this->M_Rute->simpan();
    }else{
      redirect('rute');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Rute->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('depart_at' => $this->input->post('depart_at'),
                    'rute_from' => $this->input->post('rute_from'),
                    'rute_to' => $this->input->post('rute_to'),
                    'price' => $this->input->post('price'),
                    'transportationid' => $this->input->post('transportationid'),
                    'estp' => $this->input->post('estp')
        );
      $this->M_Rute->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_rute($kode)
    {
      $this->M_Rute->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
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
