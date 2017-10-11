<?php
/* @var $this PelangganController */
/* @var $model MPelanggan */

$this->breadcrumbs=array(
	'Mpelanggans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MPelanggan', 'url'=>array('index')),
	array('label'=>'Manage MPelanggan', 'url'=>array('admin')),
);
?>

<!--<h1>Create MPelanggan</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>