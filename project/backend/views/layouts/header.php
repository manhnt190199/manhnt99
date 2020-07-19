<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div >
        <div class="navbar-header" style="background-color: #8ad919">
            <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="assets/images/m1.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $_SESSION['user']['username']?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li ><a href="index.php?controller=category&action=index">
                <i ></i> <span>Quản lý danh mục</span>
                <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
            </a></li>
        <li><a href="index.php?controller=product&action=index">Quản lí sản phẩm</a></li>
        <li><a href="index.php?controller=login&action=logout"> Logout</a></li>
    </ul>
</div><!--/.sidebar-->