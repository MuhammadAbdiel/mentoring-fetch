<?php

class Ingredient extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('IngredientModel');
    }

    public function index()
    {
        return $this->render("pages/admin/ingredient/index");
    }

    public function create()
    {
        return $this->render("pages/admin/ingredient/create", [
            'category' => $this->ProductModel->getAll(),
        ]);
    }

    public function store()
    {
        $product = $this->input->post(['product_code', 'name', 'category_id', 'price', 'quantity', 'description']);
        $this->ProductModel->create($product);

        redirect(base_url('index.php/admin/product'));
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
        return redirect(base_url('index.php/admin/product'));
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
