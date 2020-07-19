<?php
//views/carts/index.php

//nhúng class Helper trong thư mục helpers/Helper.php
//để sử dụng phương thức tĩnh slug() -> tạo ra link chi tiết
//theo dạng đường dẫn thân thiện
require_once 'helpers/Helper.php';
?>
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if (isset($_SESSION['cart'])): ?>
                <form action="" method="post">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th class="product-remove">Xóa đơn hàng</th>
                            </tr>
                            </thead>
                            <?php
                            //khai báo 1 biến chứa tổng giá trị đơn hàng
                            $total_cart = 0;
                            foreach($_SESSION['cart'] AS $product_id => $cart):
                            $slug = Helper::getSlug($cart['name']);
                            $url_detail = "chi-tiet-san-pham/$slug/$product_id";
                            ?>
                            <tbody>
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img src="../backend/assets/uploads/<?php echo $cart['avatar']?>" alt="product img" /></a></td>
                                <td class="product-name"><a href="<?php echo $url_detail; ?>"><?php echo $cart['name']; ?></a>

                                </td>
                                <td class="product-price"><span class="amount"><?php echo number_format($cart['price']); ?></span></td>
                                <td class="product-quantity"><input type="number" min="0" value="<?php echo $cart['quality']?>" name="<?php echo $product_id; ?>" /></td>
                                <td class="product-subtotal">
                                    <?php
                                    //thành tiền
                                    $total_item = $cart['price'] * $cart['quality'];
                                    echo number_format($total_item);
                                    //cộng dồn Thành tiên cho tổng giá trị đơn hàng
                                    $total_cart += $total_item;
                                    ?></td>
                                <td class="product-remove"><a href="xoa-san-pham/<?php echo $product_id; ?>"><i class="icon-trash icons"></i></a></td>
                            </tr>

                            </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2  style="text-align: right; font-size: 20px; font-weight: bold;">TỔNG GIÁ TRỊ ĐƠN HÀNG:&nbsp; <span class="product-price">
                      <?php
                      echo number_format($total_cart);
                      ?>
                    </span>Đ</h2>
                            <br>

                            <div class="buttons-cart--inner">

                                <div class="buttons-cart">
                                    <a href="index.php">Tiếp tục mua hàng</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <input class="submit"  type="submit" name="submit" value="Cập nhập" style="background: #ebebeb none repeat scroll 0 0;
    color: #212121;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    height: 62px;
    line-height: 62px;
    padding: 0 45px;
    text-transform: uppercase;
    display: inline-block;
    .submit:hover {
    background-color: black;
    color: #fff !important;

"></input>
                                    <a href="thanh-toan">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <?php else: ?>
                    <h3>Giỏ hàng trống</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
