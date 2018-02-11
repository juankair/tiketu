<?php 
class M_Main extends CI_Model{

	function get_aktivitas(){
		$tgl = date('Y-m-d');
		return $this->db->query("select tr.depart_at, tc.name, tt.transportation_typeid, ta.city, tt.description from t_reservation tr inner join t_customer tc on tr.customerid = tc.id inner join t_rute ts on ts.id = tr.ruteid inner join t_transportation tt on tt.id = ts.transportationid inner join t_stasiun ta on ts.rute_to = ta.id where tr.reservation_date = '".$tgl."'");
	}
}
 ?>
