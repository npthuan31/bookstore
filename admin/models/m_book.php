<?php
require_once('library/database.php');

class M_book extends database
{
	public function get_book_by_id($id_book)
	{
		$sql='SELECT * FROM bs_sach LEFT JOIN bs_tac_gia ON bs_sach.id_tac_gia=bs_tac_gia.id_tac_gia LEFT JOIN bs_loai_sach ON bs_sach.id_loai_sach=bs_loai_sach.id_loai_sach LEFT JOIN bs_nha_xuat_ban ON bs_sach.id_nha_xuat_ban=bs_nha_xuat_ban.id_nha_xuat_ban where bs_sach.id_sach=?';
		$this->setQuery($sql);
		$param=array($id_book);
		return $this->loadRow($param);
	}

    public function get_all_book($vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_sach ORDER BY bs_sach.id_sach DESC";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function search_book($keyword,$vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_sach LEFT JOIN bs_tac_gia ON bs_sach.id_tac_gia=bs_tac_gia.id_tac_gia LEFT JOIN bs_loai_sach ON bs_sach.id_loai_sach=bs_loai_sach.id_loai_sach where bs_sach.ten_sach LIKE ? or bs_tac_gia.ten_tac_gia LIKE ? or bs_loai_sach.ten_loai_sach LIKE ?";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        $param=array("%$keyword%","%$keyword%","%$keyword%");
        return $this->loadAllRows($param);
    }

    //id_sach`, `ten_sach`, `id_tac_gia`, `id_loai_sach`, `id_nha_xuat_ban`, `don_gia`, `gia_bia`, `gioi_thieu_sach`, `hinh`, `noi_bat`, `so_sao`, `so_trang`, `ngay_xuat_ban`, `kich_thuoc`, `sku`, `trong_luong`
    public function add_book($ten_sach,$id_tac_gia,$id_loai_sach,$id_nha_xuat_ban,$don_gia,$gia_bia,$gioi_thieu,$hinh,$noi_bat)
    {
        $sql="INSERT INTO bs_sach VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        $param=array("",$ten_sach,$id_tac_gia,$id_loai_sach,$id_nha_xuat_ban,$don_gia,$gia_bia,$gioi_thieu,$hinh,$noi_bat,0,"","","","","");
        return $this->execute($param);
    }

    public function edit_book($id_book,$ten_sach,$id_tac_gia,$id_loai_sach,$id_nha_xuat_ban,$don_gia,$gia_bia,$gioi_thieu,$hinh,$noi_bat)
    {
        $sql="UPDATE bs_sach
              SET ten_sach=?, id_tac_gia=?, id_loai_sach=?, id_nha_xuat_ban=?, don_gia=?, gia_bia=?, gioi_thieu_sach=?, hinh=?, noi_bat=?
              WHERE bs_sach.id_sach=?";
        $this->setQuery($sql);
        $param=array($ten_sach,$id_tac_gia,$id_loai_sach,$id_nha_xuat_ban,$don_gia,$gia_bia,$gioi_thieu,$hinh,$noi_bat,$id_book);
        return $this->execute($param);
    }

    public function del_book($id_book)
    {
        $sql="DELETE FROM bs_sach WHERE bs_sach.id_sach=?";
        $this->setQuery($sql);
        $param=array($id_book);
        return $this->execute($param);
    }
}
?>