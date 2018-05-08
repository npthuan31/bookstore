<?php
include ("models/m_cart.php");
include ("models/m_book.php");
class C_cart
{
    protected $m_cart;
    protected $m_book;

    public function __construct()
    {
        $this->m_cart = new M_cart();
        $this->m_book = new M_book();
    }

    public function add_book()
    {
        $id_book=$_POST["id_book"];
        $quantity=$_POST["quantity"];
        $this->m_cart->add_book($id_book,$quantity);
        echo $_SESSION["cart_total"];
    }

    public function remove_book()
    {
        $id_book=$_POST["id_book"];
        $total_price=$this->m_cart->remove_book($id_book);
        $data=array("cart_total"=>$_SESSION["cart_total"],"total_price"=>$total_price);
        echo json_encode($data);
    }

    public function update_quantity()
    {
        $id_book=$_POST["id_book"];
        $quantity=$_POST["quantity"];
        $result=$this->m_cart->update_quantity($id_book,$quantity);
        $data=array("cart_total"=>$_SESSION["cart_total"],"total_price"=>$result["total_price"],"subtotal"=>$result["subtotal"]);
        echo json_encode($data);
    }

    public function show_cart()
    {
        //////////Model/////////
        if(empty($_SESSION["cart"]))
        {
            header("location:index.php");
            exit();
        }

        //Get all items in cart and Price total
        $price_total=0;
        foreach($_SESSION["cart"] as $key=>$book)
        {
            if(!isset($_SESSION["cart"][$key]["book_detail"]))
            {
                $_SESSION["cart"][$key]["book_detail"]=$this->m_book->get_book_by_id($book["id_book"]);
            }
            $price_total+=$_SESSION["cart"][$key]["book_detail"]->don_gia * $book["quantity"];
        }

        //////////View//////////
        //Title
        $site_title="Thông tin giỏ hàng";
        $heading_bar_title="Thông tin giỏ hàng";

        //Content Holder
        $content="views/cart/v_show_cart.php";

        //Load layout
        include("public/template/layout.php");
    }
}

?>