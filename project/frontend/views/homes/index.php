<?php
//nhúng class Helper để gọi phương thức lấy slug của chi tiết sp
require_once 'helpers/Helper.php';
?>
<!--views/homes/index.php-->
<div class="slider__container slider--one bg__cat--3" style="height: 700px;">
    <div class="slide__container slider__activation__wrap owl-carousel" style="height: 600px;">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height" >
            <div class="container" >
                <div class="row align-items__center" style="height: 600px;">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6" >
                        <div class="slide" >
                            <div class="slider__inner" style="height: 400px;">
                                <h2>New Smartphone 2020</h2>
                                <h1>Asbab</h1>
                                <div class="cr__btn">
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="assets/images/slider/fornt-img/1.jpg" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height" >
            <div class="container">
                <div class="row align-items__center" style="height: 600px;">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner" style="height: 400px;">
                                <h2>New Smartphone 2020</h2>
                                <h1>Asbab</h1>
                                <div class="cr__btn">
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="assets/images/slider/fornt-img/4.jpg" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" ><a href="danh-sach-san-pham" style="font-family: 'Times New Roman'"> SẢN PHẨM MỚI RA MẮT</a>
                    </h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <!-- Start Single Category -->
                    <?php if (!empty($products)): ?>
                        <?php
                        foreach ($products AS $product):
                            $product_title = $product['title'];
                            $product_slug = Helper::getSlug($product_title);
                            $product_id = $product['id'];
                            $product_price = $product['price'];
                            $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                            $product_summary = $product['summary'];
                            ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12" >
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?php echo $product_link; ?>">
                                    <img src="../backend/assets/uploads/<?php echo $product['avatar']; ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="<?php echo $product_link; ?>"><i class="icon-heart icons"></i></a></li>

                                    <li><a href="them-vao-gio-hang/<?php echo $product['id']; ?>"><i class="icon-handbag icons"></i></a></li>

                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><i class="icon-shuffle icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                    <h4><a href="<?php echo $product_link; ?>"><?php echo $product_title;?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize" style="color: red;"><?php echo number_format($product_price  );?> đ</li>
                                    <strike><li><?php echo number_format($product_price*1.5);?> đ</li></strike>
                                </ul>

                            </div>


                        </div>
                    </div>
                    <!-- End Single Category -->
                    <!-- Start Single Category -->
                    <?php endforeach; ?>
                    <?php else: ?>
                        <h2>Không có sản phẩm nào</h2>
                    <?php endif; ?>

                    <!-- End Single Category -->
                    <!-- Start Single Category -->

                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <img src="assets/images/banner2.jpg"  alt="">
</div>
</div>
<!-- End Prize Good Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" STYLE="font-family: 'Times New Roman'">BEST SELLER</h2>
                    <p style="font-family: 'Times New Roman'">Từ 20/20 đến hết 12/12</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="../backend/assets/uploads/1594355027-iphone-11-pro-max-space-select-2019.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Iphone 11 Promax</a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize"><?php echo number_format($product_price);?></li>
                                <strike><li><?php echo number_format($product_price*1.5);?></li></strike>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="../backend/assets/uploads/1594354956-600_iphone_7_plus_silver_800x800_1_1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Iphone 7 Plus </a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize"><?php echo number_format($product_price*0.7);?></li>
                                <strike><li><?php echo number_format($product_price*1.4);?></li></strike>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="../backend/assets/uploads/1594355066-s20_ultra_bts_edition_0003_samsung_galaxy_s20_plus_bts_edit.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Samsung Galaxy S20 Ultra</a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize"><?php echo number_format($product_price*0.9);?></li>
                                <strike><li><?php echo number_format($product_price*1.6);?></li></strike>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="../backend/assets/uploads/1594355091-xanh_78l4-a2_1_2_1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="product-details.html">Samsung A7</a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize"><?php echo number_format($product_price*0.5);?></li>
                                <strike><li><?php echo number_format($product_price*1.5);?></li></strike>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- Start Testimonial Area -->
<div class="container">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <img src="assets/images/banner4.jpg"  alt="">
    </div>
</div>
<!-- End Testimonial Area -->
<!-- Start Top Rated Area -->
<section class="top__rated__area bg__white pt--100 pb--110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Top Rated</h2>
                    <p>But I must explain to you</p>
                </div>
            </div>
        </div>
        <div class="row mt--20">
            <!-- Start Single Product -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="product-details.html">
                            <img src="../backend/assets/uploads/1594355027-iphone-11-pro-max-space-select-2019.jpg" alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="product-details.html">Iphone 11 Promax</a></h2>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="top__pro__prize">
                            <li class="old__prize"><?php echo number_format($product_price*0.5);?></li>
                            <strike><li><?php echo number_format($product_price*1.5);?></li></strike>
                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
            <!-- Start Single Product -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="product-details.html">
                            <img src="../backend/assets/uploads/1594355091-xanh_78l4-a2_1_2_1.jpg" alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="product-details.html">Samsung A7</a></h2>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="top__pro__prize">
                            <li class="old__prize"><?php echo number_format($product_price*0.6);?></li>
                            <strike><li><?php echo number_format($product_price*1.4);?></li></strike>
                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
            <!-- Start Single Product -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="product-details.html">
                            <img src="../backend/assets/uploads/1594355066-s20_ultra_bts_edition_0003_samsung_galaxy_s20_plus_bts_edit.jpg" alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="product-details.html">Samsung Galaxy S20 Ultra</a></h2>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="top__pro__prize">
                            <li class="old__prize"><?php echo number_format($product_price*0.8);?></li>
                            <strike><li><?php echo number_format($product_price*1.7);?></li></strike>
                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
        </div>
    </div>
</section>
<!-- End Top Rated Area -->
<!-- Start Brand Area --><!-- End Brand Area -->
<div class="container">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <img src="assets/images/banner3.jpg"  alt="">
    </div>
</div><!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Blog</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="assets/images/pic1.webp" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>March 22, 2016</span>
                            </div>
                            <h2><a href="blog-details.html">SAMSUNG GALAXY NOTE 10 PLUS<BR/>Siêu phẩm giá cực tốt</a></h2>
<p>Là phiên bản nâng cấp đáng giá ra đời cùng thời điểm với Samsung Galaxy Note 10, Samsung Galaxy Note 10 Plus là sự lựa chọn tuyệt vời cho người dùng đam mê công nghệ có nhu cầu sở hữu một chiếc điện thoại hoàn hảo về mọi mặt. Với Note 10 Plus, Samsung đã thật sự mang đến một chiếc điện thoại có sức mạnh vượt trội, đáp ứng toàn diện các nhu cầu về làm việc và giải trí của người dùng. Ngoài ra, bạn có thể tham khảo phiên bản rút gọn Note 10 Lite với giá bán phải chăng hơn.</p>
                            <div class="blog__btn">
                                <a href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="assets/images/pic3.webp" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>May 22, 2017</span>
                            </div>
                            <h2><a href="blog-details.html">REALME C11- HÀNG MỚI GIÁ TỐT, ĐĂNG KÍ NHẬN TIN !</a></h2>
<p>Các fan của dòng smartphone giá rẻ Realme giờ đây có thể sở hữu cho mình sản phẩm mới nhất mang tên Realme C11. Máy được trang bị màn hình lớn, thời lượng pin ấn tượng cùng bộ vi xử lý Helio G35 đầu tiên trên thế giới, đây hứa hẹn sẽ là chiếc smartphone chuyên chơi game tốt nhất trong phân khúc trung cấp giá rẻ.</p>
                            <div class="blog__btn">
                                <a href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="assets/images/pic2.webp" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>March 22, 2018</span>
                            </div>
                            <h2><a href="blog-details.html">REALME WATCH - Đồng hồ thông minh mới, nhiều ưu đãi hấp dẫn</a></h2>
<p>Thương hiệu smartphone đình đám Realme nay đã lấn sân sang cả thị trường smartwatch với sản phẩm mang tên đồng hồ thông minh Realme Watch. Lấy cảm hứng từ những chiếc đồng hồ thông minh đang thịnh hành, Realme Watch có vẻ ngoài sang trọng, tích hợp nhiều tính năng hữu ích và có mức giá siêu rẻ, chắc chắn sẽ là món phụ kiện không thể bỏ qua của nhiều tín đồ công nghệ.</p>
                            <div class="blog__btn">
                                <a href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>