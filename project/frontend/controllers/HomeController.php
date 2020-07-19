<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class HomeController extends Controller {
    public function index() {

        //lấy các sản phẩm để hiển thị ra view
        $product_model = new Product();
        $products = $product_model->getAll();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";

        //truyền biến $product ra view
        $this->content =
            $this->render('views/homes/index.php', [
                'products' => $products
            ]);
        require_once 'views/layouts/main.php';
    }
}