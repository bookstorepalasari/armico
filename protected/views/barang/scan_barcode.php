<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sbarcode-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#sbarcode-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered'),
)); 
?>

<div class="row" style="margin:20px 10px 5px 10px;">
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'nama_toko',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 requireds','id'=>'nama_toko','maxlength'=>100)))); ?>
            <br><span class="message-required" id="message_nama_toko" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'no_isbn',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','id'=>'no_isbn','maxlength'=>100)))); ?>
        </div>
    </div>                                     
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'barcode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 requireds','id'=>'barcode','maxlength'=>100,'style'=>'margin-right:140px;')))); ?>
            <br><span class="message-required"id="message_barcode"  style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'judul_buku',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 requireds','id'=>'judul_buku','maxlength'=>100,'style'=>'margin-right:140px;')))); ?>
            <br><span class="message-required" id="message_judul_buku" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'panjang',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span2 float requireds','id'=>'panjang','maxlength'=>10, 'style'=>'width:100px;')))); ?>
              <span style="position:relative; top:-40px;left:220px;">cm</span>
            <br><span class="message-required" id="message_panjang" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
        <div class="col-md-6">
            <?php echo $form->dropDownListGroup($model,'penerbit_id', array(
                'widgetOptions'=>array(
                    'data'=>CHtml::listData(MPenerbit::model()->findAll(), 'id', 'penerbit'),
                    'htmlOptions'=>array(
                            'empty'=>'--- Pilih ---',
                            'style'=>'width:100px;',
                            'class'=>'requireds',
                            'id'=>'penerbit_id'
                            ),
                    )
                )); ?>
                <br><span class="message-required" id="message_penerbit_id" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'lebar',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span2 float requireds','id'=>'lebar','maxlength'=>10, 'style'=>'width:100px;')))); ?>
                <span style="position:relative; top:-40px;left:220px;">cm</span>
                <br><span class="message-required" id="message_lebar" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'harga_jual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 integer requireds','id'=>'harga_jual')))); ?>
            <br><span class="message-required" id="message_harga_jual" style="display: none; color: red; margin-top:-30px;  margin-bottom:10px; margin-left:110px;"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','id'=>'tahun','maxlength'=>5, 'style'=>'width:65px;')))); ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->textFieldGroup($model,'edisi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','id'=>'edisi','maxlength'=>100)))); ?>
        </div>
    </div>
    <div class="row">
        <!--<div class="form-group">-->
            <div style="text-align: center; margin-top:30px;">
                <?php echo CHtml::button('Simpan & Cetak', array('class' => 'btn btn-success','onClick'=>'submitForm();','onKeypress'=>'submitForm(); return false;')); ?>
                <?php echo CHtml::ResetButton('Reset', array('class' => 'btn btn-default')); ?>
            </div>
        <!--</div>-->
    </div>        
</div>                  
<?php $this->endWidget(); ?>

<script type="text/javascript">
    var req_val = '';
    var req_id = '';
    
    function submitForm(){
        var message = 'tidak boleh kosong.';
    var fill_required = 0;
            $(".requireds").each(function(index) {
                req_val = $(this).val();
                req_id = $(this).attr('id');
                if((req_val === '')||(req_val === '0.00')||(req_val === '0')){
                    $(this).parents('div').find('#message_'+req_id).css('display','block');
                    $(this).parents('div').find('#message_'+req_id).html(message);
                fill_required++;
                }else{
                    $(this).parents('div').find('#message_'+req_id).css('display','none');
                    $(this).parents('div').find('#message_'+req_id).html(message);
                }
            });
            
        if(fill_required === 0){
//            $('#sbarcode-form').submit();
            nama_toko = $('#nama_toko').val();
            no_isbn=$('#no_isbn').val();
            barcode=$('#barcode').val();  
            judul_buku=$('#judul_buku').val();
            panjang=$('#panjang').val();  
            penerbit_id=$('#penerbit_id').val();  
            lebar=$('#lebar').val();  
            harga_jual=$('#harga_jual').val();  
            tahun=$('#tahun').val();  
            edisi=$('#edisi').val();
      
                $.ajax({
                   type:'POST',
                   url:'<?php echo $this->createUrl('barang/cetakBarcode');?>',
                   data:{
                       nama_toko:nama_toko,
                       no_isbn:no_isbn,
                       barcode:barcode,
                       judul_buku:judul_buku,
                       panjang:panjang,
                       penerbit_id:penerbit_id,
                       lebar:lebar,
                       harga_jual:harga_jual,
                       tahun:tahun,
                       edisi:edisi,
                    },
                   dataType:"json",
                   success:function(data){
                       window.open('<?php echo $this->createUrl('barang/printBarcode&id=');?>'+data,'_blank');
                       setTimeout(function(){
                            location.reload();
                       },1000);
                   },
                   error:function (jqXHR, textStatus, errorThrown) { console.log(errorThrown); }
                });
        }
    }
    
$(document).ready(function(){
    setTimeout(function(){
        $('#scanBarcode').removeClass('ui-dialog-content');
        $('#scanBarcode').removeClass('ui-widget-content');
    },1000);
});
</script>