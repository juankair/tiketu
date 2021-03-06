<?php
class M_Rute extends CI_Model{

  var $table = 't_rute';
  var $column_order = array('id','depart_at','rute_from','rute_to','price','transportationid','estp'); //set column field database for datatable orderable
  var $column_search = array('id','depart_at','rute_from','rute_to','price','transportationid','estp'); //set column field database for datatable searchable just firstname , lastname , address are searchable
  var $order = array('id' => 'asc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  private function _get_datatables_query()
  {

    $this->db->from('v_getnmt');

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

  function get_datatables($w)
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $this->db->where('transportation_typeid',$w);
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
                  'depart_at' => $this->input->post('depart_at'),
                  'rute_from' => $this->input->post('rute_from'),
                  'rute_to' => $this->input->post('rute_to'),
                  'price' => $this->input->post('price'),
                  'transportationid' => $this->input->post('transportationid'),
                  'estp' => $this->input->post('estp'),
                  'idstasiun' => $this->input->post('rute_from'),
                  );
    $this->db->insert($this->table,$data);
  }

  function gettrans($w){
    $this->db->where('transportation_typeid',$w);
    return $this->db->get('t_transportation');
  }
  function get_stasiun(){
    return $this->db->get('t_stasiun');
  }
  function get_bandara(){
    return $this->db->get('t_bandara');
  }

  function getfrom($idfrom){
    return $this->db->query("SELECT * from t_stasiun where id= '".$idfrom."' ");
  }
   function getto($idto){
    return $this->db->query("SELECT * from t_stasiun where id='".$idto."' ");
  }

  function getfromb($idfrom){
    return $this->db->query("SELECT * from t_bandara where id= '".$idfrom."' ");
  }
   function gettob($idto){
    return $this->db->query("SELECT * from t_bandara where id='".$idto."' ");
  }

}

 ?>