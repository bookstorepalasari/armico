<?php
/* @var $this PenerbitController */
/* @var $model Penerbit */

$this->breadcrumbs=array(
	'Mpenerbits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Penerbit', 'url'=>array('index')),
	array('label'=>'Create Penerbit', 'url'=>array('create')),
	array('label'=>'Update Penerbit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Penerbit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penerbit', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'penerbit',
	),
)); ?>
