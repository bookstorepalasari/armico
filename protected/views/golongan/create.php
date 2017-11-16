<?php
/* @var $this BarangController */
/* @var $model MBarang */

$this->breadcrumbs=array(
	'Mgolongans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Golongan', 'url'=>array('index')),
	array('label'=>'Manage Golongan', 'url'=>array('admin')),
);
?>

<!--<h1>Create MBarang</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>