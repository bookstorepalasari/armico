<?php
/* @var $this SupplierController */
/* @var $model MSupplier */

$this->breadcrumbs=array(
	'Msuppliers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MSupplier', 'url'=>array('index')),
	array('label'=>'Manage MSupplier', 'url'=>array('admin')),
);
?>

<!--<h1>Create MSupplier</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>