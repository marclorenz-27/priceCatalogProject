<?php

class Ajaxsearch_model extends CI_Model
{
	
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("products");
		if($query != ''){
			$this->db->like('product_id', $query);
			$this->db->or_like('product_name', $query);
			$this->db->or_like('slug', $query);
		}
		$this->db->order_by('product_id', 'DESC');
		return $this->db->get();
	}
}

?>