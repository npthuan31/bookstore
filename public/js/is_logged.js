if($("#fullname").text()!="")
{
    $(".please_login").remove();
}
else
{
    $("#fullname").remove();
    $("#username").remove();
    $("#txt_review").prop("disabled", true);
    $("input[name='optionsRadios']").prop("disabled",true);
    $("#btn_post_review").prop("disabled",true);
}
////////////////////////////////////////////////////////////
$(function () {
    if($("#error_reg").text()!=="") {
        $("#after_reg").show();
        $("#reg_form").hide();
    }
});
//////////////////////////////////////////////////////////
$(".show_mess").each(function () {
    if($(this).text().trim()!=="")
    {
        $(this).show();
        $(".after_send_contact").show();
        $("#contact_form").hide();
    }
});