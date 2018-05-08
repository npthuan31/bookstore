<?php
class M_cart
{
    public function add_book($id_book,$quantity)
    {
        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"][]=array("id_book"=>$id_book,"quantity"=>$quantity);
            $_SESSION["cart_total"]=$quantity;
        }
        else
        {
            $is_id_book_exist=false;
            foreach ($_SESSION["cart"] as $key => $book)
            {
                if ($book["id_book"] == $id_book)
                {
                    $_SESSION["cart"][$key]["quantity"] += $quantity;
                    $_SESSION["cart_total"]+=$quantity;
                    $is_id_book_exist=true;
                    break;
                }
            }
            if(!$is_id_book_exist)
            {
                $_SESSION["cart"][] = array("id_book" => $id_book, "quantity" => $quantity);
                $_SESSION["cart_total"]+=$quantity;
            }
        }
        return $_SESSION["cart"];
    }

    public function remove_book($id_book)
    {
        foreach ($_SESSION["cart"] as $key => $book)
        {
            if ($book["id_book"] == $id_book)
            {
                unset($_SESSION["cart"][$key]);
                $_SESSION["cart_total"]-=$book["quantity"];
                break;
            }
        }

        $total_price=0;
        foreach ($_SESSION["cart"] as $key => $book)
        {
            $total_price+=$book["book_detail"]->don_gia * $book["quantity"];
        }

        return $total_price;
    }

    public function update_quantity($id_book,$quantity)
    {
        foreach ($_SESSION["cart"] as $key => $book)
        {
            if ($book["id_book"] == $id_book)
            {
                if($book["quantity"] < $quantity) //Inc quantity
                {
                    $_SESSION["cart"][$key]["quantity"] = $quantity;
                    $_SESSION["cart_total"] += $quantity - $book["quantity"];
                }
                else //Des quantity
                {
                    $_SESSION["cart"][$key]["quantity"] = $quantity;
                    $_SESSION["cart_total"] -= $book["quantity"] - $quantity;
                }

                $subtotal=$_SESSION["cart"][$key]["quantity"] * $book["book_detail"]->don_gia;
                break;
            }
        }

        $total_price=0;
        foreach ($_SESSION["cart"] as $key => $book)
        {
            $total_price+=$book["book_detail"]->don_gia * $book["quantity"];
        }

        $arr=array("subtotal"=>$subtotal,"total_price"=>$total_price);
        return $arr;
    }

    public function empty_cart()
    {
        unset($_SESSION["cart"]);
        unset($_SESSION["cart_total"]);
    }
}
?>