<?php
require_once('library/database.php');
class M_user extends database
{
    public function get_user($username,$password)
    {
        $sql='select * FROM bs_nguoi_dung WHERE bs_nguoi_dung.tai_khoan=? and bs_nguoi_dung.mat_khau=?';
        $this->setQuery($sql);
        $param=array($username,$password);
        return $this->loadRow($param);
    }

    public function save_user($fullname,$username,$email,$password,$level)
    {
        $sql="INSERT INTO bs_nguoi_dung VALUES(?,?,?,?,?,?)";
        $this->setQuery($sql);
        $param=array("",$fullname,$username,$email,$password,$level);
        return $this->execute($param);
    }

    public function search_user($username)
    {
        $sql='select * FROM bs_nguoi_dung WHERE bs_nguoi_dung.tai_khoan=?';
        $this->setQuery($sql);
        $param=array($username);
        return $this->loadRow($param);
    }
}
?>

