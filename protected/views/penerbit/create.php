<?php
/* @var $this PenerbitController */
/* @var $model MPenerbit */

$this->breadcrumbs=array(
	'Mpenerbits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Penerbit', 'url'=>array('index')),
	array('label'=>'Manage Penerbit', 'url'=>array('admin')),
);
?>

<!--<h1>Create MPenerbit</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>