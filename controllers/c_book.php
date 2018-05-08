<?php
include_once("models/m_book.php");
include_once("models/m_category.php");
include_once("models/m_author.php");
include_once("models/m_review.php");
include_once("library/Pager.php");
class C_book
{
	protected $m_book;
	protected $m_category;
	protected $m_author;
	protected $m_review;
	
	public function __construct()
	{
		$this->m_book = new M_book();
		$this->m_category = new M_category();
		$this->m_author = new M_author();
		$this->m_review = new M_review();
	}
	
	public function show_book_homepage()
	{
		//////////Model//////////
		$featured_books=$this->m_book->get_featured_book();
		$sale_books=$this->m_book->get_sale_book();
        $best_seller_books=$this->m_book->get_best_seller_book();

		//////////View//////////
        //Title
        $site_title="Vườn ngôn từ";

        //Content Holder
        $content="views/book/v_book_homepage.php";

        //Load layout
        include("public/template/layout.php");
		
	}
	
	public function show_book_detail()
	{
		//////////Model//////////
        //Book detail
        $id_book=$_GET["id_book"];
		$book_detail=$this->m_book->get_book_by_id($id_book);

		//Related Book
		$id_category=$book_detail->id_loai_sach;
        $relate_books=$this->m_book->get_book_same_catecory($id_book,$id_category);

        //Book Reviews
        $book_reviews=$this->m_review->get_review($id_book);
            
		//Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

		//////////View//////////
        //Title
        $site_title=$book_detail->ten_sach;
        $heading_bar_title="Chi tiết sách";

        //Content Holder
        $content="views/book/v_book_detail.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
	}
	
	public function show_new_book()
	{
		//////////Model//////////
        //New book
		$books=$this->m_book->get_new_book();

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_new_book($vt,$limit);

        //Side Bar
		$book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Sách mới nhất";
        $heading_bar_title="Sách mới nhất";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
	}

    public function show_featured_book()
    {
        //////////Model//////////
        //New book
        $books=$this->m_book->get_featured_book();

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_featured_book($vt,$limit);

        //Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Sách nổi bật";
        $heading_bar_title="Sách nổi bật";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_sale_book()
    {
        //////////Model//////////
        //New book
        $books=$this->m_book->get_sale_book();

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_sale_book($vt,$limit);

        //Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Sách giảm giá nhiều nhất";
        $heading_bar_title="Sách giảm giá nhiều nhất";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

	public function show_book_by_category()
    {
        //////////Model//////////
        //Side bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //Get book category specified
        if(isset($_GET["id_category"]))
        {
            $id_category=$_GET["id_category"];
            $current_category=$this->m_category->get_book_category_by_id($id_category);
            $site_title=$current_category->ten_loai_sach;
            $heading_bar_title=$current_category->ten_loai_sach;
        }
        else
        {
            $id_category=$book_categorys[0]->id_loai_sach;
            $site_title="Sách theo danh mục";
            $heading_bar_title=$book_categorys[0]->ten_loai_sach;
        }

        //Get all book in a category
        $books=$this->m_book->get_book_by_category($id_category);

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_book_by_category($id_category,$vt,$limit);

        //////////View//////////
        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_book_by_author()
    {
        //////////Model//////////
        //Side Bar
        $authors=$this->m_author->get_all_author();
        $book_categorys=$this->m_category->get_all_book_category();

        //Get author specified
        if(isset($_GET["id_author"]))
        {
            $id_author=$_GET["id_author"];
            $current_author=$this->m_author->get_author_by_id($id_author);
            $site_title=$current_author->ten_tac_gia;
            $heading_bar_title=$current_author->ten_tac_gia;
        }
        else
        {
            $id_author=$authors[0]->id_tac_gia;
            $site_title="Sách theo tác giả";
            $heading_bar_title=$authors[0]->ten_tac_gia;
        }

        //Get all book by a author
        $books=$this->m_book->get_book_by_author($id_author);

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_book_by_author($id_author,$vt,$limit);

        //////////View//////////
        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_ranking_book()
    {
        //////////Model//////////
        //Ranking book
        $books=$this->m_book->get_ranking_book();

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_ranking_book($vt,$limit);

        //Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Sách được yêu thích nhất";
        $heading_bar_title="Sách được yêu thích nhất";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_best_seller_book()
    {
        //////////Model//////////
        //Best Seller Book
        $books=$this->m_book->get_best_seller_book();

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->get_best_seller_book($vt,$limit);

        //Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Sách bán chạy nhất";
        $heading_bar_title="Sách bán chạy nhất";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_search_book()
    {
        //////////Model//////////
        //Searching Book
        $keyword=$_GET["keyword"];
        $books=$this->m_book->search_book($keyword);
        if(!empty($books))
        {
            $heading_bar_title="Sách được tìm thấy";
        }
        else
        {
            $heading_bar_title="Không tìm thấy quyển sách nào theo yêu cầu";
        }

        // Phân trang
        $p=new pager();
        $limit=9;
        $count=count($books);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $books=$this->m_book->search_book($keyword,$vt,$limit);

        //Side Bar
        $book_categorys=$this->m_category->get_all_book_category();
        $authors=$this->m_author->get_all_author();

        //////////View//////////
        //Title
        $site_title="Tìm kiếm sách";

        //Content Holder
        $content="views/book/v_book_grid_view.php";
        $side_bar="views/book/v_side_bar.php";

        //Load layout
        include("public/template/layout.php");
    }
}
?>