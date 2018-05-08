<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2><?php echo $heading_bar_title; ?></h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
                <!-- Strat Book Detail Section -->
                <section class="b-detail-holder">
                    <article class="title-holder">
                        <div class="span12">
                            <h3><strong><?php echo $book_detail->ten_sach ?></strong></h3>
                        </div>
                    </article>
                    <div class="book-i-caption">
                    <!-- Strat Book Image Section -->
                        <div class="span6 b-img-holder">
                            <span class='zoom' id='ex1'> <img src="public/images/<?php echo $book_detail->hinh ?>" height="219" width="300" id='jack' alt=''/></span>
                        </div>
                    <!-- Strat Book Image Section -->
                    <!-- Strat Book Overview Section -->
                        <div class="span6">
                            <p>Tác giả: <a href="book_author.php?id_author=<?php echo $book_detail->id_tac_gia; ?>"><?php echo $book_detail->ten_tac_gia; ?></a></p>
                            <p>Thể loại: <a href="book_category.php?id_category=<?php echo $book_detail->id_loai_sach; ?>"><?php echo $book_detail->ten_loai_sach; ?></a></p>
                            <p>Nhà xuất bản: <?php echo $book_detail->ten_nha_xuat_ban; ?></p>
                            <p>Tình trạng: Còn hàng</p>
                            <p><span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($book_detail->so_sao); ?>"></div></span></p>
                            <div class="comm-nav">
                                <div class="detail_price"><span class="don_gia" ><?php echo number_format($book_detail->don_gia) . "đ" ?></span> <span class="gia_bia"><?php echo $book_detail->gia_bia>$book_detail->don_gia?number_format($book_detail->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></div>
                                <div class="">Số lượng: <input id="quantity" name="quantity" value="1" min="1" max="10"></div>
                                <button class="my1-btn" name="add_to_cart" id="<?php echo $book_detail->id_sach; ?>">+ Thêm vào giỏ hàng</button>
                                <!-- Start Popup -->
                                <div id="add_cart_confirm" class="popup" title="Đã thêm vào giỏ hàng">
                                    <p><span>Đã thêm</span><span id="quantity_popup"></span><span>quyển sách <strong><?php echo $book_detail->ten_sach ?></strong> vào giỏ hàng</span></p>
                                    <br><br>
                                    <p><a href="" class="continue_shopping" id="continue_shopping_cart_confirm">Tiếp tục mua hàng</a> <a href="cart.php" class="more-btn right">Tiến hành đặt hàng</a></p>
                                </div>
                                <!-- End Popup -->
                            </div>
                       </div>
                    <!-- End Book Overview Section -->
                    </div>
                    <!-- Start Book Summary Section -->
                        <div class="tabbable">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#pane1" data-toggle="tab">Giới thiệu sách</a></li>
                            <li><a href="#pane2" data-toggle="tab">Chi tiết sách</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="pane1" class="tab-pane active">
                              <?php echo $book_detail->gioi_thieu_sach ?>
                            </div>
                            <div id="pane2" class="tab-pane">
                            <p>SKU: <?php echo $book_detail->sku; ?></p>
                            <p>Kích thước: <?php echo $book_detail->kich_thuoc; ?></p>
                            <p>Trọng lượng: <?php echo $book_detail->trong_luong; ?></p>
                            <p>Số trang: <?php echo $book_detail->so_trang; ?></p>
                            <p>Ngày xuất bản: <?php echo $book_detail->ngay_xuat_ban; ?></p>
                            </div>
                          </div><!-- /.tab-content -->
                        </div><!-- /.tabbable -->
                    <!-- End Book Summary Section -->
                    <!-- Start BX Slider holder -->
                <section class="related-book">
                <div class="heading-bar">
                    <h2>Sách cùng danh mục</h2>
                    <span class="h-line"></span>
                </div>
                <div class="slider6">
                    <?php
                    foreach($relate_books as $book)
                    {
                    ?>
                        <div class="slide">
                            <a href="book_detail.php?id_book=<?php echo $book->id_sach; ?>"><img src="public/images/<?php echo $book->hinh; ?>" alt="" class="pro-img"/></a>
                            <span class="title"><a href="book_detail.php?id_book=<?php echo $book->id_sach; ?>"><?php echo mb_substr($book->ten_sach,0,25,'UTF-8') . '...'; ?></a></span>
                            <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($book->so_sao); ?>"></div></span>
                            <div class="cart-price">
                                <span class="price"><span class="don_gia"><?php echo number_format($book->don_gia) . "đ"; ?></span><br><span class="gia_bia"><?php echo $book->gia_bia>$book->don_gia?number_format($book->gia_bia) . "đ":""; ?></span>  <span class="discount_percent"></span></span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                   </section>
                <!-- End BX Slider holder -->
                <!-- Stsrt Customer Reviews Section -->
                    <section class="reviews-section">
                        <figure class="left-sec">
                            <div class="r-title-bar">
                                <strong>Đánh giá của khách hàng</strong>
                            </div>
                            <ul class="review-list">
                                <?php
                                if(empty($book_reviews))
                                {
                                    echo "<li>Chưa có đánh giá nào.<br>Bạn hãy là người đánh giá đầu tiên.</li>";
                                }
                                foreach($book_reviews as $book_review)
                                {
                                ?>
                                    <li>
                                        <em class=""><?php echo $book_review->ho_ten; ?></em>
                                        <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($book_review->binh_chon_sao); ?>"></div></span>
                                        <p>"<?php echo $book_review->noi_dung; ?>"</p>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </figure>
                        <figure class="right-sec">
                            <div class="r-title-bar">
                                <strong>Viết đánh giá của bạn</strong>
                            </div>
                            <ul class="review-f-list">
                                <li class="please_login">Bạn chưa đăng nhập</li>
                                <li class="please_login">Vui lòng <a href="login.php">đăng nhập</a> hoặc <a href="reg.php"> đăng ký</a> để viết đánh giá</li>
                                <li>
                                    <label>Đánh giá * </label>
                                    <textarea id="txt_review" name="" cols="2" rows="20"></textarea>
                                </li>
                                <li>
                                    <label>Bình chọn *</label>
                                    <div class="rating-list">
                                        <div class="rating-box">
                                            <label class="radio">
                                            <input type="radio" name="optionsRadios" id="1_star" value="1">
                                            1 sao
                                        </label>
                                        </div>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="2_star" value="2">
                                            2 sao
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="3_star" value="3">
                                            3 sao
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="4_star" value="4">
                                            4 sao
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="optionsRadios" id="5_star" value="5">
                                            5 sao
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <button id="btn_post_review" class="grey-btn left-btn">Gởi đánh giá</button>
                        </figure>
                    </section>
                <!-- End Customer Reviews Section -->
                </section>
                <!-- End Book Detail Section -->
    </section>
        <!-- End Main Content -->