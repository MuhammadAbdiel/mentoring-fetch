<p class="fw-bold fs-5 ">Edit Product</p>
<form method="post" action="<?= base_url('index.php/admin/mahasiswa/update/' . $mahasiswa->id); ?>" class="mt-3">
	<div class="mb-3">
		<label for="nim" class="form-label">NIM:</label>
		<input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa->nim ?>" required>
	</div>

	<div class="mb-3">
		<label for="nama" class="form-label">Nama:</label>
		<input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa->nama ?>" required>
	</div>

	<div class="mb-3">
		<label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
		<div>
			<select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
				<option value="">Pilih Jenis Kelamin</option>
				<option value="L" <?= $mahasiswa->jenis_kelamin == "L" ? "selected" : "" ?>>Laki-laki</option>
				<option value="P" <?= $mahasiswa->jenis_kelamin == "P" ? "selected" : "" ?>>Perempuan</option>
			</select>
			<div class="mb-3">
				<label for="id_hobi" class="form-label">Hobi:</label>
				<select class="form-select select2" id="id_hobi" name="id_hobi[]" multiple required>
					<option value="">Pilih Hobi</option>
					<?php foreach ($hoby as $row) : ?>
						<option value="<?= $row->id; ?>" <?= in_array($row->id, $choby) ? "selected" : "" ?>>
							<?= $row->hobi; ?>
						</option>
					<?php endforeach; ?>

				</select>
			</div>

			<div class="mb-3">
				<label for="alamat" class="form-label">Alamat:</label>
				<textarea class="form-control" id="alamat" name="alamat" required><?= $mahasiswa->alamat ?></textarea>
			</div>

			<div class="d-flex justify-content-end align-items-center">
				<a href="<?= base_url('mahasiswa'); ?>" class="btn btn-light shadow-sm me-2">Cancel</a>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
</form>

<?php
$this->my_loader->push('scripts', '
			
			<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
			<script>
				$(document).ready(function () {
				$(".select2").select2();
				});
			</script>
		');
?>