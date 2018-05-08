<?php
include_once("models/m_nha_xuat_ban.php");
class C_nha_xuat_ban
{
    protected $m_nha_xuat_ban;

    public function __construct()
    {
        $this->m_nha_xuat_ban = new M_nha_xuat_ban();
    }

    public function autocomplete_nha_xuat_ban_name()
    {
        $nha_xuat_bans=$this->m_nha_xuat_ban->get_all_nha_xuat_ban();
        $nha_xuat_ban_array=array();
        foreach ($nha_xuat_bans as $key=>$nha_xuat_ban)
        {
            $nha_xuat_ban_array[]=$nha_xuat_ban->ten_nha_xuat_ban;
        }
        echo json_encode($nha_xuat_ban_array);
    }
}
?>