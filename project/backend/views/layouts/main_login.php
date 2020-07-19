
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V8</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/webfonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div>
    <?php
    //nhúng file header.php
    //    require_once 'views/layouts/header.php';
    ?>
    <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

        <!-- Content Header (Page header) -->
        <section class="">
            <!--         Nếu có lỗi validate thì mới hiển thị ra   -->
            <?php if (!empty($this->error)): ?>
                <div class="alert alert-danger">
                    <?php echo $this->error; ?>
                </div>
            <?php endif ?>
            <!--         Nếu có lỗi session error thì mới hiển thị ra   -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif ?>
            <!--         Nếu có session success thì mới hiển thị ra   -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
        </section>
            <section class="content">
                <!--            Nội dung hiển thị ở đây-->
                <?php
                //thuộc tính content này sẽ nằm trong class controller
                //            cha, chính là nội dung động theo từng view cụ thể
                echo $this->content;
                ?>
            </section>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div>
        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    //nhúng lại file footer sau khi tách file
    //    require_once 'views/layouts/footer.php';
    ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
</div>
</div>

<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="assets/js/main.js"></script>

</body>
</html>