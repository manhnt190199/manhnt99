
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php require_once "views/layouts/header.php"?>
<div class="container-fluid" style="padding-left: 250px;">
    <!-- Content Header (Page header) -->
    <section class="content">
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
</div>
<br>
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid" style="padding-left: 280px;">
    <!-- Main content -->
    <section class="content">
        <!--            Nội dung hiển thị ở đây-->
        <?php
        //thuộc tính content này sẽ nằm trong class controller
        //            cha, chính là nội dung động theo từng view cụ thể
        echo $this->content;
        ?>
    </section>
    <!-- /.content -->
    <?php
    require_once 'views/layouts/footer.php';
    ?>

</div>

<!-- /.content-wrapper -->

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>



</div>	<!--/.main-->
<?php
    require_once 'views/layouts/footer.php';
?>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/chart-data.js"></script>
<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/custom.js"></script>


</body>
</html>