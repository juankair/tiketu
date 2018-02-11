<?php
class Tipe extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Tipe');
  }
  function index(){
    $data['judul'] = "Tipe";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tipe',$data);

    
  }

  public function list_tipe(){
    $list = $this->M_Tipe->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $u) {
      $no++;
      $row = array();
      $row[] = $u->id;
      $row[] = $u->description;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_tipe('."'$u->id'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_tipe('."'$u->id'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Tipe->count_all(),
            "recordsFiltered" => $this->M_Tipe->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  function registrasi_tipe(){
    $data['judul'] = "Registrasi tipe";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahtipe',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Tipe->simpan();
    }else{
      redirect('tipe');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Tipe->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('id' => $this->input->post('id'),
                    'description' => $this->input->post('description')
        );
      $this->M_Tipe->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_tipe($kode)
    {
      $this->M_Tipe->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

}

 ?>
