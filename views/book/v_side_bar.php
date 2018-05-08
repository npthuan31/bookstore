        <!-- Start Main Side Bar -->
        <section class="span3">
            <!-- Start Shop by Section -->
            <div class="side-holder">
                <article class="shop-by-list">
                    <h2>Danh mục sách</h2>
                    <div class="side-inner-holder">
                        <ul class="side-list">
                            <?php
                            foreach($book_categorys as $book_category)
                            {
                                ?>
                                <li><a href="book_category.php?id_category=<?php echo $book_category->id_loai_sach; ?>"><?php echo $book_category->ten_loai_sach; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <strong class="title">Tác giả</strong>
                        <ul class="side-list">
                            <?php
                            foreach($authors as $author)
                            {
                                ?>
                                <li><a href="book_author.php?id_author=<?php echo $author->id_tac_gia; ?>"><?php echo $author->ten_tac_gia; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </article>
            </div>
        </section>
        <!-- End Main Side Bar -->
    </section>
</section>