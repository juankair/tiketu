<?php
class Penumpang extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Penumpang');
  }
  function index(){
    $data['judul'] = "Penumpang";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-penumpang',$data);
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

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_penumpang('."'$p->id'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_penumpang('."'$p->id'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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

  function registrasi_penumpang(){
    $data['judul'] = "Registrasi Penumpang";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahpenumpang',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_Penumpang->simpan();
    }else{
      redirect('penumpang');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_Penumpang->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'gander' => $this->input->post('gander')
        );
      $this->M_Penumpang->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_penumpang($kode)
    {
      $this->M_Penumpang->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

}

 ?>
