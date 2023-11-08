<div class="modal fade" id="add-product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold fs-5 ">Tambah Product</p>
                <form method="post" class="mt-3" id="form-create">
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
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="select-product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="products_table" class="col-12 table table-striped table-borderless w-100">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="select-ingredient_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Ingredient</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="ingredients_table" class="col-12 table table-striped table-borderless w-100">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="product-preview_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Preview</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <h6>Product Name : </h6>
                        <h6>Product Code : </h6>
                        <h6>Product QTY : </h6>
                    </div>
                    <div class="col-sm-8">
                        <h6 res-p-name>Product Name : </h6>
                        <h6 res-p-code>Product Code : </h6>
                        <h6 res-p-qty>Product QTY : </h6>
                    </div>
                </div>
                <span style="height: 1px; background: gray; width: 100%; display: block;"></span>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Code</td>
                            <td>Name</td>
                            <td>Qty</td>
                        </tr>
                    </thead>
                    <tbody res-p-ingredients>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>



<div class="p-2">
    <div class="row mb-3">
        <div class="col">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-product_modal">Add Product</button>
        </div>
    </div>
    <div class="row mb-3 align-items-end">
        <div class="col-sm-2">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#select-product_modal">Select Product</button>
        </div>
        <div class="row col-sm-8 ms-2 gx-5">
            <div class="col">
                <input type="text" class="form-control" id="product_code_modal" class="ms-2" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="product_name" class="ms-2" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control" id="product_qty" class="ms-2">
            </div>
        </div>
    </div>
    <div class="row mb-3 align-items-end">
        <div class="col-sm-2">
            <button class="btn btn-success" id="add-ingredient_button">Select Ingredient</button>
        </div>
        <div class="row col-sm-8 ms-2 gx-5 align-items-end">
            <div class="col-sm-4">
                <input type="text" class="form-control" id="ingredient_code" class="ms-2" readonly>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="ingredient_name" class="ms-2" readonly>
            </div>
        </div>
        <button class="btn btn-success col-sm-1" id="add-ingredient">Add</button>
    </div>
    <table id="selected-ingredients_table" class="col-12 table table-striped table-borderless w-100">
        <thead class="bg-secondary">
            <tr>
                <th>No</th>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>QTY</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <button class="btn btn-success" id="print-product_btn">Print Product</button>
</div>
<?=
$this->my_loader->push('scripts', '
		<script>
            let addedIngredients = [];
			let ingredientTable, productTable, addedIngredientTable;
			let products = [];

			let ingredients = [];

            productTable = $("#products_table").DataTable({
                "order" : [],
                dom: "tip",
                orderable: true,
                "processing": true,
                ajax: {
                    url: "' . base_url('index.php/admin/product/dataProduct') . '",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "product_code" },
                    { "data": "name" },
                    { 
                        "data": "id",
                        "render" : (data) => `<button class="btn btn-success d-inline-block" id="select-product_btn" data-id="${data}"><i class="fas fa-check fa-2xs" ></i></button>
                        <button class="btn btn-danger" id="delete-product_btn" data-id="${data}"><i class="fas fa-trash fa-2xs" ></i></button>`,
                    },
                ]
            });

            ingredientTable = $("#ingredients_table").DataTable({
                "order" : [],
                dom: "tip",
                orderable: true,
                "processing": true,
                ajax: {
                    url: "' . base_url('index.php/admin/product/dataIngredient') . '",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "ingredient_code" },
                    { "data": "ingredient_name" },
                    { 
                        "data": "id",
                        "render" : (data) => `<button class="btn btn-success" id="select-ingredient_btn" data-id="${data}"><i class="fas fa-check fa-2xs" ></i></button>`,
                    },
                ]
            });

            $("#form-create").attr("action", "' . base_url('index.php/admin/product/store') . '");

            $("#form-create").submit(function(ev){
                ev.preventDefault();
                
                let formData = new FormData();

                const data = {
                    product_code : $("#product_code").val(),
                    name : $("#name").val(),
                    category_id : $("#category_id").val(),
                    price : $("#price").val(),
                    quantity : $("#quantity").val(),
                    description : $("#description").val(),
                };
                formData.append("product_code", data.product_code);
                formData.append("name", data.name);
                formData.append("category_id", data.category_id);
                formData.append("price", data.price);
                formData.append("quantity", data.quantity);
                formData.append("description", data.description);

                fetch($(this).attr("action"), {
                    method: "POST",
                    body: formData,
                })
                    .then(res => res.json())
                    .then(res => {
                        if(res.status == "success"){
                            alert("Product Created");
                            document.getElementById("form-create").reset();
                            $("#add-product_modal").modal("hide");
                            productTable.ajax.reload();
                        }
                    })
                    .catch(err => console.log(err));
            });

            $("#products_table").on("click", "#delete-product_btn", function(){
                const id = $(this).data("id");
                if (confirm("Are you sure want to delete this product?")){
                    fetch("' . base_url('index.php/admin/product/destroy/') . '" + id, {
                        method: "DELETE",
                    })
                        .then(res => res.json())
                        .then(res => {
                            if(res.status == "success"){
                                alert("Product Deleted");
                                productTable.ajax.reload();
                            }
                        })
                        .catch(err => console.log(err));
                }
            });

			function selectProduct(ev){
				ev.preventDefault();
                const selected = productTable.row($(this).parents("tr")).data();
				$("#product_code_modal").val(selected.product_code);
				$("#product_name").val(selected.name);
				$("#product_qty").val(1);
				$("#select-product_modal").modal("hide");
			}

            function refreshIngredientTable(){
                addedIngredientTable.destroy();
                addedIngredientTable  = $("#selected-ingredients_table").DataTable({
					"order" : [],
					dom: "tip",
					data: addedIngredients,
					"columns": [
						{ "data": "no" },
						{ "data": "code" },
						{ "data": "name" },
						{ 
							"data" : "qty",
							"render" : (data, index, row) => `<input type="number" id="qty_in" class="form-control" value="${data}" data-code="${row.code}">`,
						},
						{
							"data" : "code",
							"render" : data => `<button class="btn btn-danger" id="remove-ingredient_btn" data-code="${data}"><i class="fas fa-trash "></i></button>`
						}
					]
				})
            }

			function addIngredient(ev){
				ev.preventDefault();
                if($("#ingredient_name").val() == "" || $("#ingredient_code").val() == ""){
                    alert("Please select ingredient first");
                    return;
                }
                if(addedIngredients.find(val => val.code == $("#ingredient_code").val())){
                    alert("Ingredient already added");
                    $("#ingredient_name").val("");
                    $("#ingredient_code").val("");
                    return;
                }
				const res = {
					no: addedIngredients.length + 1,
					name : $("#ingredient_name").val(),
					code : $("#ingredient_code").val(),
					qty : 1,
				};
				addedIngredients.push(res);
				refreshIngredientTable();
                $("#ingredient_name").val("");
                $("#ingredient_code").val("");

			}

            function printProduct(){
                if(!$("#product_name").val() || !$("#product_code_modal").val() || ! $("#product_name").val() || !$("#product_qty").val() || addedIngredients.length == 0){
                    alert("Please fill all product data");
                    return;
                }
                const data = {
                    product : {
                        name : $("#product_name").val(),
                        code : $("#product_code_modal").val(),
                        qty : $("#product_qty").val(),
                    },
                    ingredients : addedIngredients,
                };
                $("[res-p-name]").text(data.product.name);  
                $("[res-p-code]").text(data.product.code);  
                $("[res-p-qty]").text(data.product.qty);
                const ingredients = data.ingredients.map(e => {
                    return `<tr>
                        <td>${e.no}.</td>
                        <td>${e.code}</td>
                        <td>${e.name}</td>
                        <td>${e.qty}</td>
                    </tr>`;
                }).join("");
                $("[res-p-ingredients]").html(ingredients);
                $("#product-preview_modal").modal("show");
            }
  
			function selectIngredient(ev){
				ev.preventDefault();
                const selected = ingredientTable.row($(this).parents("tr")).data();
				$("#ingredient_code").val(selected.ingredient_code);
				$("#ingredient_name").val(selected.ingredient_name);
				$("#select-ingredient_modal").modal("hide");
			}

			$(document).ready(function(){
				$("#products_table").on("click","#select-product_btn",selectProduct);
				$("#ingredients_table").on("click","#select-ingredient_btn",selectIngredient);
				$("#add-ingredient").on("click",addIngredient);
                $("#add-ingredient_button").click(function(){
                    if($("#product_code_modal").val() == "" || $("#product_name").val() == "" || $("#product_qty").val() == "" || $("#product_qty").val() == 0){
                        alert("Please select product first");
                        return;
                    }
                    $("#select-ingredient_modal").modal("show");
                })
                $("#selected-ingredients_table").on("click", "#remove-ingredient_btn", function(){
                    addedIngredients = addedIngredients.filter(val => val.code != $(this).data("code"));
                    refreshIngredientTable();
                });
                $("#print-product_btn").click(printProduct);

				$("#selected-ingredients_table").on("change", "#qty_in", function(){
					addedIngredients = addedIngredients.map(val => {
						if(val.code == $(this).data("code")){
							val.qty = $(this).val();
						}
						return val;
					});
				});
				addedIngredientTable  = $("#selected-ingredients_table").DataTable({
					"order" : [],
					dom: "tip",
					data: addedIngredients,
					"columns": [
						{ "data": "no" },
						{ "data": "code" },
						{ "data": "name" },
						{ 
							"data" : "qty",
							"render" : (data, index, row) => `<input type="number" id="qty_in" class="form-control" value="${data}" data-code="${row.code}">`,
						},
						{
							"data" : "code",
							"render" : data => `<button class="btn btn-danger" id="remove-ingredient_btn" data-code="${data}"><i class="fas fa-trash "></i></button>`
						}
					]
				});
			});
		</script>
	');
?>