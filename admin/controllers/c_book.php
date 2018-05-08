<?php
include_once("models/m_book.php");
include_once("models/m_category.php");
include_once("models/m_author.php");
include_once("models/m_nha_xuat_ban.php");
include_once("library/Pager.php");
class C_book
{
	protected $m_book;
	protected $m_category;
	protected $m_author;
	protected $m_nha_xuat_ban;
	
	public function __construct()
	{
		$this->m_book = new M_book();
		$this->m_category = new M_category();
		$this->m_author = new M_author();
		$this->m_nha_xuat_ban = new M_nha_xuat_ban();
	}

    public function show_add_book()
    {
        //////Model/////
        if(isset($_POST["add_book"]))
        {
            $ten_sach=$_POST["ten_sach"];
            $tac_gia=$_POST["tac_gia"];
            $id_tac_gia=$this->m_author->convert_name_to_id($tac_gia);
            $loại_sach=$_POST["loai_sach"];
            $id_loai_sach=$this->m_category->convert_name_to_id($loại_sach);
            $nha_xuat_ban=$_POST["nha_xuat_ban"];
            $id_nha_xuat_ban=$this->m_nha_xuat_ban->convert_name_to_id($nha_xuat_ban);
            $don_gia=$_POST["don_gia"];
            $gia_bia=$_POST["gia_bia"];
            if(isset($_POST["noi_bat"]))
            {
                $noi_bat = $_POST["noi_bat"];
            }
            else
            {
                $noi_bat=0;
            }
            $gioi_thieu=$_POST["gioi_thieu"];
            $hinh=basename($_FILES["hinh"]["name"]);
            $target_dir = "../public/images/";
            $target_file = $target_dir . $hinh;
            if (file_exists($target_file))
            {
                $error_add_book = "Thêm sách thất bại: Hình ảnh đã tồn tại trên server!";
            }
            else
            {
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file))
                {
                    $this->m_book->add_book($ten_sach, $id_tac_gia, $id_loai_sach, $id_nha_xuat_ban, $don_gia, $gia_bia, $gioi_thieu, $hinh, $noi_bat);
                    $success_add_book = "Thêm sách thành công!";
                }
                else
                {
                    $error_add_book = "Thêm sách thất bại: Upload hình bị lỗi!";
                }
            }
        }

        /////View//////
        //Content Holder
        $content="views/book/v_add_book.php";

        //Load layout
        include("public/template/layout.php");
    }
    public function show_all_book()
    {
        $_SESSION["previous_page"]=basename($_SERVER["REQUEST_URI"]);
        $books=$this->m_book->get_all_book();

        // Phân trang
        $p=new pager();
        $limit=20;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_all_book($vt,$limit);

        ////View/////
        //Content Holder
        $content="views/book/v_list_book.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_edit_book()
    {
        $id_book=$_GET["id_book"];
        $book=$this->m_book->get_book_by_id($id_book);

        if(isset($_POST["edit_book"]))
        {
            $ten_sach=$_POST["ten_sach"];
            $tac_gia=$_POST["tac_gia"];
            $id_tac_gia=$this->m_author->convert_name_to_id($tac_gia);
            $loai_sach=$_POST["loai_sach"];
            $id_loai_sach=$this->m_category->convert_name_to_id($loai_sach);
            $nha_xuat_ban=$_POST["nha_xuat_ban"];
            $id_nha_xuat_ban=$this->m_nha_xuat_ban->convert_name_to_id($nha_xuat_ban);
            $don_gia=$_POST["don_gia"];
            $gia_bia=$_POST["gia_bia"];
            if(isset($_POST["noi_bat"]))
            {
                $noi_bat = $_POST["noi_bat"];
            }
            else
            {
                $noi_bat=0;
            }
            $gioi_thieu=$_POST["gioi_thieu"];
            $hinh=basename($_FILES["hinh"]["name"]);
            $target_dir = "../public/images/";
            $target_file = $target_dir . $hinh;

            if(empty($hinh))
            {
                $hinh_no_change=$book->hinh;
                $this->m_book->edit_book($id_book,$ten_sach, $id_tac_gia, $id_loai_sach, $id_nha_xuat_ban, $don_gia, $gia_bia, $gioi_thieu, $hinh_no_change, $noi_bat);
                $success_edit_book = "Chỉnh sửa sách thành công!";
            }
            else if($hinh==$book->hinh)
            {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                $this->m_book->edit_book($id_book,$ten_sach, $id_tac_gia, $id_loai_sach, $id_nha_xuat_ban, $don_gia, $gia_bia, $gioi_thieu, $hinh, $noi_bat);
                $success_edit_book = "Chỉnh sửa sách thành công!";
            }
            else
            {
                if (file_exists($target_file))
                {
                    $error_edit_book = "Chỉnh sửa sách thất bại: Hình ảnh đã tồn tại trên server!";
                }
                else
                {
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file))
                    {
                        $this->m_book->edit_book($id_book,$ten_sach, $id_tac_gia, $id_loai_sach, $id_nha_xuat_ban, $don_gia, $gia_bia, $gioi_thieu, $hinh, $noi_bat);
                        $success_edit_book = "Chỉnh sửa sách thành công!";
                    }
                    else
                    {
                        $error_edit_book = "Chỉnh sửa sách thất bại: Upload hình bị lỗi!";
                    }
                }
            }
        }

        $book=$this->m_book->get_book_by_id($id_book);

        /////View//////
        //Content Holder
        $content="views/book/v_edit_book.php";

        //Load layout
        include("public/template/layout.php");

    }

    public function del_book()
    {
        $id_book=$_POST["id_book"];
        $result=$this->m_book->del_book($id_book);
        if($result)
            echo "Xóa sách thành công";
        else
            echo "error";
    }
}
?>