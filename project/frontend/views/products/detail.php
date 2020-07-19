
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">


        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img style="width: 100%; height: 100%" src="../backend/assets/uploads/<?php echo $product['avatar']?>" alt="full-image">
                                </div>

                            </div>
                        </div>
                        <!-- End Product Big Images -->
                        <!-- Start Small images -->
                        <!-- End Small images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">

                    <div class="ht__product__dtl">
                        <h2></h2>
                        <h6>Model: <span><?php echo $product['title']; ?></span></h6>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="pro__prize">
                        </ul>
                        <p class="pro__info"> <?php echo $product['content']?></p>
                        <div class="ht__pro__desc">

                            <div class="sin__desc align--left">
                                <p><span>color:</span></p>
                                <ul class="pro__color">
                                    <li class="red"><a href="#">red</a></li>
                                    <li class="green"><a href="#">green</a></li>
                                    <li class="balck"><a href="#">balck</a></li>
                                </ul>
                            </div>
                            <div class="sin__desc align--left" s>
                                <p>Chọn bộ nhớ</p>
                                <select class="select__size">
                                    <option>16G</option>
                                    <option>32G</option>
                                    <option>64G</option>
                                    <option>128</option>
                                    <option>256G</option>

                                </select>
                            </div>

                            <div class="sin__desc align--left">Giá: <?php echo number_format($product['price'])?>đ</div>

                            <br>
                            <div class="timeline-post-info">
                                <a href="them-vao-gio-hang/<?php echo $product['id']; ?>"
                                   class="btn btn-primary">
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>



<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                    <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a></li>
                    <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">shipping</a></li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">

                            <h4 class="ht__pro__title"><?php echo $product['title']?></h4>
<p><?php echo $product['content']?></p>
                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>
                                <?php echo $product['content']?>
                                <?php echo $product['content']?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>