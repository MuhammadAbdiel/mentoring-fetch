<?php 

	class Product extends BaseController{
		public function __construct(){
			parent::__construct();
			$this->load->model('MahasiswaModel');
			$this->load->model('HobyModel');
		}

		public function index(){
			return $this->render("pages/admin/product/index");
		}

		public function create(){
			$data['hoby'] = $this->HobyModel->getAll();
			return $this->render("pages/admin/product/create", $data);
		}

		public function data(){
			header('Content-Type: application/json');
			$mahasiswa = $this->MahasiswaModel->getAll();
			$res = array_map(function($mahasiswa, $index){
				$mahasiswa->no = $index + 1;
				$mahasiswa->aksi = trim('
				<a href="' . base_url('index.php/admin/product/edit/' . $mahasiswa->id) . '" class="btn btn-warning">Edit</a>
				<a href="' . base_url('index.php/admin/product/destroy/' . $mahasiswa->id) . '" class="btn btn-danger">Hapus</a>
			');
				return $mahasiswa;
			}, $mahasiswa, array_keys($mahasiswa));
			echo json_encode([
				'status' => 'success',
				'data' => $res
			]); 
		}

		public function store(){
			$mhs = $this->input->post(['nim', 'nama', 'jenis_kelamin', 'alamat']);
			$this->db->trans_start();
			$this->db->insert('mahasiswa', $mhs);


			$hobby = array_map(function($id_hobi){
				return [
					'id_mahasiswa' => $this->db->insert_id(),
					'id_hobi' => $id_hobi
				];
			}, $this->input->post('id_hobi[]'));

			$this->db->insert_batch('mahasiswa_hobi', $hobby);
			$this->db->trans_complete();
			redirect(base_url('index.php/admin/product'));
		}


		public function destroy($id){
			if(!$id){
				return redirect(base_url('index.php/admin/product'));
			}
			$mahasiswa = $this->MahasiswaModel->find($id);
			if(!$mahasiswa){
				show_404();
			}
			$this->db->trans_start();
			$this->db->delete('mahasiswa_hobi', ['id_mahasiswa' => $id]);
			$this->db->delete('mahasiswa', ['id' => $id]);
			$this->db->trans_complete();
			return redirect(base_url('index.php/admin/product'));
		}

		public function edit($id){
			if(!$id) {
				return redirect(base_url('index.php/admin/product'));
			}
			$mahasiswa = $this->MahasiswaModel->find($id);
			if(!$mahasiswa){
				return show_404();
			}
			$data['hoby'] = $this->HobyModel->getAll();
			$data['choby'] = array_map(function($hoby){
				return $hoby->id_hobi;
			}, $this->db->get_where('mahasiswa_hobi', ['id_mahasiswa' => $id])->result());
			$data['mahasiswa'] = $mahasiswa;
			return $this->render('pages/admin/product/edit', $data);
		}

		public function update($id){
			if(!$id) {
				return redirect(base_url('index.php/admin/product'));
			}
			$mahasiswa = $this->MahasiswaModel->find($id);
			if(!$mahasiswa){
				return show_404();
			}

			$mhs = $this->input->post(['nim', 'nama', 'jenis_kelamin', 'alamat']);
			$this->db->trans_start();
			$this->db->update('mahasiswa', $mhs, ['id' => $id]);
			
			if($this->input->post('id_hobi[]')){
				$this->db->delete('mahasiswa_hobi', ['id_mahasiswa' => $id]);
				$hobby = array_map(function($id_hobi) use ($id){
					return [
						'id_mahasiswa' => $id,
						'id_hobi' => $id_hobi
					];
				}, $this->input->post('id_hobi[]'));
				$this->db->insert_batch('mahasiswa_hobi', $hobby);
			}
			$this->db->trans_complete();
			return redirect(base_url('index.php/admin/product'));
		}
	}	
