<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2 align="center">Đăng nhập</h2>
        </div>
        <!-- Start Main Content -->
        <section class="my_login">
            <span>
            <h4 style="color: red; text-align: center; "><?php echo isset($error_login)?$error_login:""; ?></h4>
            </span>
            <form method="post">
                <table align="center" width="400">
                    <tr>
                        <td align="right">Tên đăng nhập : </td>
                        <td align="left"><input type="text" name="username" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Mật khẩu : </td>
                        <td align="left"><input type="password" name="password" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="login" value="ĐĂNG NHẬP" class="more-btn none" align="center"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">Bạn chưa có tài khoản? <a href="reg.php">Đăng ký</a></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="hidden" name="pre_page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>"/></td>
                    </tr>
                </table>
            </form>


        </section>
    </section>
</section>