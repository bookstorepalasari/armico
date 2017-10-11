<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'id'=>'pencarian',
	'htmlOptions'=>array('class'=>'form-groups-bordered'),
)); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
	<?php
	$field = $this->generateInputField($this->modelClass, $column);
	if (strpos($field, 'password') !== false) {
		continue;
	}
	?>
	<?php echo "<?php echo " . $this->generateActiveGroup($this->modelClass, $column) . "; ?>\n"; ?>

<?php endforeach; ?>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-5">
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'label'=>'Search',
			'htmlOptions'=>array('class'=>'btn-primary'),
		)); ?>\n"; ?>
		</div>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>