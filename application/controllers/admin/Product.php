<?php

class Product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->model('ProductModel');
        $this->load->model('IngredientModel');
    }

    public function index()
    {
        return $this->render("pages/admin/product/index", [
            'category' => $this->CategoryModel->getAll(),
        ]);
    }

    public function dataCategory()
    {
        header('Content-Type: application/json');
        $category = $this->CategoryModel->getAll();

        echo json_encode([
            'status' => 'success',
            'data' => $category
        ]);
    }

    public function dataProduct()
    {
        header('Content-Type: application/json');
        $product = $this->ProductModel->getAll();

        echo json_encode([
            'status' => 'success',
            'data' => $product
        ]);
    }

    public function dataIngredient()
    {
        header('Content-Type: application/json');
        $ingredient = $this->IngredientModel->getAll();

        echo json_encode([
            'status' => 'success',
            'data' => $ingredient
        ]);
    }

    public function create()
    {
        return $this->render("pages/admin/product/create", [
            'category' => $this->CategoryModel->getAll(),
        ]);
    }

    public function data()
    {
        header('Content-Type: application/json');
        $product = $this->ProductModel->getAll();
        $res = array_map(function ($product, $index) {
            $product->no = $index + 1;
            $product->aksi = trim('
				<a href="' . base_url('index.php/admin/product/edit/' . $product->id) . '" class="btn btn-warning">Edit</a>
				<a href="' . base_url('index.php/admin/product/destroy/' . $product->id) . '" class="btn btn-danger">Hapus</a>
			');
            return $product;
        }, $product, array_keys($product));
        echo json_encode([
            'status' => 'success',
            'data' => $res
        ]);
    }

    public function store()
    {
        $product = $this->input->post(['product_code', 'name', 'category_id', 'price', 'quantity', 'description']);
        $this->ProductModel->create($product);

        echo json_encode([
            'status' => 'success',
            'message' => 'Product berhasil ditambahkan'
        ]);
    }


    public function destroy($id)
    {
        if (!$id) {
            return redirect(base_url('index.php/admin/product'));
        }
        $product = $this->ProductModel->find($id);
        if (!$product) {
            show_404();
        }

        $this->ProductModel->delete($id);

        echo json_encode([
            'status' => 'success',
            'message' => 'Product berhasil dihapus'
        ]);
    }

    public function edit($id)
    {
        if (!$id) {
            return redirect(base_url('index.php/admin/product'));
        }
        $product = $this->ProductModel->find($id);
        if (!$product) {
            return show_404();
        }

        return $this->render('pages/admin/product/edit', [
            'product' => $product,
            'category' => $this->CategoryModel->getAll(),
        ]);
    }

    public function update($id)
    {
        if (!$id) {
            return redirect(base_url('index.php/admin/product'));
        }
        $product = $this->ProductModel->find($id);
        if (!$product) {
            return show_404();
        }

        $product = $this->input->post(['product_code', 'name', 'category_id', 'price', 'quantity', 'description']);

        $this->ProductModel->update($id, $product);
        return redirect(base_url('index.php/admin/product'));
    }
}
