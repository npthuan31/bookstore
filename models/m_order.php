<?php
require_once('library/database.php');

class M_order
{
    public $db;

    public function __construct()
    {
        $this->db=new database();
    }

    //`id_don_hang`, `tong_tien`, `ngay_dat`, `tai_khoan`, `ho_ten_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `trang_thai`
    public function save_order($tong_tien, $ngay_dat, $tai_khoan, $ho_ten_nguoi_nhan, $so_dien_thoai_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai)
    {
        $sql="INSERT INTO bs_don_hang VALUES (?,?,?,?,?,?,?,?)";
        $this->db->setQuery($sql);
        $param=array("",$tong_tien, $ngay_dat, $tai_khoan, $ho_ten_nguoi_nhan, $so_dien_thoai_nguoi_nhan, $dia_chi_nguoi_nhan, $trang_thai);
        return $this->db->execute($param);
    }

    //`id`, `id_don_hang`, `id_sach`, `so_luong`, `don_gia`, `thanh_tien`
    public function save_order_detail($id_don_hang,$id_sach,$so_luong,$don_gia,$thanh_tien)
    {
        $sql="INSERT INTO bs_chi_tiet_don_hang VALUES(?,?,?,?,?,?)";
        $this->db->setQuery($sql);
        $param=array("",$id_don_hang,$id_sach,$so_luong,$don_gia,$thanh_tien);
        return $this->db->execute($param);
    }

    public function get_last_id_order()
    {
        $sql="SELECT * FROM bs_don_hang ORDER BY bs_don_hang.id_don_hang DESC LIMIT 1";
        $this->db->setQuery($sql);
        $last_order=$this->db->loadRow();
        return $last_order->id_don_hang;
    }
}

?>