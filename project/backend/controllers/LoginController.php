<?php
//controllers/LoginController.php
//xử lý đăng ký, đăng nhập cho user
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class LoginController extends Controller {

    //xử lý đăng ký user
    public function signup() {
        //xử lý submit form

        if (isset($_POST['submit'])) {
            //tạo biến và gán các giá trị từ form cho biến
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            //validate form,
            // - ko đc để trống username và password
            // - trường password và password confirm phải giống nhau
            if (empty($username) || empty($password)) {
                $this->error = 'Username hoặc password ko đc để trống';
            } else if ($password != $confirm_password) {
                $this->error = 'Password confirm chưa đúng';
            }
            //xử lý đăng ký user trong trường hợp ko có lỗi validate
            if (empty($this->error)) {
                //cần kiểm tra trường hợp username đã tồn tại
                //trong csdl thì báo lỗi
                $user_model = new User();
                //lấy thông tin user dựa vào username
                $user = $user_model->getUser($username);
                //trường hợp username đã tồn tại
                if (!empty($user)) {
                    $this->error = 'Username đã trùng trong CSDL';
                } else {
                    //gán các giá trị cho thuộc tính tương ứng
                    //của model
                    $user_model->username = $username;
                    //ko bao giờ đc lưu password kiểu plain text
                    //bắt buộc phải mã hóa password trước khi lưu
                    //có rất nhiều cơ chế mã hóa, với mục đích demo
                    //thì sẽ sử dụng cơ chế mã hóa md5 cho đơn giản
//                    $user_model->password = $password;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();
                    if($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                    } else {
                        $_SESSION['error'] = 'Đăng ký thất bại';
                    }
                    header
                    ('Location: index.php?controller=login&action=login');
                    exit();
                }
            }
        }

        //lấy nội dung view tương ứng
        $this->content =
            $this->render('views/users/signup.php');
        //gọi layout tương ứng
        require_once 'views/layouts/main_login.php';
    }

    //xử lý login
    public function login() {
        //xử lý submit form
        //debug thông tin mảng
        //luôn xử lý submit form trước đoạn code hiển thị view

        if (isset($_POST['submit'])) {
            //gán biến
            $username = $_POST['username'];
            $password = $_POST['password'];
            //check validate
//            - ko đc để trống cả 2 trường
            if (empty($username) || empty($password)) {
            $this->error = 'Ko đc để trống username hoặc password';
            }
            //xử lý logic submit form chỉ khi nào ko có lỗi validate
            if (empty($this->error)) {
                //xử lý login thì thường sẽ tạo ra 1 session chứa
                //thông tin của user tìm được
                $user_model = new User();
                //do password lưu trong CSDL đang đc mã hóa
                //theo cơ chế md5
                $password = md5($password);
                //gọi phương thức lấy user từ csdl
                //dựa vào username và password đã mã hóa
                $user = $user_model
                    ->getUserLogin($username, $password);
                if (empty($user)) {
                    $_SESSION['error'] = 'Sai username hoặc password';
                    header
                    ('Location: index.php?controller=login&action=login');
                    exit();
                } else {
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    //khi login thành công cần tạo session với giá trị
                    //chính là mảng user vừa tìm đc
                    $_SESSION['user'] = $user;
                    //chuyển hướng tới trang admin
                    header
                    ('Location: index.php?controller=category&action=index');
                    exit();
                }

            }
        }

        //lấy nội dung view login
        $this->content =
            $this->render('views/users/login.php');
        //gọi layout để hiển thị view
        require_once 'views/layouts/main_login.php';
    }

    //đăng xuất người dùng khỏi hệ thống
    public function logout() {
        //xóa tất cả các session liên quan đến user đã đăng nhập
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Logout thành công';
        //chuyển hướng về trang login
        header
        ('Location: index.php?controller=login&action=login');
        exit();
    }
}