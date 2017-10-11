<?php
/* @var $this BarangController */
/* @var $model MBarang */

$this->breadcrumbs=array(
	'Mbarangs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MBarang', 'url'=>array('index')),
	array('label'=>'Create MBarang', 'url'=>array('create')),
	array('label'=>'View MBarang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MBarang', 'url'=>array('admin')),
);
?>

<!--<h1>Update MBarang <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>