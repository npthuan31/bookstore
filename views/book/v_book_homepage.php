<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
      <section class="span12 slider">
        <section class="main-slider">
          <div class="bb-custom-wrapper">
            <div id="bb-bookblock" class="bb-bookblock">
              <?php
			  for($i=0;$i<3;$i++)
			  {
			  ?>
                <div class="bb-item">
                <div class="bb-custom-content">
                  <div class="slide-inner">
                    <div class="span4 book-holder"><a href="book_detail.php?id_book=<?php echo $featured_books[$i]->id_sach ?>"><img src="public/images/<?php echo $featured_books[$i]->hinh ?>" alt="Book"/></a>
                      <div class="cart-price"><span class="price"><span class="don_gia"><?php echo number_format($featured_books[$i]->don_gia) . "đ" ?></span><br><span class="gia_bia"><?php echo $featured_books[$i]->gia_bia>$featured_books[$i]->don_gia?number_format($featured_books[$i]->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></span></div>
                    </div>
                    <div class="span8 book-detail">
                      <h2><?php echo mb_substr($featured_books[$i]->ten_sach,0,40,'UTF-8') . "..." ?></h2>
                      <strong class="title"><?php echo $featured_books[$i]->ten_tac_gia ?></strong> <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($featured_books[$i]->so_sao); ?>"></div></span> <a href="book_detail.php?id_book=<?php echo $featured_books[$i]->id_sach ?>" class="shop-btn">MUA SÁCH</a>
                      <div class="cap-holder">
                        <p><img src="public/images/image27.png" alt="Best Choice" align="right"/><?php echo mb_substr(strip_tags($featured_books[$i]->gioi_thieu_sach),0,200,'UTF-8') . "..." ?></p>
                        <a href="book_detail.php?id_book=<?php echo $featured_books[$i]->id_sach ?>">Xem thêm</a> </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
			  }
			  ?>
            </div>
          </div>
          <nav class="bb-custom-nav"> <a href="#" id="bb-nav-prev" class="left-arrow">Previous</a> <a href="#" id="bb-nav-next" class="right-arrow">Next</a> </nav>
        </section>
        <span class="slider-bottom"><img src="public/images/slider-bg.png" alt="Shadow"/></span> </section>
      <section class="span12 wellcome-msg m-bottom first">
        <h2>WELCOME TO Vườn Ngôn Từ.</h2>
        <p>Mở cánh cửa vào thế giới sách</p>
      </section>
    </section>
    <div class="heading-bar">
          <h2>Sách giảm giá nhiều nhất</h2>
          <span class="h-line"></span> </div>
    <section class="row-fluid ">
     <?php
	 for($i=0;$i<3;$i++)
	 {
	 ?>
      <figure class="span4 s-product">
        <div class="s-product-img"><a href="book_detail.php?id_book=<?php echo $sale_books[$i]->id_sach ?>"><img src="public/images/<?php echo $sale_books[$i]->hinh ?>" alt="Image02"/></a></div>
        <article class="s-product-det">
          <h3><a href="book_detail.php?id_book=<?php echo $sale_books[$i]->id_sach ?>"><?php echo mb_substr($sale_books[$i]->ten_sach,0,25,'UTF-8') . '...'; ?></a></h3>
          <p><?php echo mb_substr(strip_tags($sale_books[$i]->gioi_thieu_sach),0,100,'UTF-8') . "..." ?></p>
          <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($sale_books[$i]->so_sao); ?>"></div></span>
          <div class="cart-price"><span class="price"><span class="don_gia" ><?php echo number_format($sale_books[$i]->don_gia) . "đ" ?></span>  <span class="gia_bia"><?php echo $sale_books[$i]->gia_bia>$sale_books[$i]->don_gia?number_format($sale_books[$i]->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></span></div>
          <span class="sale-icon">Sale</span> </article>
      </figure>
     <?php
	 }
	 ?>    
    </section>
    <!-- Start BX Slider holder -->
    <section class="row-fluid features-books">
      <section class="span12 m-bottom">
        <div class="heading-bar">
          <h2>Sách nổi bật</h2>
          <span class="h-line"></span> </div>
        <div class="slider1">
        <?php
		for($i=3;$i<count($featured_books);$i++)
		{
		?>
          <div class="slide"> <a href="book_detail.php?id_book=<?php echo $featured_books[$i]->id_sach ?>"><img src="public/images/<?php echo $featured_books[$i]->hinh ?>" alt="" class="pro-img"/></a> <span class="title"><a href="book_detail.php?id_book=<?php echo $featured_books[$i]->id_sach ?>"><?php echo mb_substr($featured_books[$i]->ten_sach,0,20,'UTF-8') . '...'; ?></a></span> <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($featured_books[$i]->so_sao); ?>"></div></span>
            <div class="cart-price"><span class="price"><span class="don_gia" ><?php echo number_format($featured_books[$i]->don_gia) . "đ" ?></span><br><span class="gia_bia"><?php echo $featured_books[$i]->gia_bia>$featured_books[$i]->don_gia?number_format($featured_books[$i]->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></span></div>
          </div>
        <?php
		}
		?>
        </div>
      </section>
    </section>
    <!-- End BX Slider holder -->
    <!-- Start Best Seller -->
    <section class="row-fluid features-books">
        <section class="span12 m-bottom">
            <div class="heading-bar">
                <h2>Sách bán chạy</h2>
                <span class="h-line"></span> </div>
            <div class="slider1">
                <?php
                foreach($best_seller_books as $best_seller_book)
                {
                    ?>
                    <div class="slide"> <a href="book_detail.php?id_book=<?php echo $best_seller_book->id_sach ?>"><img src="public/images/<?php echo $best_seller_book->hinh ?>" alt="" class="pro-img"/></a> <span class="title"><a href="book_detail.php?id_book=<?php echo $best_seller_book->id_sach ?>"><?php echo mb_substr($best_seller_book->ten_sach,0,20,'UTF-8') . '...'; ?></a></span> <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($best_seller_book->so_sao); ?>"></div></span>
                        <div class="cart-price"><span class="price"><span class="don_gia" ><?php echo number_format($best_seller_book->don_gia) . "đ" ?></span><br><span class="gia_bia"><?php echo $best_seller_book->gia_bia>$best_seller_book->don_gia?number_format($best_seller_book->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></span></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
    </section>
    <!-- End Best Seller -->
  </section>