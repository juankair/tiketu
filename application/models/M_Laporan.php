<?php 
class M_Laporan extends CI_Model{

 

  function get_lap_pendapatan(){
  	return $this->db->get('v_pendapatan');
  }

function get_lap_pemberangkatan(){
    return $this->db->get('v_pemberangkatan');
  }

  
}
 ?>