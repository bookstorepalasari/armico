<?php
/* @var $this PelangganController */
/* @var $model MPelanggan */

$this->breadcrumbs=array(
	'Mpelanggans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MPelanggan', 'url'=>array('index')),
	array('label'=>'Create MPelanggan', 'url'=>array('create')),
	array('label'=>'View MPelanggan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MPelanggan', 'url'=>array('admin')),
);
?>

<!--<h1>Update MPelanggan <?php echo $model->id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>