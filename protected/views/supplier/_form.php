<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'msupplier-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#msupplier-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered','onKeyPress'=>'return disableKeyPress(event);', 'onsubmit'=>'return requiredCheck(this);', 'enctype' => 'multipart/form-data'),
)); ?>
<div class="row">
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 email','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'kode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'rekening',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'telepon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','maxlength'=>50)))); ?>
	<?php echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span5')))); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->textFieldGroup($model,'kontak',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 numbers-only','maxlength'=>50)))); ?>
    </div>
    <div class="col-md-6">
	<?php echo $form->textAreaGroup($model,'alamat', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span5','maxlength'=>100)))); ?>
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
            <?php echo $model->isNewRecord ? '&nbsp;&nbsp;'.CHtml::ResetButton('Reset', array('class' => 'btn btn-default')) : ''; ?><?php echo Chtml::link('Back',$this->createUrl('/supplier/admin'), array('class' => 'btn btn-link')); ?>
        </div>
    <!--</div>-->
</div>
<?php $this->endWidget(); ?>