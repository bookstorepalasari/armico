<?php
/* @var $this SalesController */
/* @var $model MSales */

$this->breadcrumbs=array(
	'Msaless'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MSales', 'url'=>array('index')),
	array('label'=>'Create MSales', 'url'=>array('create')),
	array('label'=>'Update MSales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MSales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MSales', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                /*
		'id',
                */
		'kode',
		'nama',
		'rekening',
		'email',
		'kontak',
		'telepon',
		'alamat',
		'keterangan',
		'create_time',
		'update_time',
		'create_login',
		'update_login',
	),
)); ?>
