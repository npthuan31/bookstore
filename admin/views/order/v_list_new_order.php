<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đơn hàng mới đang chờ xử lý</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
                <div class="panel-body">
                    <span style="float: right;"><?php echo $lst ?></span>
                    <br><br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tài khoản</th>
                            <th>Họ tên</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($orders as $order)
                        {
                        ?>
                        <tr class="">
                            <td><?php echo $order->id_don_hang; ?></td>
                            <td><?php echo $order->tai_khoan; ?></td>
                            <td><?php echo $order->ho_ten_nguoi_nhan; ?></td>
                            <td><?php echo $order->tong_tien; ?></td>
                            <td><?php echo $order->ngay_dat; ?></td>
                            <td><span class="label <?php echo Helper::order_state_num_to_class($order->trang_thai) ?>"><?php echo Helper::order_state_num_to_string($order->trang_thai); ?></span></td>
                            <td><a href="order_detail.php?id_order=<?php echo $order->id_don_hang; ?>"><i class="fa fa-info-circle"></i></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <span style="float: right;"><?php echo $lst ?></span>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>