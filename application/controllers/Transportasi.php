<?php
class Transportasi extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Transportasi');
  }
  function index(){
    $data['judul'] = "Transportasi";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['tipe'] = "2";
    $this->load->view('v-transportasi',$data);
  }
  function pesawat(){
    $data['judul'] = "Transportasi";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['tipe'] = "1";
    $this->load->view('v-transportasi',$data);
  }
  function kereta(){
    $data['judul'] = "Transportasi";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $data['tipe'] = "2";
    $this->load->view('v-transportasi',$data);
  }

  public function list_transportasi($tipeshow){
    $list = $this->M_Transportasi->get_datatables($tipeshow);
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

      //add html for action
      $row[] = '<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:void(0)" title="Edit" onclick="edit_transportasi('."'$t->id'".')"><i class="la la-edit"></i></a>
          <a class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_transportasi('."'$t->id'".')"><i class="la la-trash"></i></a>';

      // $row[] = '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
      //                       <i class="la la-edit"></i>
      //                   </a>
      //                   <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
      //                       <i class="la la-trash"></i>
      //                   </a>';

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

  function registrasi_transportasi(){
    $data['judul'] = "Registrasi transportasi";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahtransportasi',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Transportasi->simpan();
    }else{
      redirect('transportasi');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Transportasi->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('code' => $this->input->post('code'),
                    'description' => $this->input->post('description'),
                    'seat_qty' => $this->input->post('seat_qty'),
                    'transportation_typeid' => $this->input->post('transportation_typeid')
        );
      $this->M_Transportasi->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_transportasi($kode)
    {
      $this->M_Transportasi->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

    public function geturut($jd)
    {
      $data = $this->M_Transportasi->geturut($jd);
      echo json_encode($data);
    }

}

 ?>
