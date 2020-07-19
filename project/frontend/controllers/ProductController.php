<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
class ProductController extends Controller {
    //Hiển thị chi tiết sản phẩm
    public function detail() {
        $id = $_GET['id'];
        //gọi model để lấy product tương ứng dựa vào id vừa lấy đc
        $product_model = new Product();
        $product = $product_model->getById($id);
        //lấy nội dung view chi tiết tương ứng
        $this->content =
            $this->render('views/products/detail.php', [
                'product' => $product
            ]);
        //gọi layout để hiển thị ra nội dung view
        require_once 'views/layouts/main.php';
    }

    public function showAll() {
        $params = [];
        if(isset($_POST['filter'])) {
            $str_category_id = '';
            $str_price = '';
            //xử lý để lấy ra chuỗi truy vấn cho category id
            if (isset($_POST['category'])) {
//                category_id IN (1, 2, 3)
                $str_category_id = implode(',', $_POST['category']);
                $str_category_id = "($str_category_id)";
                $str_category_id = "products.category_id IN $str_category_id";
                $params['str_category_id'] = $str_category_id;
//                var_dump($str_category_id);
            }
            //xử lý cho price
            if (isset($_POST['price'])) {
                foreach($_POST['price'] AS $price) {
                    switch ($price) {
                        //tích vào checkbox Dưới 1 triệu
                        case 1: $str_price .= " OR products.price < 1000000";
                        break;
                        //checkbox Từ 1 - 2tr
                        case 2:
                        $str_price .= " OR (products.price BETWEEN 1000000 AND 2000000)";
                        break;
                        //checkbox từ 2 - 3tr
                        case 3:
                        $str_price .= " OR (products.price BETWEEN 2000000 AND 3000000)";
                        break;
                        //checkbox > 3tr
                        case 4:
                        $str_price .= " OR (products.price > 3000000)";
                        break;
                    }

                }
                //cắt bỏ từ OR ở đầu chuỗi để tránh lỗi cú pháp SQL,
                // sử dụng hàm substr, lấy từ ký tự thứ 3 -> hết chuỗi
                $str_price = substr($str_price, 3);
                $str_price = "($str_price)";
                $params['str_price'] = $str_price;
//                var_dump($str_price);
            }
        }
        //lấy ra danh sách categories để hiển thị ra phần lọc
        //danh mục
        $category_model = new Category();
        $categories = $category_model->getAll();
        //lấy ra tất cả sản phẩm trên hệ thống
        $product_model = new Product();
        //truyền mảng params chứa các chuỗi truy vấn liên quan
        //đến lọc danh mục và price nếu có
        $products = $product_model->getAll($params);

        $this->content =
        $this->render('views/products/show_all.php', [
            'categories' => $categories,
            'products' => $products
         ]);
        require_once 'views/layouts/main.php';
    }
}