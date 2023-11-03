<?php

class Media extends BaseController
{
	public function construct()
	{
		parent::__construct();
		$this->load->model('MediaModel');
	}

	public function index()
	{
		$this->load->model('MediaModel');
		$file = $this->MediaModel->get_data();
		$data = [
			'file' => $file,
			'error' => '',
		];
		$this->render('pages/media/index', $data);
	}

	public function upload_single()
	{

		$config['upload_path'] = 'public/uploads/';
		$config['allowed_types'] = 'png|jpg|jpeg|gif';
		$config['max_size'] = 5000;
		$this->load->model('MediaModel');
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('imageFile')) {
			$error = array('error' => $this->upload->display_errors());
			dd($error);
			$this->load->view('pages/media/index', $error);
		} else {
			$uploaded = $this->upload->data();
			$image_data = array(
				'path' => 'public/uploads/' . $uploaded['file_name'],
				'type' => $uploaded['file_type']
			);
			if ($this->MediaModel->insert($image_data)) {
				$this->session->set_flashdata('success', 'File berhasil diupload');
				redirect(base_url('index.php/media'));
			} else {
				$error = array('error' => 'Gagal memasukkan data ke database');
				redirect('pages/media/index');
			}
		}
	}

	public function upload_multiple()
	{
		$this->load->model('MediaModel');
		$files = $_FILES['files'];
		$uploaded_files_data = array();
		foreach ($files['name'] as $key => $pdfFile) {
			$_FILES['pdfFile']['name'] = $files['name'][$key];
			$_FILES['pdfFile']['type'] = $files['type'][$key];
			$_FILES['pdfFile']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['pdfFile']['error'] = $files['error'][$key];
			$_FILES['pdfFile']['size'] = $files['size'][$key];

			$config['upload_path'] = 'public/uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 5000; // in KB (5MB)

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('pdfFile')) {
				$uploaded_data = $this->upload->data();
				$file_data = array(
					'path' => 'public/uploads/' . $uploaded_data['file_name'],
					'type' => $uploaded_data['file_type']
				);
				array_push($uploaded_files_data, $file_data);
			}
		}

		if (!empty($uploaded_files_data)) {

			if ($this->MediaModel->insertMany($uploaded_files_data)) {
				$data = array('upload_data' => $inserted_files);
				$this->session->set_flashdata('success', 'File berhasil diupload');
				redirect(base_url('index.php/media'));
			} else {
				$error = array('error' => 'Gagal memasukkan data ke database');
				redirect(base_url('index.php/media'));
			}
		} else {
			$error = array('error' => 'Gagal mengunggah file PDF');
			redirect(base_url('index.php/media'));
		}
	}

	public function upload_file()
	{
		$this->load->library('upload', $config);
		$config['upload_path'] = 'public/uploads/';
		$config['allowed_types'] = 'png|jpg|jpeg|gif';
		$config['max_size'] = 5000;

		if (!$this->upload->do_upload('imageFile')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload', $error);
		} else {
			$pdfFiles = $_FILES['pdfFiles'];
			$uploaded_files_data = array();
			$uploaded_image_data = $this->upload->data();
			$image_data = array(
				'path' => 'public/uploads/' . $uploaded_image_data['file_name'],
				'type' => $uploaded_image_data['file_type']
			);
			array_push($uploaded_files_data, $image_data);

			foreach ($pdfFiles['name'] as $key => $pdfFile) {
				$_FILES['pdfFile']['name'] = $pdfFiles['name'][$key];
				$_FILES['pdfFile']['type'] = $pdfFiles['type'][$key];
				$_FILES['pdfFile']['tmp_name'] = $pdfFiles['tmp_name'][$key];
				$_FILES['pdfFile']['error'] = $pdfFiles['error'][$key];
				$_FILES['pdfFile']['size'] = $pdfFiles['size'][$key];

				$config['upload_path'] = 'public/uploads/';
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 5000; // in KB (5MB)

				$this->upload->initialize($config);

				if ($this->upload->do_upload('pdfFile')) {
					$uploaded_data = $this->upload->data();
					$file_data = array(
						'path' => 'public/uploads/' . $uploaded_data['file_name'],
						'type' => $uploaded_data['file_type']
					);
					array_push($uploaded_files_data, $file_data);
				}
			}

			if (!empty($uploaded_files_data)) {

				$inserted_files = $this->M_HandleFile->insert_files($uploaded_files_data);

				if (!empty($inserted_files)) {
					$data = array('upload_data' => $inserted_files);
					$this->session->set_flashdata('success', 'File berhasil diupload');
					redirect('upload');
				} else {
					$error = array('error' => 'Gagal memasukkan data ke database');
					redirect('upload');
				}
			} else {
				$error = array('error' => 'Gagal mengunggah file PDF');
				redirect('upload');
			}
		}
	}


	public function delete($fileId)
	{

		$fileData = $this->db->where('id', $fileId)->get('media')->row();
		$filePath = $fileData->path;

		if (file_exists($filePath)) {
			unlink($filePath);
		}

		$this->db->where('id', $fileId);
		$this->db->delete('media');


		$this->session->set_flashdata('success', 'File berhasil dihapus');

		redirect(base_url('index.php/media'));
	}
}
