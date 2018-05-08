<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2 align="center">Gởi liên hệ</h2>
        </div>
        <!-- Start Main Content -->
        <section class="my_login">
            <div style="text-align: center;color: red;font-weight: bold;" hidden class="show_mess">
                <?php echo isset($error_send_contact)?$error_send_contact:""; ?>
            </div>
            <div style="text-align: center;color: green;font-weight: bold;" hidden class="show_mess">
                <?php echo isset($success_send_contact)?$success_send_contact:""; ?>
            </div>
            <div style="text-align: center" hidden class="after_send_contact">
                <span>Chúng tôi sẽ liên lạc lại với bạn trong sớm nhất. Trở về <a href="index.php">trang chủ</a> hoặc <a href="contact.php">gởi liên hệ</a> khác.</span>
            </div>
            <form method="post" id="contact_form">
                <table align="center" width="500">
                    <tr>
                        <td align="right">Họ tên* : </td>
                        <td align="left"><input type="text" name="ho_ten" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Email* : </td>
                        <td align="left"><input type="email" name="email" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Nội dung* : </td>
                        <td align="left"><textarea name="noi_dung" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="send_contact" value="Gởi" class="more-btn none"></td>
                    </tr>
                </table>
            </form>
        </section>
    </section>
</section>