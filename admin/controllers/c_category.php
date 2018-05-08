<?php
include_once("models/m_category.php");
class C_category
{
	protected $m_category;

	public function __construct()
	{
		$this->m_category = new M_category();
	}
	
    public function autocomplete_category_name()
    {
        $categorys=$this->m_category->get_all_book_category();
        $category_array=array();
        foreach ($categorys as $key=>$category)
        {
            $category_array[]=$category->ten_loai_sach;
        }
        echo json_encode($category_array);
    }
}
?>