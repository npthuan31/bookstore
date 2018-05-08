$("#my_cart").click(function () {
    if(isNaN(parseInt($(this).text()))===true)
    {
        $("#empty_cart").dialog({
            resizable: false,
            height: 205,
            width: 500,
            modal: true
        });
    }
    else
    {
        window.location.href="cart.php";
    }

});

$("#shopping_cart").click(function (e) {
    e.preventDefault();
    $("#my_cart").click();
});

$(".continue_shopping").click(function (e) {
    e.preventDefault();
    $(this).closest('.ui-dialog-content').dialog('close');
});

//Add book to cart
$("button[name='add_to_cart']").click(function () {
    var id_book=$(this).attr("id");
    var quantity=$("#quantity").val();

    // Ajax
    $.ajax({
        url:"process_cart.php",
        type:"POST",
        data:{
            "action":"add_book",
            "id_book":id_book,
            "quantity":quantity
        },
        success:function (result) {
            $("#quantity_popup").text(" " + $("#quantity").val() + " ");

            $("#add_cart_confirm").dialog({
                resizable: false,
                height: 200,
                width: 500,
                modal: true
            });

            $("#my_cart").text(result + " quyển sách")

        },
        error:function() {
            alert('Có lỗi trong quá trình thêm sản phẩm');
        }
    });
});

//Remove book in cart
$(document).on("click" , ".remove_book", function (e) {
    e.preventDefault();
    var id_book=$(this).attr("id");

    // Ajax
    $.ajax({
        url:"process_cart.php",
        type:"POST",
        dataType: 'json',
        data:{
            "action":"remove_book",
            "id_book":id_book
        },
        success:function (result){

            $("#total_price").text(numeral(result["total_price"]).format("0,0"));

            $("#row" + id_book).fadeOut('slow',function () {
                $(this).remove();
            });

            var new_quantity = result["cart_total"];
            if(new_quantity > 0 )
            {
                $("#my_cart").text(new_quantity + " quyển sách")
            }
            else
            {
                $("#my_cart").text("Giỏ hàng trống");

                $("#empty_cart").dialog({
                    resizable: false,
                    height: 205,
                    width: 500,
                    modal: true,
                    close: function(event, ui) { window.location.href = "index.php"; }
                });
            }

        },
        error:function() {
            alert('Có lỗi trong quá trình xóa sản phẩm');
        }
    });
});

//Upate Quantiti
$("select.quantity").each(function () {
    $(this).change(function () {
        var id_book = $(this).attr("name");
        var quantity = $(this).val();

        // Ajax
        $.ajax({
            url: "process_cart.php",
            type: "POST",
            dataType: 'json',
            data: {
                "action": "update_quantity",
                "id_book": id_book,
                "quantity": quantity
            },
            success: function (result) {

                $("#total_price").text(numeral(result["total_price"]).format("0,0"));
                $("#my_cart").text(result["cart_total"] + " quyển sách");
                $("#subtotal" + id_book).text(numeral(result["subtotal"]).format("0,0") + "đ");
            },
            error: function () {
                alert('Có lỗi trong quá trình cập nhập sản phẩm');
            }
        });
    });
});

//Process order
//`id_don_hang`, `tong_tien`, `ngay_dat`, `tai_khoan`, `ho_ten_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `trang_thai`
$("#process_order").click(function (e) {
    e.preventDefault();
    var tai_khoan=$("#username").text();
    var ho_ten_nguoi_nhan=$("#ho_ten").val().trim();
    var so_dien_thoai_nguoi_nhan=$("#so_dien_thoai").val();
    var dia_chi_nguoi_nhan=$("#dia_chi").val().trim();

    if(ho_ten_nguoi_nhan === "")
    {
        alert("Vui lòng nhập họ tên");
        $("#ho_ten").focus();
        return false;
    }

    if(dia_chi_nguoi_nhan === "")
    {
        alert("Vui lòng nhập địa chỉ");
        $("#dia_chi").focus();
        return false;
    }

    if(so_dien_thoai_nguoi_nhan === "")
    {
        alert("Vui lòng nhập số điện thoại");
        $("#so_dien_thoai").focus();
        return false;
    }
    //alert(tai_khoan + " " + ho_ten_nguoi_nhan + " " + " " + so_dien_thoai_nguoi_nhan + " " + dia_chi_nguoi_nhan);

    // Ajax
    $.ajax({
        url: "process_order.php",
        type: "POST",
        data: {
            "tai_khoan": tai_khoan,
            "ho_ten_nguoi_nhan":ho_ten_nguoi_nhan,
            "so_dien_thoai_nguoi_nhan":so_dien_thoai_nguoi_nhan,
            "dia_chi_nguoi_nhan":dia_chi_nguoi_nhan
        },
        success: function (result) {
            $("#success_order").dialog({
                resizable: false,
                height: 240,
                width: 500,
                modal: true,
                close: function (event, ui) {
                    window.location.href = "index.php";
                }
            });
        },
        error: function () {
            alert("Quá trình đặt hàng bị lỗi. Vui lòng liên hệ bộ phận trợ giúp");
        }
    });
});

