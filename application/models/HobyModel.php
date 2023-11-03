<?php 

	class HobyModel extends CI_Model{
		protected $table = 'ref_hobi';
		protected $primary = 'id';

		public function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->db->get($this->table)->result();
		}

	
	}
?>
