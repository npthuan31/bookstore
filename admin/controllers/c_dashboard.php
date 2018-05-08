<?php
include_once("models/m_order.php");
class C_dashboard
{
    public $m_order;

    public function __construct()
    {
        $this->m_order = new M_order();
    }

    public function show_dashboard()
    {
        //////////Model//////////
        $waiting_orders=$this->m_order->get_order_by_state(0);
        $total_waiting_order=count($waiting_orders);

        //////////View//////////
        //Content Holder
        $content="views/dashboard/v_dashboard.php";

        //Load layout
        include("public/template/layout.php");

    }
}
?>