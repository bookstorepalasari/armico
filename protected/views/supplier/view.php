<?php
/* @var $this SupplierController */
/* @var $model MSupplier */

$this->breadcrumbs=array(
	'Msuppliers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MSupplier', 'url'=>array('index')),
	array('label'=>'Create MSupplier', 'url'=>array('create')),
	array('label'=>'Update MSupplier', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MSupplier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MSupplier', 'url'=>array('admin')),
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
