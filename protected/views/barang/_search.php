<?php
/* @var $this BarangController */
/* @var $model MBarang */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); 
?>
		<?php echo CHtml::submitButton('Search',array('style'=>'float:right;margin-right:15px;')); ?>
		<?php echo $form->textField($model,'global_search',array('onKeyUp'=>'search(this)','value'=>$search,'class'=>'form-control','style'=>'width:70%; margin-right:10px;')); ?>
<div style="float:right; position: relative; margin-right:-300px; margin-top: 8px; display: none;" onclick="clearSearch();" id="icon_search"><i class="entypo-cancel-squared" style=" cursor:pointer;"></i></div> 
<?php $this->endWidget(); ?>

<!--</div> search-form -->
<script type="text/javascript">
    function search(obj){
        if(obj.value.length > 0){
            $("#icon_search").attr('style','float:right; position: relative; margin-right:-300px; margin-top: 8px; display:block;');
        }else{
            $("#icon_search").attr('style','display:none;');
        }
    }
    
    function clearSearch(){
        $('#MBarang_global_search').val('');
        $("#icon_search").attr('style','display:none;');
        setTimeout(function(){
            $('#search').submit();
        },300);
    }   
    
$(document).ready(function(){
     var search = $('#MBarang_global_search').val();
     if(search !== ''){
        $("#icon_search").attr('style','float:right; position: relative; margin-right:-300px; margin-top: 8px; display:block;');
    }else{
        $("#icon_search").attr('style','display:none;');
    }
});
</script>