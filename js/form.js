
function requiredCheck(obj){
    var kosong = 0;
    var email = 0;

    $(obj).find('input,select,textarea,label').each(function(){
        if($(this).parents(".form-group").find("label").hasClass('required') === true ){
            $(this).parents(".form-group").removeClass("error").removeClass("success");
            $(this).removeClass("error").removeClass("success");
        }
    });
    $(obj).find('input.validate,select.validate,textarea.validate').each(function(){
        if($(this).parents(".form-group").find("label").hasClass('required') === true ){
            if(($(this).val() === "" || $(this).val() === null)){
                if($(this).is(":hidden")){ //untuk element type:hidden 
                    var radio_checked = false;
                    $(this).parent().find(".radio").each(function(){ //mengecek element radio button
                        if($(this).find("input").is(":checked")){
                            radio_checked = true;
                        }
                    });
                    if(radio_checked == false){
                        $(this).parents(".form-group").addClass("error");
                        $(this).addClass("error");
                        kosong ++;
                    }else{
                        $(this).parents(".form-group").removeClass("error");
                        $(this).removeClass("error");
                    }
                }else{
                    $(this).parents(".form-group").addClass("error");
                    $(this).addClass("error");
                    $(this).parents(".form-group").find('label').addClass("error");
                    kosong ++;
                }
            }else{
//                $(this).parents(".control-group").removeClass("error");
            }
        }
    });
    
    if($(obj).find("input[type='file'][name*='lampiran_file_cv']").val() == ""){
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").addClass("error");
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").parents('.form-group').addClass("error");
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").parents('.form-group').find('label').addClass("error");
        kosong++;
    }else{
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").removeClass("error");
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").parents('.form-group').removeClass("error");
        $(obj).find("input[type='file'][name*='lampiran_file_cv']").parents('.form-group').find('label').removeClass("error");
    }

    
    $(obj).find('.email').each(function(){
            if($(this).val()!=""&&validateEmail($(this).val())==false){
                $(this).parents(".form-group").addClass("error");
                $(this).addClass("error");
                $(this).parents(".form-group").find('label').addClass("error");
                email++;
            }
    });


    if(kosong > 0 || email > 0){
        if(kosong>0){
            toastError("Silahkan isi yang bertanda bintang * !");
        }
        if(email>0){
            toastError("Isi email dengan format yang benar! Contoh : admin@gmail.com");
        }
        return false;
    }else{
        $(obj).find('.float').each(function(){
            $(this).val(unformatNumber($(this).val()));
        });
        $(obj).find('.integer').each(function(){
            $(this).val(unformatNumber($(this).val()));
        });
        $(obj).find("button[type='submit']").attr("disabled","disabled");
        $(obj).find("button[type='submit']").parent('div').addClass("srbacLoading");
        return true;
    }    
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

$( document ).ready(function(){
    //numbers-only = input hanya nomor 
    $('.numbers-only').keyup(function() {
        var d = $(this).attr('numeric');
        var value = $(this).val();
        var orignalValue = value;
        value = value.replace(/[0-9]*/g, "");
        var msg = "Only Integer Values allowed.";

        if (d == 'decimal') {
        value = value.replace(/\./, "");
        msg = "Only Numeric Values allowed.";
        }

        if (value != '') {
            orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
            $(this).val(orignalValue);
        }
    });
    /**class : all-caps = kapital semua */
    $('.all-caps').keyup(function() {
        var allcaps = $(this).val().toUpperCase();
        $(this).val(allcaps);
    });
    /**class : integer = format integer*/
    $(".integer").maskMoney(
        {"symbol":"","defaultZero":true,"allowZero":true,"decimal":".","thousands":",","precision":0}
    );
    /**class : float = format float / double (2 angka dibelakang koma)*/
    $(".float").maskMoney(
        {"symbol":"","defaultZero":true,"allowZero":true,"decimal":".","thousands":",","precision":2}
    );
    /**class : datemask = 00/00/0000 */
    $(".datemask").mask("99/99/9999");
    /**class : datetimemask = 00/00/0000 */
    $(".datetimemask").mask("99/99/9999 99:99:99");
});