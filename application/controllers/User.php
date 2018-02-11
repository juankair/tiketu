<?php
class User extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_User');
  }
  function index(){
    $data['judul'] = "User";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-user',$data);

    
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
      $row[] = str_repeat("*", strlen($u->password));
      $row[] = $u->fullname;
      if ($u->level == 1) {
        $row[] = "Admin";
      }else{
        $row[] = "Operator";
      }

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_user('."'$u->id'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" id="conhapus" onclick="delete_user('."'$u->id'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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

  function registrasi_user(){
    $data['judul'] = "Registrasi user";
    $data['aktif'] = "";
    $data['aktiftik'] ="";
    $data['aktiflap'] = "";
    $this->load->view('v-tambahuser',$data);
  }

  function simpan(){
    if ($this->input->post()) {
      $this->M_User->simpan();
    }else{
      redirect('user');
    }
  }

  public function ajax_edit($id)
  {
    $data = $this->M_User->get_by_id($id);
    echo json_encode($data);
  }

    public function ajax_update()
    {
      $data = array('username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'fullname' => $this->input->post('fullname'),
                    'level' => $this->input->post('level')
        );
      $this->M_User->update(array('id' => $this->input->post('id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function hapus_user($kode)
    {
      $this->M_User->delete_by_id($kode);
      echo json_encode(array("status" => TRUE));
    }

}

 ?>
