<section class="top-nav-bar">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span6">
          <ul class="top-nav">
            <li><a href="index.php">Vườn ngôn từ</a></li>
            <li><a href="contact.php">Liên hệ</a></li>
          </ul>
        </section>
        <section class="span6 e-commerce-list">
          <ul>
            <li id="fullname"><?php if(!empty($_SESSION["user"]["fullname"])) echo "Chào bạn, " . $_SESSION["user"]["fullname"] . "! <a href='logout.php'>Đăng xuất</a>"; ?></li>
            <li hidden id="username"><?php echo $_SESSION["user"]["username"]?></li>
            <li class="please_login">Chào bạn! <a href="login.php">Đăng nhập</a> hoặc <a href="reg.php">Đăng ký</a></li>
          </ul>
          <div class="c-btn"><a href="" id="shopping_cart" class="cart-btn">Giỏ hàng</a>
            <div class="btn-group">
                <button id="my_cart" class="btn btn-mini"><?php echo (isset($_SESSION["cart_total"]) and $_SESSION["cart_total"] > 0) ? $_SESSION["cart_total"] . " quyển sách" : "Giỏ hàng trống"; ?></button>
                <!-- Start Popup -->
                <div id="empty_cart" class="popup" title="Giỏ hàng trống" align="center">
                    <br>
                    <p>Giỏ hàng của bạn hiện đang trống</p>
                    <p>Hãy nhanh tay sở hữu những quyển sách yêu thích của bạn</p>
                    <br>
                    <p><a href="" id="continue_shopping_empty_cart" class="my1-btn continue_shopping">Tiếp tục mua hàng</a></p>
                </div>
                <!-- End Popup -->
            </div>
          </div>
        </section>
      </section>
    </section>
</section>