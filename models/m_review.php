<?php
require_once ("library/database.php");
class M_review
{
    protected $database;

    public function __construct()
    {
        $this->database = new database();
    }

    public function save_review($id_book,$username,$review_content,$vote,$ngay)
    {
        $sql="INSERT INTO bs_danh_gia VALUES(?,?,?,?,?,?)";
        $this->database->setQuery($sql);
        $param=array("",$id_book,$username,$review_content,$vote,$ngay);
        return $this->database->execute($param);
    }

    public function get_review($id_book)
    {
        $sql="SELECT * FROM bs_danh_gia JOIN bs_nguoi_dung ON bs_danh_gia.tai_khoan= bs_nguoi_dung.tai_khoan WHERE bs_danh_gia.id_sach=?";
        $this->database->setQuery($sql);
        $param=array($id_book);
        return $this->database->loadAllRows($param);
    }

    public function update_ranking_to_book($id_book)
    {
        $sql="UPDATE bs_sach
              SET bs_sach.so_sao=(SELECT AVG(bs_danh_gia.binh_chon_sao) FROM bs_danh_gia WHERE bs_danh_gia.id_sach=? GROUP BY bs_danh_gia.id_sach)
              WHERE bs_sach.id_sach=?";
        $this->database->setQuery($sql);
        $param=array($id_book,$id_book);
        return $this->database->execute($param);
    }
}
?>