<header id="main-header">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span4">
          <h1 id="logo"> <a href="index.php"><img src="public/images/logo.png" /></a> </h1>
        </section>
        <section class="span8">
          <div class="search-bar">
              <form method="get" action="search_book.php">
                  <input class="search_text" name="keyword" type="text" placeholder="Nhập tên sách, hoặc tác giả, hoặc thể loại,..."/>
                  <input class="more-btn none search_btn" name="btn_submit" type="submit" value="Tìm kiếm"/>
              </form>
          </div>
        </section>
      </section>
    </section>
    <!-- Start Main Nav Bar -->
    <nav id="nav">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="book_category.php"><i class="icon-book"> Tất cả danh mục sách</i></a></li>
              <li><a href="new_book.php">Sách mới nhất</a></li>
              <li><a href="featured_book.php">Sách nổi bật</a></li>
              <li><a href="ranking_book.php"><i class="icon-heart"> Sách được yêu thích</i></a></li>
              <li><a href="sale_book.php">Sách giảm giá</a></li>
              <li><a href="best_seller_book.php">Sách bán chạy</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </nav>
    <!-- End Main Nav Bar -->
  </header>