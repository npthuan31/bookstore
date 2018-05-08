<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa sách</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div hidden class="panel-heading show_mess">
                    <h4 style="color: red;font-weight: bold;"><?php echo isset($error_edit_book)?$error_edit_book:""; ?></h4>
                </div>
                <div hidden class="panel-heading show_mess">
                    <h4 style="color: green;font-weight: bold;"><?php echo isset($success_edit_book)?$success_edit_book:""; ?></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <button type="submit" name="edit_book" class="btn btn-success">Lưu</button>
                                <a href="<?php echo isset($_SESSION["previous_page"])?$_SESSION["previous_page"]:"list_book.php"; ?>" class="btn btn-info">Trở về</a>
                                <br><br>
                                <div class="form-group">
                                    <label>Tên sách</label>
                                    <input class="form-control" name="ten_sach" value="<?php echo $book->ten_sach ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tác giả</label>
                                    <input id="tac_gia" class="form-control" name="tac_gia" value="<?php echo $book->ten_tac_gia ?>">
                                    <p class="help-block">Nếu không tìm được tác giả vui lòng thêm tác giả trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Thể loại</label>
                                    <input id="loai_sach" class="form-control" name="loai_sach" value="<?php echo $book->ten_loai_sach ?>">
                                    <p class="help-block">Nếu không tìm được thể loại vui lòng thêm thể loại trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Nhà xuất bản</label>
                                    <input id="nha_xuat_ban" class="form-control" name="nha_xuat_ban" value="<?php echo $book->ten_nha_xuat_ban ?>">
                                    <p class="help-block">Nếu không tìm được nhà xuất bản vui lòng thêm nhà xuất bản trước</p>
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <input class="form-control" name="don_gia" value="<?php echo $book->don_gia ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giá bìa</label>
                                    <input class="form-control" name="gia_bia" value="<?php echo $book->gia_bia ?>">
                                </div>
                                <div class="form-group">
                                    <label>Sách nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="noi_bat" <?php echo $book->noi_bat==1?"checked":""; ?>>Có
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giới thiệu sách</label>
                                    <textarea class="form-control ckeditor" rows="5" name="gioi_thieu"><?php echo $book->gioi_thieu_sach ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <table width="432" border="1">
                                        <tr>
                                            <td colspan="1" height="400"><img id="preview_book_img" src="../public/images/<?php echo $book->hinh ?>" width="432" height="400"></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <input id="upload_book_img" type="file" name="hinh">
                                    <br>
                                </div>
                                <button type="submit" name="edit_book" class="btn btn-success">Lưu</button>
                                <a href="<?php echo isset($_SESSION["previous_page"])?$_SESSION["previous_page"]:"list_book.php"; ?>" class="btn btn-info">Trở về</a>
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
</div><?php
/**
 * Created by PhpStorm.
 * User: LAP99141-local
 * Date: 6/29/2017
 * Time: 10:55 AM
 */