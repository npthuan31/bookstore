<?php
require_once('library/database.php');
class M_category extends database
{
    public function get_all_book_category()
    {
        $sql="SELECT * FROM bs_loai_sach";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function get_book_category_by_id($id_category)
    {
        $sql="SELECT * FROM bs_loai_sach WHERE bs_loai_sach.id_loai_sach=?";
        $this->setQuery($sql);
        $param=array($id_category);
        return $this->loadRow($param);
    }

    public function convert_name_to_id($category_name)
    {
        $sql="SELECT * FROM bs_loai_sach WHERE bs_loai_sach.ten_loai_sach=?";
        $this->setQuery($sql);
        $param=array($category_name);
        $result=$this->loadRow($param);
        if(!empty($result))
            return $result->id_loai_sach;
        else
            return 0;
    }
}

?>