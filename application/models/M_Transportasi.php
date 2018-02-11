<?php
class M_Transportasi extends CI_Model{

  var $table = 't_transportation';
  var $column_order = array('id','code','description','seat_qty','transportation_typeid'); //set column field database for datatable orderable
  var $column_search = array('id','code','description','seat_qty','transportation_typeid'); //set column field database for datatable searchable just firstname , lastname , address are searchable
  var $order = array('id' => 'asc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  private function _get_datatables_query()
  {
    $this->db->from($this->table);

    $i = 0;

    foreach ($this->column_search as $item) // loop column
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {

        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if(count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if(isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function get_datatables($tipeshow)
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
  $this->db->where('transportation_typeid',$tipeshow);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function get_by_id($id)
  {
    $this->db->from($this->table);
    $this->db->where('id',$id);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
  }

  function simpan(){
    $data = array('id' => $this->input->post('id'),
                  'code' => $this->input->post('code'),
                  'description' => $this->input->post('description'),
                  'seat_qty' => $this->input->post('seat_qty'),
                  'transportation_typeid' => $this->input->post('transportation_typeid')
                  );
    $this->db->insert($this->table,$data);
  }

  public function geturut($jd)
  {
    $tahun_sekarang = date('Y');
		$query = $this->db->query(
		"SELECT IFNULL(MAX(SUBSTRING(code,9,11)),0)+1 AS no_urut FROM t_transportation
		WHERE SUBSTRING(code,1,8) = '".$jd."'");

    $data = $query->row_array();

		$no_urut = sprintf("%'.03d",$data['no_urut']);

		$jd = $no_urut;
    return $jd;
  }

}
 ?>
