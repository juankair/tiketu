<?php
class stasiun extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Stasiun');
  }
  function index(){
    $data['judul'] = "Stasiun";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-stasiun',$data);

    
  }

  public function list_stasiun(){
    $list = $this->M_Stasiun->get_datatables();
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
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_stasiun('."'$u->id'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_stasiun('."'$u->id'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Stasiun->count_all(),
            "recordsFiltered" => $this->M_Stasiun->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

  function registrasi_stasiun(){
    $data['judul'] = "Registrasi stasiun";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahstasiun',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Stasiun->simpan();
    }else{
      redirect('stasiun');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Stasiun->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('nama' => $this->input->post('nama'),
                    'city' => $this->input->post('city'),
                    'abbr' => $this->input->post('abbr')
        );
      $this->M_Stasiun->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_stasiun($kode)
    {
      $this->M_Stasiun->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

}

 ?>
