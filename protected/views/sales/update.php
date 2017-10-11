<?php
/* @var $this SalesController */
/* @var $model MSales */

$this->breadcrumbs=array(
	'Msaless'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MSales', 'url'=>array('index')),
	array('label'=>'Create MSales', 'url'=>array('create')),
	array('label'=>'View MSales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MSales', 'url'=>array('admin')),
);
?>

<!--<h1>Update MSales <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>