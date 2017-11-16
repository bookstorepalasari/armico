<?php
/* @var $this BarangController */
/* @var $model MBarang */

$this->breadcrumbs=array(
	'Mgolongans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Golongan', 'url'=>array('index')),
	array('label'=>'Create Golongan', 'url'=>array('create')),
	array('label'=>'View Golongan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Golongan', 'url'=>array('admin')),
);
?>

<!--<h1>Update Golongan <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>