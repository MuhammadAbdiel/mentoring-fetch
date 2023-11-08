<p class="fw-bold fs-5 ">Tambah Product</p>
<form method="post" action="<?= base_url('index.php/admin/product/store'); ?>" class="mt-3">
    <div class="mb-3">
        <label for="product_code" class="form-label">Kode Product :</label>
        <input type="text" class="form-control" id="product_code" name="product_code" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nama Product :</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Product Category :</label>
        <div>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Select Category</option>

                <?php foreach ($category as $row) : ?>
                    <option value="<?= $row->id; ?>">
                        <?= $row->name; ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Product Price :</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Product Quantity :</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Product Description :</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>

    <div class="d-flex justify-content-end align-items-center">
        <a href="<?= base_url('index.php/admin/product'); ?>" class="btn btn-light shadow-sm me-2">Cancel</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>

<?php
$this->my_loader->push('scripts', `
			
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function () {
	    $(".select2").select2();
	});
</script>
`);
?>