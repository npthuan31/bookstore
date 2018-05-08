<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <!-- Start Main Content -->
        <section class="span12 cart-holder">
            <div class="heading-bar">
                <h2><?php echo $heading_bar_title; ?></h2>
                <span class="h-line"></span>
            </div>
            <div id="empty_cart" class="popup" title="Giỏ hàng trống" align="center">
                <br>
                <p>Giỏ hàng của bạn hiện đang trống</p>
                <p>Hãy nhanh tay sở hữu những quyển sách yêu thích của bạn</p>
                <br>
                <p><a href="" class="my1-btn continue_shopping">Tiếp tục mua hàng</a></p>
            </div>
            <div class="cart-table-holder">
                <table width="100%" border="0" cellpadding="10">
                    <tr>
                        <th width="14%">&nbsp;</th>
                        <th width="43%" align="left">Tên sách</th>
                        <th width="10%">Đơn giá</th>
                        <th width="10%">Số lượng</th>
                        <th width="12%">Thành tiền</th>
                        <th width="5%"></th>
                    </tr>
                    <?php
                    foreach($_SESSION["cart"] as $book)
                    {
                    ?>
                        <tr id="row<?php echo $book["book_detail"]->id_sach; ?>" bgcolor="#FFFFFF" class="product-detail">
                            <td valign="top"><img src="public/images/<?php echo $book["book_detail"]->hinh; ?>"/></td>
                            <td valign="top"><?php echo $book["book_detail"]->ten_sach; ?></td>
                            <td id="price_unit<?php echo $book["book_detail"]->id_sach; ?>" align="center" valign="top"><?php echo number_format($book["book_detail"]->don_gia); ?>đ</td>
                            <td align="center" valign="top">
                                <select class="quantity" name="<?php echo $book["book_detail"]->id_sach; ?>" >
                                    <option value="1" <?php echo $book["quantity"]==1?"selected":""; ?> >1</option>
                                    <option value="2" <?php echo $book["quantity"]==2?"selected":""; ?> >2</option>
                                    <option value="3" <?php echo $book["quantity"]==3?"selected":""; ?> >3</option>
                                    <option value="4" <?php echo $book["quantity"]==4?"selected":""; ?> >4</option>
                                    <option value="5" <?php echo $book["quantity"]==5?"selected":""; ?> >5</option>
                                    <option value="6" <?php echo $book["quantity"]==6?"selected":""; ?> >6</option>
                                    <option value="7" <?php echo $book["quantity"]==7?"selected":""; ?> >7</option>
                                    <option value="8" <?php echo $book["quantity"]==8?"selected":""; ?> >8</option>
                                    <option value="9" <?php echo $book["quantity"]==9?"selected":""; ?> >9</option>
                                    <option value="10" <?php echo $book["quantity"]==10?"selected":""; ?> >10</option>
                                </select>
                            </td>
                            <td id="subtotal<?php echo $book["book_detail"]->id_sach; ?>" align="center" valign="top"><?php echo number_format($book["book_detail"]->don_gia * $book["quantity"]); ?>đ</td>
                            <td align="center" valign="top"><a href="" class="remove_book" id="<?php echo $book["book_detail"]->id_sach; ?>"> <i class="icon-trash"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <figure class="span4 first">
                <div class="cart-option-box">
                    <h5 class="please_login">Vui lòng <a href="login.php">đăng nhập</a>! Bạn chưa có tài khoản? <a href="reg.php"> đăng ký.</a></h5>
                    <h5 class="please_login">Hoặc mua hàng không cần đăng ký.</h5>
                    <h4><i class="icon-shopping-cart"></i> Thông tin giao hàng</h4>
                    <form class="form-horizontal">
                        <ul class="billing-form">
                            <li>
                                <div class="control-group">
                                    <label class="control-label" for="inputState/Province">Họ tên<sup>*</sup></label>
                                    <div class="controls">
                                        <input id="ho_ten" type="text"/>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="control-group">
                                    <label class="control-label" for="inputCountry">Địa chỉ<sup>*</sup></label>
                                    <div class="controls">
                                        <input id="dia_chi" type="text"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputZip">Số điện thoại<sup>*</sup></label>
                                    <div class="controls">
                                        <input id="so_dien_thoai" minlength="7" maxlength="11" type="tel">
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </form>
                </div>
            </figure>
            <div class="price-total">
                <div class="cart-option-box">
                    <table width="100%" border="0" cellpadding="10" class="total-payment">
                        <tr>
                            <td align="right"><strong class="large-f">TỔNG CỘNG :</strong></td>
                            <td align="left"><strong class="large-f"><span id="total_price" ><?php echo number_format($price_total)?></span>đ</strong></td>
                        </tr>
                    </table>
                    <hr />
                    <a href="#" id="process_order" class="more-btn">Tiến hành đặt hàng</a>
                </div>
            </div>
            <div id="success_order" class="popup" title="Đặt hành thành công" align="center">
                <br>
                <p><h3>Bạn đã đặt hàng thành công!</h3></p>
                <p>Đơn hàng sẽ được giao trong 2-3 ngày làm việc.</p>
                <br>
                <p><a href="index.php" class="my1-btn continue_shopping">Tiếp tục mua hàng</a></p>
            </div>
        </section>
        <!-- End Main Content -->
    </section>
</section>