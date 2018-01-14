<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'modiftemplate-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#modiftemplate-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered'),
)); 
    // set list row STATIC
    $listRow = array(
        0=>'* Ignore',
        1=>'Judul',
        2=>'Barcode',
        3=>'No. ISBN',
        4=>'Penyusun',
        5=>'Kode Rak',
        6=>'Cover',
        7=>'Diskon',
        8=>'Edisi',
        9=>'Jumlah Stok',
        10=>'Harga Beli',
        11=>'Harga Jual',
        12=>'Penerbit',
        13=>'Golongan',
        14=>'Supplier',
        15=>'Jilid',
        16=>'Tahun'
    );
?>

<div class="row" style="margin:5px 10px 5px 10px;">
    <div class="row" style="font-style: italic; font-weight: bold; padding:5px;">
        * Set for header template export data excel
    </div>
</div>                  

<div class="row" style="margin:10px 10px 5px 10px;">
    <div class="row">
        <div class="col-md-3" style="padding-top:5px;">
            <label>Row 1 : </label> No.
        </div>
        <div class="col-md-3">
            <label>Row 5 : </label> 
            <select id="row5">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 5)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 9 : </label>
            <select id="row9">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 9)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 13 : </label> 
            <select id="row13">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 13)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div> 
    <div class="row" style="padding-top:5px;">
        <div class="col-md-3">
            <label>Row 2 : </label> 
            <select id="row2">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 2)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 6 : </label> 
            <select id="row6">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 6)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 10 : </label>
            <select id="row10">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 10)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 14 : </label> 
            <select id="row14">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 14)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>    
    <div class="row" style="padding-top:5px;">
        <div class="col-md-3">
            <label>Row 3 : </label> 
            <select id="row3">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 3)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 7 : </label> 
            <select id="row7">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 7)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 11 : </label>
            <select id="row11">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 11)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 15 : </label> 
            <select id="row15">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 15)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>         
    <div class="row" style="padding-top:5px;">
        <div class="col-md-3">
            <label>Row 4 : </label> 
            <select id="row4">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 4)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 8 : </label> 
            <select id="row8">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 8)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 12 : </label>
            <select id="row12">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 12)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Row 16 : </label> 
            <select id="row16">
                <?php foreach ($listRow as $a => $setRow): ?>
                    <option value='<?php echo $a; ?>' <?php echo (($a == 16)? 'selected':''); ?> ><?php echo $setRow; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row" style="padding-bottom: 10px;">
        <!--<div class="form-group">-->
            <div style="text-align: center; margin-top:30px;">
                <?php echo CHtml::button('Next', array('class' => 'btn btn-success','onClick'=>'submitForm();','onKeypress'=>'submitForm(); return false;')); ?>
                <?php echo CHtml::ResetButton('Reset', array('class' => 'btn btn-default')); ?>
            </div>
        <!--</div>-->
    </div>                    
</div>                  
<?php $this->endWidget(); ?>

<script type="text/javascript">
    function submitForm(){
            judul = $('#row1').val();
            barcode = $('#row2').val();
            no_isbn = $('#row3').val();
            penyusun = $('#row4').val();  
            kode_rak = $('#row5').val();  
            cover = $('#row6').val();  
            diskon = $('#row7').val();  
            edisi = $('#row8').val();  
            jumlah_stok = $('#row9').val();  
            harga_beli = $('#row10').val();  
            harga_jual = $('#row11').val();  
            penerbit = $('#row12').val();  
            golongan = $('#row13').val();  
            supplier = $('#row14').val();  
            jilid = $('#row15').val();  
            tahun = $('#row16').val();  
                $.ajax({
                   type:'POST',
                   url:'<?php echo $this->createUrl('barang/exportExcel');?>',
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
                       
                   },
                   error:function (jqXHR, textStatus, errorThrown) { console.log(errorThrown); }
                });
    }
    
$(document).ready(function(){
    setTimeout(function(){
        $('#modifTemplate').removeClass('ui-dialog-content');
        $('#modifTemplate').removeClass('ui-widget-content');
    },1000);
});
</script>