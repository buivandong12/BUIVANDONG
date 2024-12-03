<?php
require_once 'models/ProductModel.php';
require_once 'config/database.php';

class ProductController {
    private $model;

    public function __construct() {
        $db = new Database();
        $this->model = new ProductModel($db->getConnection());
    }

    public function index() {
        // Lấy tất cả sản phẩm từ model
        $products = $this->model->getAllProducts();
    
        // Kiểm tra xem có sản phẩm hay không
        if ($products) {
            include 'views/products/index.php'; // Chuyển dữ liệu đến view
        } else {
            // Nếu không có sản phẩm, có thể truyền thông báo về view
            include 'views/products/index.php';
        }
    }

    public function add() {
        include 'views/products/add.php'; // Gọi view để thêm sản phẩm
    }

    public function store($sanpham, $gia) {
        $this->model->addProduct($sanpham, $gia);
        header('Location: index.php?action=index');
    }

    public function edit($id) {
        $product = $this->model->getProductById($id);
        include 'views/products/edit.php'; // Gọi view để sửa sản phẩm
    }

    public function update($id, $sanpham, $gia) {
        $this->model->updateProduct($id, $sanpham, $gia);
        header('Location: index.php?action=index');
    }

    public function delete($id) {
        $this->model->deleteProduct($id);
        header('Location: index.php?action=index');
    }
}
?>