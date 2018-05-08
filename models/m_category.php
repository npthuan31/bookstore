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
}

?>