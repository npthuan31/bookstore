<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sách</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div hidden class="panel-heading show_mess">
                    <h4 style="color: red;font-weight: bold;"><?php echo isset($error_add_book)?$error_add_book:""; ?></h4>
                </div>
                <div hidden class="panel-heading show_mess">
                    <h4 style="color: green;font-weight: bold;"><?php echo isset($success_add_book)?$success_add_book:""; ?></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <button type="submit" name="add_book" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-danger">Nhập lại</button>
                                <br><br>
                                <div class="form-group">
                                    <label>Tên sách</label>
                                    <input class="form-control" name="ten_sach" required>
                                </div>
                                <div class="form-group">
                                    <label>Tác giả</label>
                                    <input id="tac_gia" class="form-control" name="tac_gia" required>
                                    <p class="help-block">Nếu không tìm được tác giả vui lòng thêm tác giả trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <input id="loai_sach" class="form-control" name="loai_sach" required>
                                    <p class="help-block">Nếu không tìm được thể loại vui lòng thêm thể loại trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Nhà xuất bản</label>
                                    <input id="nha_xuat_ban" class="form-control" name="nha_xuat_ban" required>
                                    <p class="help-block">Nếu không tìm được nhà xuất bản vui lòng thêm nhà xuất bản trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <input class="form-control" name="don_gia" required>
                                </div>
                                <div class="form-group">
                                    <label>Giá bìa</label>
                                    <input class="form-control" name="gia_bia" required>
                                </div>
                                <div class="form-group">
                                    <label>Sách nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="noi_bat">Có
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu sách</label>
                                    <textarea class="form-control ckeditor" rows="5" name="gioi_thieu" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <table width="432" border="1">
                                        <tr>
                                            <td colspan="1" height="400"><img id="preview_book_img" src="" width="432" height="400"></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <input id="upload_book_img" type="file" name="hinh" required>
                                    <br>
                                </div>
                                <button type="submit" name="add_book" class="btn btn-success">Lưu</button>
                                <button type="reset" class="btn btn-danger">Nhập lại</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>