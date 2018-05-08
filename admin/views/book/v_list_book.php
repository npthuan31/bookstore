<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liệt kê sách</h1>
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
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($books as $book)
                        {
                        ?>
                        <tr class="">
                            <td><?php echo $book->id_sach; ?></td>
                            <td><?php echo $book->ten_sach; ?></td>
                            <td><a href="edit_book.php?id_book=<?php echo $book->id_sach; ?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="" id="<?php echo $book->id_sach; ?>" class="del_book"><i class="fa fa-remove"></i></a></td>
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