<?php
include_once("models/m_review.php");
class C_review
{
    protected $m_review;

    public function __construct()
    {
        $this->m_review = new M_review();
    }

    public function post_review()
    {
        /////Model/////
        $id_book=$_POST["id_book"];
        $username=$_POST["username"];
        $review_content=$_POST["review_content"];
        $vote=$_POST["vote"];
        $ngay=date("Y-m-d");
        $result=$this->m_review->save_review($id_book,$username,$review_content,$vote,$ngay);
        $this->m_review->update_ranking_to_book($id_book);
        if($result)
            $error_post_review="Gởi đánh giá thành công!";
        else
            $error_post_review="Có lỗi trong quá trình gởi đánh giá";
        echo $error_post_review;
    }
}

?>