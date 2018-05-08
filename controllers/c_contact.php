<?php
include("models/m_contact.php");
class C_contact
{
    public $m_contact;
    public function __construct()
    {
        $this->m_contact=new M_contact();
    }
    public function show_send_contact()
    {
        ///Model////

        if(isset($_POST["send_contact"]))
        {
            $ho_ten=$_POST["ho_ten"];
            $email=$_POST["email"];
            $noi_dung=$_POST["noi_dung"];
            $result=$this->m_contact->add_contact($ho_ten,$email,$noi_dung);
            if($result)
            {
                $success_send_contact="Gởi thông tin thành công!";
            }
            else
            {
                $error_send_contact="Gởi thông tin bị lỗi!";
            }
        }

        //////////View//////////
        //Title
        $site_title="Liên hệ";

        //Content Holder
        $content="views/contact/v_contact.php";

        //Load layout
        include("public/template/layout.php");
    }
}
?>