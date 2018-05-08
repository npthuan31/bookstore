<div class="container">
    <div class="row">
        <h2 align="center">Vườn Ngôn Từ - Admin CP</h2>
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Vui lòng đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tài khoản" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="login" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <span style="text-align: center;color: red;font-weight: bold;"><?php echo isset($error_login)?$error_login:""; ?></span>
        </div>
    </div>
</div>