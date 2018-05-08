<?php
require_once('library/database.php');

class M_nha_xuat_ban extends database
{
    public function get_all_nha_xuat_ban()
    {
        $sql="SELECT * FROM bs_nha_xuat_ban";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function convert_name_to_id($ten_nha_xuat_ban)
    {
        $sql="SELECT * FROM bs_nha_xuat_ban WHERE bs_nha_xuat_ban.ten_nha_xuat_ban=?";
        $this->setQuery($sql);
        $param=array($ten_nha_xuat_ban);
        $result=$this->loadRow($param);
        if(!empty($result))
            return $result->id_nha_xuat_ban;
        else
            return 0;
    }

}


	

?>