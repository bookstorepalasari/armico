<?php
/* @var $this PenerbitController */
/* @var $model MPenerbit */

$this->breadcrumbs=array(
	'Mpenerbits'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Penerbit', 'url'=>array('index')),
	array('label'=>'Create Penerbit', 'url'=>array('create')),
	array('label'=>'View Penerbit', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Penerbit', 'url'=>array('admin')),
);
?>

<!--<h1>Update Penerbit <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>