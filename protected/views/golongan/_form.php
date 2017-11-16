<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mgolongan-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#mgolongan-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered','onKeyPress'=>'return disableKeyPress(event);', 'onsubmit'=>'return requiredCheck(this);', 'enctype' => 'multipart/form-data'),
)); ?>
<div class="row">
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'golongan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>

<div class="row">
    <div style="text-align: center; margin-top:30px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'label'=>$model->isNewRecord ? 'Create' : 'Save',
                        'htmlOptions'=>array('class'=>'btn-success', 'onkeypress'=>'return formSubmit(this,event)',),
                )); ?>
        <?php echo $model->isNewRecord ? '&nbsp;&nbsp;'.CHtml::ResetButton('Reset', array('class' => 'btn btn-default')) : ''; ?><?php echo Chtml::link('Back',$this->createUrl('/golongan/admin'), array('class' => 'btn btn-link')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>