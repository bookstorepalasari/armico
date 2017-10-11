<?php
/* @var $this BarangController */
/* @var $model MBarang */

$this->breadcrumbs=array(
	'Mbarangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MBarang', 'url'=>array('index')),
	array('label'=>'Manage MBarang', 'url'=>array('admin')),
);
?>

<!--<h1>Create MBarang</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>