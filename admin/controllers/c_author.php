<?php
include_once("models/m_author.php");
class C_author
{
	protected $m_author;

	public function __construct()
	{
		$this->m_author = new M_author();
	}
	
    public function autocomplete_author_name()
    {
        $authors=$this->m_author->get_all_author();
        $author_array=array();
        foreach ($authors as $key=>$author)
        {
            $author_array[]=$author->ten_tac_gia;
        }
        echo json_encode($author_array);
    }
}
?>