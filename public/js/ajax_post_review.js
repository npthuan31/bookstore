$("#btn_post_review").click (function() {
    var id_book=$("[name='add_to_cart']").attr("id");
    var username=$("#username").text();
    var review_content=$("#txt_review").val();
    var vote=$("input[name='optionsRadios']:checked").val();

    if(review_content.trim() === "")
    {
        alert("Vui lòng nhập đánh giá của bạn trước khi gởi");
        return false;
    }
    if(vote === null || vote === undefined)
    {
        alert("Vui lòng bình chọn sao trước khi gởi");
        return false;
    }

    // Ajax
    $.ajax({
        url:"process_post_review.php",
        type:"POST",
        data:{
            "id_book":id_book,
            "username":username,
            "review_content":review_content,
            "vote":vote
        },
        success:function (result){
            if(result!=="")
            {
                alert(result);
                window.location.reload(true);
            }
            else
            {
                alert("Có lỗi trong quá trình gởi đánh giá")
            }
        },
        error:function() {
            alert('Có lỗi trong quá trình gởi đánh giá');
        }
    });
});