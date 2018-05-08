$(".show_mess").each(function () {
    if($(this).text().trim()!=="")
    {
        $(this).show();
    }
});

$(function () {
    // Ajax
    $.ajax({
        url:"autocomplete.php",
        type:"POST",
        dataType: 'json',
        data:{
            "key":"tac_gia"
        },
        success:function (result){
            var arr_tac_gia=result;
            $( "#tac_gia" ).autocomplete({
                source: arr_tac_gia,
                minLength: 0,
                autoFocus: true
            }).focus(function () {
                $(this).keydown();
            })
        }
    });
});

$(function () {
    // Ajax
    $.ajax({
        url:"autocomplete.php",
        type:"POST",
        dataType: 'json',
        data:{
            "key":"loai_sach"
        },
        success:function (result){
            var arr_loai_sach=result;
            $( "#loai_sach" ).autocomplete({
                source: arr_loai_sach,
                minLength: 0,
                autoFocus: true
            }).focus(function () {
                $(this).keydown();
            });
        }
    });
});

$(function () {
    // Ajax
    $.ajax({
        url:"autocomplete.php",
        type:"POST",
        dataType: 'json',
        data:{
            "key":"nha_xuat_ban"
        },
        success:function (result){
            var arr_nha_xuat_ban=result;
            $( "#nha_xuat_ban" ).autocomplete({
                source: arr_nha_xuat_ban,
                minLength: 0,
                autoFocus: true
            }).focus(function () {
                $(this).keydown();
            });
        }
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_book_img').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#upload_book_img").change(function(){
    readURL(this);
});

$(function () {
    $(".ckeditor").ckeditor();
});

$(".del_book").click(function (e) {
    e.preventDefault();
    var id_book=$(this).attr("id");
    var del_book_button=$(this);

    // Ajax
    $.ajax({
        url:"del_book.php",
        type:"POST",
        data:{
            "id_book":id_book
        },
        success:function (result){
            if(result.trim()!=="error")
            {
                del_book_button.closest("tr").hide(200);
            }
            else
            {
                alert("Xóa bị lỗi!")
            }
        },
        error:function(error) {
            alert(error);
        }
    });

});

$("#edit_order_state").click(function (e) {
    e.preventDefault();
    $("#toggle_edit_order_state").slideToggle("slow");
});

$(".apply_order_state").click(function () {
    var id_order=$(this).attr("id");
    var state=$("input[name='order_state']:checked").val();

    // Ajax
    $.ajax({
        url:"edit_order.php",
        type:"POST",
        data:{
            "id_order":id_order,
            "state":state
        },
        success:function (result){
            if(result.trim()!=="error")
            {
                if(Number(result)===0)
                {
                    $("#state").text("Chờ xử lý").removeClass().addClass("label label-primary");
                }
                if(Number(result)===1)
                {
                    $("#state").text("Đã hoàn tất").removeClass().addClass("label label-success");
                }
                if(Number(result)===2)
                {
                    $("#state").text("Đã bị hủy").removeClass().addClass("label label-danger");
                }
                $("#success_change_order_sate").show();
            }
            else
            {
                alert("Sửa bị lỗi!")
            }
        },
        error:function(error) {
            alert(error);
        }
    });

});