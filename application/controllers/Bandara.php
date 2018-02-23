<?php
class Bandara extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Bandara');
  }
  function index(){
    $data['judul'] = "Bandara";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-bandara',$data);

    
  }

  public function list_bandara(){
    $list = $this->M_Bandara->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $u) {
      $no++;
      $row = array();
      $row[] = $u->id;
      $row[] = $u->nama;
      $row[] = $u->city;
      $row[] = $u->abbr;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_bandara('."'$u->id'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_bandara('."'$u->id'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Bandara->count_all(),
            "recordsFiltered" => $this->M_Bandara->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  function registrasi_bandara(){
    $data['judul'] = "Registrasi bandara";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahbandara',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Bandara->simpan();
    }else{
      redirect('bandara');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Bandara->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('nama' => $this->input->post('nama'),
                    'city' => $this->input->post('city'),
                    'abbr' => $this->input->post('abbr')
        );
      $this->M_Bandara->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_bandara($kode)
    {
      $this->M_Bandara->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

}

 ?>
