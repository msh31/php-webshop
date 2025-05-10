<?php
require_once ROOT_PATH . '/models/product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAll();
        require_once ROOT_PATH . '/public/views/products/index.php';
    }

    public function show($id) {
        $product = $this->productModel->getById($id);
        if (!$product) {
            prepareNotification("error", "Product not found.");
            redirect(BASE_URL . 'products');
            return;
        }
        require_once ROOT_PATH . '/public/views/products/show.php';
    }
}