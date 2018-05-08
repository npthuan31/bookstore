<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2 align="center">Đăng ký</h2>
        </div>
        <!-- Start Main Content -->
        <section class="my_login">
            <span>
                <p id="error_reg" style="color: red; text-align: center; "><?php echo isset($error_reg)?$error_reg:""; ?></p>
                <p id="error_exist_username" style="color: red; text-align: center; "><?php echo isset($error_exist_username)?$error_exist_username:""; ?></p>
                <p hidden id="after_reg" style="text-align: center; ">Trở về <a href="index.php">trang chủ</a></p>
            </span>

            <form method="post" id="reg_form">
                <table align="center" width="400">
                    <tr>
                        <td align="right">Họ tên* : </td>
                        <td align="left"><input type="text" name="fullname" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Tên đăng nhập* : </td>
                        <td align="left"><input type="text" name="username" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Email* : </td>
                        <td align="left"><input type="email" name="email" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Mật khẩu* : </td>
                        <td align="left"><input type="password" name="password" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="reg" value="ĐĂNG KÝ" class="more-btn none" align="center"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></td>
                    </tr>
                </table>
            </form>
        </section>
    </section>
</section>