<?php
require_once('library/database.php');

class M_author extends database
{
    public function get_all_author()
    {
        $sql="SELECT * FROM bs_tac_gia";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function get_author_by_id($id_author)
    {
        $sql="SELECT * FROM bs_tac_gia WHERE bs_tac_gia.id_tac_gia=?";
        $this->setQuery($sql);
        $param=array($id_author);
        return $this->loadRow($param);
    }

    public function convert_name_to_id($author_name)
    {
        $sql="SELECT * FROM bs_tac_gia WHERE bs_tac_gia.ten_tac_gia=?";
        $this->setQuery($sql);
        $param=array($author_name);
        $result=$this->loadRow($param);
        if(!empty($result))
            return $result->id_tac_gia;
        else
            return 0;
    }

}


	

?>