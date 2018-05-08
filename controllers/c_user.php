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
        if(isset($_SESSION["user"]))
        {
            header("location:index.php");
            exit();
        }
        if(isset($_POST["login"]))
        {
            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            if(empty($_SESSION["pre_page"]))
                $_SESSION["pre_page"] = $_POST["pre_page"];

            $user = $this->m_user->get_user($username, $password);
            if(!empty($user))
            {
                $_SESSION["user"] = array("username" => $user->tai_khoan, "fullname" => $user->ho_ten);
                header("location:".$_SESSION["pre_page"]);
                unset($_SESSION["pre_page"]);
            }
            else
                $error_login = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
        //////////View//////////
        //Title
        $site_title="Đăng nhập";

        //Content Holder
        $content="views/login_and_reg/v_login.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_reg()
    {
        //////////Model//////////
        if(isset($_POST["reg"]))
        {
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $is_exist_username = $this->m_user->search_user($username);
            $level=0;
            if (empty($is_exist_username)) //User not exist
            {
                $result = $this->m_user->save_user($fullname, $username, $email, $password,$level);
                if($result)
                {
                    $error_reg="Đăng ký tài khoản thành công!";
                }
                else
                {
                    $error_reg="Quá trình đăng ký tài khoản bị lỗi!";
                }
            }
            else //User exist
            {
                $error_exist_username = "Tên đăng nhập đã tồn tại trong hệ thống vui lòng chọn tên khác!";
            }
        }
        //////////View//////////
        //Title
        $site_title="Đăng ký";

        //Content Holder
        $content="views/login_and_reg/v_reg.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_logout()
    {
        if(empty($_SESSION["user"]))
        {
            header("location:index.php");
            exit();
        }

        unset($_SESSION["user"]);

        if(isset($_SERVER["HTTP_REFERER"]))
            $pre_page=$_SERVER["HTTP_REFERER"];
        else
            $pre_page="index.php";
        header("location:$pre_page");
    }
}
?>