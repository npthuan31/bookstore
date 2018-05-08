<?php
include_once("models/m_order.php");
include_once("models/m_cart.php");
class C_order
{
    protected $m_order;
    protected $m_cart;

    public function __construct()
    {
        $this->m_order = new M_order();
        $this->m_cart = new M_cart();
    }

    //`id_don_hang`, `tong_tien`, `ngay_dat`, `tai_khoan`, `ho_ten_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `trang_thai`
    public function c_save_order()
    {
        $total_price = 0;
        foreach ($_SESSION["cart"] as $key => $book) {
            $total_price += $book["book_detail"]->don_gia * $book["quantity"];
        }
        $ngay_dat = date("Y-m-d H:i:s");
        if(!empty($_POST["tai_khoan"]))
        {
            $tai_khoan=$_POST["tai_khoan"];
        }
        else
            $tai_khoan="chua_dang_ky";
        $ho_ten_nguoi_nhan = $_POST["ho_ten_nguoi_nhan"];
        $so_dien_thoai_nguoi_nhan = $_POST["so_dien_thoai_nguoi_nhan"];
        $dia_chi_nguoi_nhan = $_POST["dia_chi_nguoi_nhan"];
        $trang_thai=0;
        $result=$this->m_order->save_order($total_price,$ngay_dat,$tai_khoan,$ho_ten_nguoi_nhan,$so_dien_thoai_nguoi_nhan,$dia_chi_nguoi_nhan,$trang_thai);

        $this->c_save_order_detail();
        $this->m_cart->empty_cart();

        if($result)
            echo "Đặt hàng thành công!";
    }

    //`id`, `id_don_hang`, `id_sach`, `so_luong`, `don_gia`, `thanh_tien`
    public function c_save_order_detail()
    {
        $id_don_hang=$this->m_order->get_last_id_order();
        foreach ($_SESSION["cart"] as $key=>$book)
        {
            $id_sach=$book["id_book"];
            $so_luong=$book["quantity"];
            $don_gia=$book["book_detail"]->don_gia;
            $thanh_tien=$so_luong * $don_gia;

            $this->m_order->save_order_detail($id_don_hang,$id_sach,$so_luong,$don_gia,$thanh_tien);
        }
    }
}

?>