<?php
require_once('library/database.php');

class M_order
{
    public $db;

    public function __construct()
    {
        $this->db=new database();
    }

    public function get_all_order($vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_don_hang ORDER  BY id_don_hang DESC";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->db->setQuery($sql);
        return $this->db->loadAllRows();
    }
    public function get_order_by_id($id_order)
    {
        $sql="SELECT * FROM bs_don_hang WHERE id_don_hang=?";
        $this->db->setQuery($sql);
        $param=array($id_order);
        return $this->db->loadRow($param);
    }

    public function get_order_detail($id_order)
    {
        $sql="SELECT * FROM bs_chi_tiet_don_hang INNER JOIN bs_sach ON bs_chi_tiet_don_hang.id_sach=bs_sach.id_sach WHERE bs_chi_tiet_don_hang.id_don_hang=?";
        $this->db->setQuery($sql);
        $param=array($id_order);
        return $this->db->loadAllRows($param);
    }

    public function edit_order($id_order,$state)
    {
        $sql="UPDATE bs_don_hang
             SET bs_don_hang.trang_thai=?
             WHERE bs_don_hang.id_don_hang=?";
        $this->db->setQuery($sql);
        $param=array($state,$id_order);
        return $this->db->execute($param);
    }

    public function get_order_by_state($state,$vt=-1,$limit=-1)
    {
        $sql="SELECT * FROM bs_don_hang WHERE trang_thai=? ORDER by id_don_hang DESC";
        if($vt>=0 && $limit>0)
        {
            $sql.=" limit $vt,$limit ";
        }
        $this->db->setQuery($sql);
        $param=array($state);
        return $this->db->loadAllRows($param);
    }
}

?>