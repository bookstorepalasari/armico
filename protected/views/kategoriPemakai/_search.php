<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'form-groups-bordered'),
)); ?>

		<?php echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

		<?php echo $form->checkBoxGroup($model,'is_aktif'); ?>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-5">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'label'=>'Search',
			'htmlOptions'=>array('class'=>'btn-primary'),
		)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
