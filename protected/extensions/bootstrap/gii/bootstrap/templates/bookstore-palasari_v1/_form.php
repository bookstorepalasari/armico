<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'focus' => '#" . $this->class2id($this->modelClass) . "-form div.form-group:first-child div input',
	'htmlOptions'=>array('class'=>'form-groups-bordered','onKeyPress'=>'return disableKeyPress(event);', 'onsubmit'=>'return requiredCheck(this);', 'enctype' => 'multipart/form-data'),
)); ?>\n"; ?>

<?php
foreach ($this->tableSchema->columns as $column) {
	if ($column->autoIncrement) {
		continue;
	}
	?>
	<?php echo "<?php echo " . $this->generateActiveGroup($this->modelClass, $column) . "; ?>\n"; ?>

<?php
}
?>
<div class="form-group">
	<div class="col-sm-offset-3 col-sm-5">
	<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>\$model->isNewRecord ? 'Create' : 'Save',
			'htmlOptions'=>array('class'=>'btn-success', 'onkeypress'=>'return formSubmit(this,event)',),
		)); ?>\n"; 
		echo "<?php echo \$model->isNewRecord ? '&nbsp;&nbsp;'.CHtml::ResetButton('Reset', array('class' => 'btn btn-default')) : ''; ?>";
		echo "<?php echo Chtml::link('Back',\$this->createUrl('/" . $this->controller . "/admin'), array('class' => 'btn btn-link')); ?>";
	?>
	</div>
</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>