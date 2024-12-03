<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    case 'store':
        $controller->store($_POST['sanpham'], $_POST['gia']);
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id, $_POST['sanpham'], $_POST['gia']);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        echo "Hành động không hợp lệ!";
        break;
}
?>