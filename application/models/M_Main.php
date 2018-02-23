<?php 
class M_Main extends CI_Model{

	function get_aktivitas(){
		$tgl = date('Y-m-d');
		return $this->db->query("select tr.depart_at, tc.name, tt.transportation_typeid, ta.city, tt.description from t_reservation tr inner join t_customer tc on tr.customerid = tc.id inner join t_rute ts on ts.id = tr.ruteid inner join t_transportation tt on tt.id = ts.transportationid inner join t_stasiun ta on ts.rute_to = ta.id where tr.reservation_date = '".$tgl."'");
	}

	function pendapatanperbulan(){
		$blnnow = date('Y-m-');
		return $this->db->query("select substring(reservation_date,9,2) as tgl, count(id) as jml from t_reservation where reservation_date like '%".$blnnow."%' GROUP by reservation_date");
	}

	function get_pendapatan(){
		$blnnow = date('Y-m-');
		return $this->db->query("select sum(price) as pendapatan from t_reservation where reservation_date like '%".$blnnow."%'");	
	}
	function get_transaksi(){
		$blnnow = date('Y-m-');
		return $this->db->query("select count(id) as transaksi from t_reservation where reservation_date like '%".$blnnow."%'");
	}
	function get_detail(){
		return $this->db->query("select tt.transportation_typeid,tt.description,COUNT(tr.id) as jml from t_rute ts inner join t_reservation tr on ts.id = tr.ruteid inner join t_transportation tt on tt.id = ts.transportationid group by tt.description");
	}
}
 ?>
