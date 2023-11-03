<?php

class MediaModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		$query = $this->db->get('media');
		return $query->result_array();
	}
	public function insert($file_data)
	{
		$this->db->insert('media', $file_data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}
	public function insertMany(array $file_data)
	{
		$this->db->insert_batch('media', $file_data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}
}
