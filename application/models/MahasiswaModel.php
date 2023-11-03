<?php 

	Class MahasiswaModel extends CI_Model{
		protected $table = 'mahasiswa';
		protected $primary = 'id';

		public function __construct(){
			parent::__construct();
		}

		public function getAll(){
		return  $this->db->get($this->table)->result();
			
		}

		public function find($id){
			return $this->db->get_where($this->table, [$this->primary => $id])->row();
		}

		public function create($data){
			return $this->db->insert($this->table, $data);
		}
	}
