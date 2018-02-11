<?php
class Rute extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Rute');
  }
  function index(){
    $data['judul'] = "Rute";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans()->result();
    $data['stasiun'] = $this->M_Rute->get_stasiun()->result();
    $this->load->view('v-rute',$data);
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
      $row[] = $r->estp;
      $row[] = $this->ubahfrom($r->rute_from);
      $row[] = $this->ubahto($r->rute_to);
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

  function registrasi_rute(){
    $data['judul'] = "Registrasi rute";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['transportation'] = $this->M_Rute->gettrans()->result();
    $data['stasiun'] = $this->M_Rute->get_stasiun()->result();
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
}
 ?>
