$(function () {
    $(".gia_bia").each(function () {
        if($(this).text()!=="")
        {
            var gia_bia=parseInt($(this).text().slice(0,-1).replace(/,/g, ''));
            //alert(gia_bia);
            var don_gia=parseInt($(this).prevAll(".don_gia").first().text().slice(0,-1).replace(/,/g, ''));
            //alert(don_gia);
            var discount_percent = 100 - (don_gia * 100 / gia_bia);
            $(this).nextAll(".discount_percent").first().text("-"+discount_percent.toFixed(0)+"%");
        }
    });
});

