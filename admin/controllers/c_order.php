<?php
include_once("models/m_order.php");
include_once("library/Pager.php");
include_once("library/Helper.php");
class C_order
{
    protected $m_order;

    public function __construct()
    {
        $this->m_order = new M_order();
    }

    public function show_all_order()
    {
        $_SESSION["previous_page"]=basename($_SERVER["REQUEST_URI"]);
        $orders=$this->m_order->get_all_order();

        // Phân trang
        $p=new pager();
        $limit=20;
        $count=count($orders);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $orders=$this->m_order->get_all_order($vt,$limit);

        ////View/////
        //Content Holder
        $content="views/order/v_list_order.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_order_detail()
    {
        $id_order=$_GET["id_order"];
        $order=$this->m_order->get_order_by_id($id_order);
        $orders_detail=$this->m_order->get_order_detail($id_order);

        ////View/////
        //Content Holder
        $content="views/order/v_order_detail.php";

        //Load layout
        include("public/template/layout.php");
    }

    public function show_edit_order()
    {
        $id_order=$_POST["id_order"];
        $state=$_POST["state"];
        $result=$this->m_order->edit_order($id_order,$state);
        if($result)
            echo $state;
        else
            echo "error";
    }

    public function show_new_order()
    {
        $_SESSION["previous_page"]=basename($_SERVER["REQUEST_URI"]);
        $orders=$this->m_order->get_order_by_state(0);

        // Phân trang
        $p=new pager();
        $limit=20;
        $count=count($orders);
        $pages=$p->findPages($count,$limit);
        $vt=$p->findStart($limit);
        $curpage=$_GET["page"];
        $lst=$p->pageList($curpage,$pages);
        // Đọc lại
        $orders=$this->m_order->get_order_by_state($vt,$limit);

        ////View/////
        //Content Holder
        $content="views/order/v_list_new_order.php";

        //Load layout
        include("public/template/layout.php");
    }
}

?>