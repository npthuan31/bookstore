<?php
require_once('library/database.php');

class M_book extends database
{
	public function get_new_book($vt=-1,$limit=-1)
	{
		$sql='SELECT * FROM bs_sach order by bs_sach.id_sach DESC';
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	public function get_featured_book($vt=-1,$limit=-1)
	{
		$sql='SELECT * FROM bs_sach LEFT JOIN bs_tac_gia ON bs_sach.id_tac_gia=bs_tac_gia.id_tac_gia where bs_sach.noi_bat=1 order by bs_sach.id_sach DESC';
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	
	public function get_sale_book($vt=-1,$limit=-1)
	{
		$sql='SELECT *,100-(bs_sach.don_gia*100/bs_sach.gia_bia) as giam_gia FROM bs_sach ORDER BY giam_gia DESC';
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
		$this->setQuery($sql);
		return $this->loadAllRows();
	}

    public function get_ranking_book($vt=-1,$limit=-1)
    {
        $sql='SELECT * FROM bs_sach ORDER BY bs_sach.so_sao DESC';
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

	public function get_book_by_id($id_book)
	{
		$sql='SELECT * FROM bs_sach LEFT JOIN bs_tac_gia ON bs_sach.id_tac_gia=bs_tac_gia.id_tac_gia LEFT JOIN bs_loai_sach ON bs_sach.id_loai_sach=bs_loai_sach.id_loai_sach LEFT JOIN bs_nha_xuat_ban ON bs_sach.id_nha_xuat_ban=bs_nha_xuat_ban.id_nha_xuat_ban where bs_sach.id_sach=?';
		$this->setQuery($sql);
		$param=array($id_book);
		return $this->loadRow($param);
	}

    public function get_random_book()
    {
        $sql="SELECT * FROM bs_sach ORDER BY rand() LIMIT 50";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function get_book_by_category($id_category,$vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_sach WHERE bs_sach.id_loai_sach=?";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        $param=array($id_category);
        return $this->loadAllRows($param);
    }

    public function get_book_by_author($id_author,$vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_sach WHERE bs_sach.id_tac_gia=?";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        $param=array($id_author);
        return $this->loadAllRows($param);
    }

    public function get_book_same_catecory($id_book,$id_category,$vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_sach WHERE bs_sach.id_loai_sach=? AND bs_sach.id_sach!=? ORDER BY rand()";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->setQuery($sql);
        $param=array($id_category,$id_book);
        return $this->loadAllRows($param);
    }

    public function get_best_seller_book($vt=-1,$limit=-1)
    {
        $sql="select * FROM bs_sach t1 JOIN (SELECT SUM(so_luong) as so_luong_da_dat,id_sach FROM `bs_chi_tiet_don_hang` GROUP by id_sach ORDER BY so_luong_da_dat DESC) as t2 ON t1.id_sach=t2.id_sach";
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
}
?>