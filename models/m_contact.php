<?php
require_once('library/database.php');
class M_contact
{
    protected $db;
    public function __construct()
    {
        $this->db = new database();
    }

    public function add_contact($ho_ten,$email,$noi_dung)
    {
        $sql="INSERT INTO bs_lien_he VALUES(?,?,?,?)";
        $this->db->setQuery($sql);
        $param=array("",$ho_ten,$email,$noi_dung);
        return $this->db->execute($param);
    }
}

?>