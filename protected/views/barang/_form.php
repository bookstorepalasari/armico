<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mbarang-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#mbarang-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered','onKeyPress'=>'return disableKeyPress(event);', 'onsubmit'=>'return requiredCheck(this);', 'enctype' => 'multipart/form-data'),
)); 
if($model->hasErrors()){
  echo CHtml::errorSummary($model);
}
?>

<div class="row">
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'barcode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'no_isbn',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textAreaGroup($model,'judul', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span5')))); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'penyusun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->dropDownListGroup($model,'penerbit_id', array(
            'widgetOptions'=>array(
                'data'=>CHtml::listData(MPenerbit::model()->findAll(), 'id', 'penerbit'),
                'htmlOptions'=>array(
                        'empty'=>'--- Pilih ---',
                        'style'=>'width:300px;'
                        ),
                )
            )); ?>
        <button class="btn btn-info" type="button" style="float: right; margin-top:-45px;" onclick="addPenerbit();"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'edisi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->dropDownListGroup($model,'golongan_id', array(
            'widgetOptions'=>array(
                'data'=>CHtml::listData(MGolongan::model()->findAll(), 'id', 'golongan'),
                'htmlOptions'=>array(
                        'empty'=>'--- Pilih ---',
                        'style'=>'width:300px;'
                        ),
                )
            )); ?>
        <button class="btn btn-info" type="button" style="float: right; margin-top:-45px;" onclick="addGolongan();"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'jilid',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','maxlength'=>50)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'kode_rak',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','maxlength'=>50)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'harga_jual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 integer','maxlength'=>50)))); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->dropDownListGroup($model,'supplier_id', array(
            'widgetOptions'=>array(
                'data'=>CHtml::listData(MSupplier::model()->findAll(), 'id', 'nama'),
                'htmlOptions'=>array(
                        'empty'=>'--- Pilih ---',
                        ),
                )
            )); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'harga_beli',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 integer','maxlength'=>50)))); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->dropDownListGroup($model,'cover', array(
            'widgetOptions'=>array(
                'data'=>array('SOFT COVER'=>'SOFT COVER','HARD COVER'=>'HARD COVER'),
                'htmlOptions'=>array(
                        'empty'=>'--- Pilih ---',
                        'style'=>'width:150px;'
//                        'ajax'=>array(
//                                'type'=>'POST',
//                                'url'=> Yii::app()->createUrl('/barang/contoh'),
//                                'update'=>'#contoh_id',
//                            )
                        ),
                )
            )); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'diskon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 float','maxlength'=>50,'style'=>'width:100px;')))); ?> 
        <span style="margin-top:-40px;margin-left:230px;position: absolute; ">%</span>
    </div>
</div>

<div class="row">
    <!--<div class="form-group">-->
        <div style="text-align: center; margin-top:30px;">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'label'=>$model->isNewRecord ? 'Create' : 'Save',
                            'htmlOptions'=>array('class'=>'btn-success', 'onkeypress'=>'return formSubmit(this,event)',),
                    )); ?>
            <?php echo $model->isNewRecord ? '&nbsp;&nbsp;'.CHtml::ResetButton('Reset', array('class' => 'btn btn-default')) : ''; ?><?php echo Chtml::link('Back',$this->createUrl('/barang/admin'), array('class' => 'btn btn-link')); ?>
        </div>
    <!--</div>-->
</div>
<?php $this->endWidget(); ?>