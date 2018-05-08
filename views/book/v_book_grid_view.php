<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2><?php echo $heading_bar_title; ?></h2>
            <span class="h-line"></span>
        </div>
        <!-- Start Main Content -->
        <section class="span9 first">
                    <!-- Start Grid View Section -->
                    <section class="grid-holder features-books">
                    <?php
                        foreach($books as $book)
                        {
                            ?>
                        <figure class="span4 slide first">
                            <a href="book_detail.php?id_book=<?php echo $book->id_sach ?>"><img src="public/images/<?php echo $book->hinh ?>" alt="" class="pro-img"/></a>
                            <span class="title"><a href="book_detail.php?id_book=<?php echo $book->id_sach ?>"><?php echo mb_substr($book->ten_sach,0,20,'UTF-8') . "..." ?></a></span>
                            <span class="rating-bar"><div class="stars <?php echo Helper::star_to_class($book->so_sao); ?>"></div></span>
                            <div class="cart-price">
                                <span class="price"><span class="don_gia" ><?php echo number_format($book->don_gia) . "đ" ?></span>  <span class="gia_bia"><?php echo $book->gia_bia>$book->don_gia?number_format($book->gia_bia) . "đ":""?></span>  <span class="discount_percent"></span></span>
                            </div>
                        </figure>
                    <?php
                        }
                            ?>
                    </section>
                    <!-- End Grid View Section -->
                    <hr>
                    <div class="pagination">
                        <span> <?php echo isset($lst)?$lst:""; ?></span>
                    </div>

        </section>
        <!-- End Main Content -->

