<?php
/* @var $this SupplierController */
/* @var $model MSupplier */

$this->breadcrumbs=array(
	'Msuppliers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MSupplier', 'url'=>array('index')),
	array('label'=>'Create MSupplier', 'url'=>array('create')),
	array('label'=>'View MSupplier', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MSupplier', 'url'=>array('admin')),
);
?>

<!--<h1>Update MSupplier <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>