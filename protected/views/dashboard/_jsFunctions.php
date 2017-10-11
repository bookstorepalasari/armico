<script type="text/javascript">
    function addProduct(id,kode)
    {
        if(id == ''){
            var id = $('#id').val();
        }
        if(kode == ''){
            var kode = $('#kode').val();
        }
        var quantity = 1;
        $.ajax({
            type:'POST',
            url:'<?php echo $this->createUrl('loadFormSaleProducts'); ?>',
            data: {id:id, barcode:barcode, quantity:quantity},//
            dataType: "json",
            success:function(data){
                if(data.pesan != ''){
                    alert(data.pesan);
                    clearFormProduct();
                    return false;
                }
                var tambahkandetail = true;
                var productyangsama = $("#table-product input[name$='[kode]'][value='"+barcode+"']");
                if(productyangsama.val()){ //jika ada produk sudah ada di table
                    $("#table-product input[name$='[kode]'][value='"+kode+"']").each(function(){
                        var qty_sebelumnya = parseFloat($(this).parents('tr').find("input[name$='[quantity]']").val());
                        $(this).parents('tr').find("input[name$='[quantity]']").val(qty_sebelumnya + 1);
                    });
                    $("#table-product").find('input[name*="[ii]"][class*="integer"]').maskMoney(
                        {"symbol":"","defaultZero":true,"allowZero":true,"decimal":".","thousands":",","precision":0}
                    );
                    renameInputRowProducts($("#table-product"));                    
                    hitungTotal();
                    clearFormProduct();
                }else{
                    if(tambahkandetail){
                        $('#table-product > tbody').append(data.form);
                            $("#table-product").find('input[name*="[ii]"][class*="integer"]').maskMoney(
                                    {"symbol":"","defaultZero":true,"allowZero":true,"decimal":".","thousands":",","precision":0}
                            );
                        renameInputRowProducts($("#table-product"));                    
                        hitungTotal();
                        clearFormProduct();
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) { console.log(errorThrown);}
        });
    }
	
    function renameInputRowProducts(obj_table){
        var row = 0;
        $(obj_table).find("tbody > tr").each(function(){
            $(this).find("#no_urut").val(row+1);
            $(this).find('span').each(function(){ //element <input>
                var old_name = $(this).attr("name").replace(/]/g,"");
                var old_name_arr = old_name.split("[");
                if(old_name_arr.length == 3){
                    $(this).attr("name","["+row+"]["+old_name_arr[2]+"]");
                }
            });
            $(this).find('input,select,textarea').each(function(){ //element <input>
                var old_name = $(this).attr("name").replace(/]/g,"");
                var old_name_arr = old_name.split("[");
                if(old_name_arr.length == 3){
                    $(this).attr("id",old_name_arr[0]+"_"+row+"_"+old_name_arr[2]);
                    $(this).attr("name",old_name_arr[0]+"["+row+"]["+old_name_arr[2]+"]");
                }
            });
            row++;
        });
        $('#id').val('');
        $('#kode').val('');
    }
</script>