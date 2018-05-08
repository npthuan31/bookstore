<?php
include_once("models/m_user.php");
class C_user
{
    protected $m_user;

    public function __construct()
    {
        $this->m_user=new M_user();
    }

    public function show_login()
    {
        //////////Model//////////
        if(isset($_POST["login"]))
        {
            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            $user = $this->m_user->get_user($username, $password);
            if(!empty($user) and $user->cap_do==5)
            {
                $_SESSION["user_admin"] = array("username" => $user->tai_khoan);
                header("location:dashboard.php");
            }
            else
                $error_login = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
        //////////View//////////
        //Content Holder
        $content="views/login_and_reg/v_login.php";

        //Load layout
        include("public/template/layout_login.php");
    }

    public function show_logout()
    {
        unset($_SESSION["user_admin"]);
        header("location:login.php");
    }
}
?>