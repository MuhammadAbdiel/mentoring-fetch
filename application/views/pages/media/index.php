<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('success') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif; ?>
<?php
foreach ($file as $data) : ?>
	<div class="modal fade" id="deleteModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Apakah anda yakin ingin menghapus data ini?
					<form action="<?= base_url('index.php/media/delete/' . $data['id']) ?>" method="post">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>


<div class="mb-5">
	<form action="<?= base_url('index.php/media/upload_single') ?>" method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="imageFile">Upload Image Single</label><span class="text-danger ms-1">*</span>
			<input type="file" class="form-control" name="imageFile" accept=".png, .jpg, .jpeg, .jpg" required>
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
</div>
<div class="mb-5">
	<form action="<?= base_url('index.php/media/upload_multiple') ?>" method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="files">Upload Pdf (Multiple)</label><span class="text-danger ms-1">*</span>
			<input type="file" class="form-control" name="files[]" accept=".pdf" multiple required>
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>

</div>


<table class="table table-borderless">
	<thead>
		<th>No</th>
		<th>Action</th>
		<th>Path</th>
		<th>Type</th>

	</thead>
	<tbody>
		<?php

		foreach ($file as $i => $data) :
		?>
			<tr>
				<td><?= ++$i ?></td>
				<td><a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
				<td><?= $data['path'] ?></td>
				<td><?= substr($data['type'], strpos($data['type'], '/') + 1) ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>