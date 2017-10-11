<?php
/* @var $this PelangganController */
/* @var $model MPelanggan */

$this->breadcrumbs=array(
	'Mpelanggans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MPelanggan', 'url'=>array('index')),
	array('label'=>'Create MPelanggan', 'url'=>array('create')),
	array('label'=>'Update MPelanggan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MPelanggan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MPelanggan', 'url'=>array('admin')),
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
		'alamat',
		'telepon',
		'keterangan',
		'rating_transaksi',
		'rating_akumulasi',
		'create_time',
		'update_time',
		'create_login',
		'update_login',
	),
)); ?>
