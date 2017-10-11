<?php
/* @var $this SalesController */
/* @var $model MSales */

$this->breadcrumbs=array(
	'Msaless'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MSales', 'url'=>array('index')),
	array('label'=>'Manage MSales', 'url'=>array('admin')),
);
?>

<!--<h1>Create MSales</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>