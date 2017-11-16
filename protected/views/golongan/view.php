<?php
/* @var $this BarangController */
/* @var $model Golongan */

$this->breadcrumbs=array(
	'Mgolongans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Golongan', 'url'=>array('index')),
	array('label'=>'Create Golongan', 'url'=>array('create')),
	array('label'=>'Update Golongan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Golongan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Golongan', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'golongan',
	),
)); ?>
