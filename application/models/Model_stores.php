<?php 

class Model_stores extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the active store data */
	public function getActiveStore()
	{
		$sql = "SELECT * FROM teamfdec_stock.stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getStoresData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM teamfdec_stock.stores where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM teamfdec_stock.stores";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('teamfdec_stock.stores', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('teamfdec_stock.stores', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('teamfdec_stock.stores');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalStores()
	{
		$sql = "SELECT * FROM teamfdec_stock.stores WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}