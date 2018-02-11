<?php
class M_Tiket extends CI_Model{
  function getkereta(){
    return $this->db->get('v_getkereta');
  }
  function getpesawat(){
    return $this->db->get('v_getpesawat');
  }
  function getdari(){
    return $this->db->query("select DISTINCT rute_from from t_rute");
  }

  function getke(){
    return $this->db->query("select DISTINCT rute_to from t_rute");
  }

  public function get_jml_seat($id){
    return $this->db->query("select seat_qty from t_transportation where description = '".$id."' ");
  }
  function getkodecustomer(){
    $tgl = date('Ym');
    $query = $this->db->query(
    "SELECT IFNULL(MAX(SUBSTRING(id,10,3)),0)+1 AS no_urut FROM t_customer WHERE SUBSTRING(id,4,6) = '".$tgl."'");

    $data = $query->row_array();

    $no_urut = sprintf("%'.03d",$data['no_urut']);

    $kode_customer = 'PEN'.$tgl.$no_urut;
          
    return $kode_customer;
  }
  function simpan(){

      for ($i=0; $i < count($this->input->post('kodetiket[]')); $i++) {

      $idcus = $this->getkodecustomer();
      $datacus = array(
        'id' => $idcus,
        'name' => $this->input->post('name['.$i.']'),
        'address' => $this->input->post('address['.$i.']'),
        'phone' => $this->input->post('phone['.$i.']'),
        'gander' => $this->input->post('gander['.$i.']')
      );
      $this->db->insert('t_customer',$datacus);

      $datatiket = array(
        'id' => $this->input->post('kodetiket['.$i.']'),
        'reservation_code' => "DEVTIKETU001",
        'reservation_at' => "Tiketu",
        'reservation_date' => $this->input->post('reservation_date'),
        'customerid' => $idcus,
        'seat_code' => $this->input->post('seat_code['.$i.']'),
        'ruteid' => $this->input->post('ruteid'),
        'depart_at' => date('h:i'),
        'price' => $this->input->post('price'),
        'userid' => $this->session->userdata('id')
      );
			$this->db->insert('t_reservation',$datatiket);
		}
  }
  function get_seat_block($kode,$est){
    $jam = date('h');
    return $this->db->query("SELECT seat_code as seatblock FROM t_reservation  WHERE SUBSTRING(id,1,16) = '".$kode."' and (depart_at + '".$est."') - '".$jam."' >= 0 ");
  }



}

 ?>
