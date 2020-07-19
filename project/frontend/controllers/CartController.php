<?php
//controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

//xử lý thêm/sửa/xóa/liệt kê giỏ hàng
class CartController extends Controller {

    //xử lý thêm sản phẩm vào giỏ hàng
    public function add() {

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        //tạo 1 mảng chứa các thông tin cần thiết để thêm vào giỏ
        $cart = [
          'name' => $product['title'],
          'price' => $product['price'],
          'avatar' => $product['avatar'],
            //mặc định mỗi lần thêm chỉ thêm 1 sản phẩm
          'quality' => 1
        ];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$id] = $cart;
        } else {
            // danh sách các key của giỏ hàng
            if (!array_key_exists($id, $_SESSION['cart'])) {
                $_SESSION['cart'][$id] = $cart;
            } else {
                //trường hợp id sp đã tồn tại trong danh sách các
                //key của mảng giỏ hàng, thì chỉ cập nhật số lương
                //cho phần tử đó trong giỏ hàng
                $_SESSION['cart'][$id]['quality']++;
            }

        }
    $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
        header("Location: $url_redirect");
        exit();
    }

    //liệt kê giỏ hàng
    public function index() {
        //xử lý submit form, cập nhật lại giỏ hàng
        //nếu user submit form, click nút Cập nhật giỏ hàng
        if (isset($_POST['submit'])) {
            //lặp giỏ hàng, và gán số lượng tương ứng với sản phẩm
            //trong giỏ hàng đc gửi từ form lên cho giỏ hàng tương
            //ưng
            foreach($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quality']
                    = $_POST[$product_id];
            }
            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
        }


        $this->content =
            $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        //do đã dùng rewrite url để validate id r, nên ko cần code
        //validate nữa
        $product_id = $_GET['id'];
        //xóa phần tử của giỏ hàng với key chính là id của sản
        //phẩm vừa bắt đc từ url
        unset($_SESSION['cart'][$product_id]);
        //nếu như xóa hết toàn bộ sản phẩm trong giỏ hàng
        //thì sẽ xóa luôn giỏ hàng đó
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        $_SESSION['success'] = 'Xóa sản phẩm khỏi giỏ hàng thành công';
        //chuyển hướng về trang giỏ hàng của bạn
        //khi chuyển hướng về link url dạng rewrite, thì cần lấy
        //đc url gốc của ứng dụng, $_SERVER['SCRIPT_NAME']
        $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
        header("Location: $url_redirect");
        exit();
    }
}