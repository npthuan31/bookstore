<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết đơn hàng: #<?php echo $order->id_don_hang ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-body">
                <table>
                    <tr>
                        <td style="font-weight: bold;" colspan="2">Thông tin giao hàng</td>
                    </tr>
                    <tr>
                        <td>Tài khoản : </td>
                        <td><?php echo $order->tai_khoan ?></td>
                    </tr>
                    <tr>
                        <td>Họ tên : </td>
                        <td><?php echo $order->ho_ten_nguoi_nhan ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại : </td>
                        <td><?php echo $order->so_dien_thoai_nguoi_nhan ?></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ : </td>
                        <td><?php echo $order->dia_chi_nguoi_nhan ?></td>
                    </tr>
                </table>
                <hr>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Mã sách</th>
                        <th>Tên sách</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($orders_detail as $order_detail)
                    {
                        ?>
                        <tr class="">
                            <td><?php echo $order_detail->id_sach; ?></td>
                            <td><?php echo $order_detail->ten_sach; ?></td>
                            <td><?php echo $order_detail->so_luong; ?></td>
                            <td><?php echo $order_detail->don_gia; ?></td>
                            <td><?php echo $order_detail->thanh_tien; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <hr>
                <span style="font-weight: bold">Trạng thái: </span>
                <span id="state" class="label <?php echo Helper::order_state_num_to_class($order->trang_thai) ?>"><?php echo Helper::order_state_num_to_string($order->trang_thai) ?></span>
                <span><a href="" id="edit_order_state"><i class="fa fa-edit">Chỉnh sửa</i></a></span>
                <div hidden style="margin-top: 10px;" class="well" id="toggle_edit_order_state">
                    <div hidden id="success_change_order_sate" style="height: 40px;padding:0.5em; margin-bottom: 5px;" class="alert alert-success">
                        <strong>Thành công!</strong> Đổi trạng thái thành công.
                    </div>
                    <label class="label label-primary">
                        <input type="radio" name="order_state" id="optionsRadiosInline1" value="0"> Chờ xử lý
                    </label>&nbsp;
                    <label class="label label-success">
                        <input type="radio" name="order_state" id="optionsRadiosInline2" value="1" checked> Đã hoàn tất
                    </label>&nbsp;
                    <label class="label label-danger">
                        <input type="radio" name="order_state" id="optionsRadiosInline3" value="2"> Đã bị hủy
                    </label>
                    <br>
                    <button id="<?php echo $order->id_don_hang ?>" style="margin-top:10px;" class="btn btn-xs btn-success apply_order_state" type="button"><i class="fa fa-play-circle"> Áp dụng</i></button>
                </div>
                <hr>
                <a href="<?php echo isset($_SESSION["previous_page"])?$_SESSION["previous_page"]:"list_order.php";  ?>" class="btn btn-sm btn-info"><i class="fa fa-backward"> Trở về trang trước</i></a>

            </div>

            <!-- /.panel-body -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>