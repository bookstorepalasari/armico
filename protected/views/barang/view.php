<?php
/* @var $this BarangController */
/* @var $model MBarang */

$this->breadcrumbs=array(
	'Mbarangs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MBarang', 'url'=>array('index')),
	array('label'=>'Create MBarang', 'url'=>array('create')),
	array('label'=>'Update MBarang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MBarang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MBarang', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'barcode',
                'no_isbn',
                'judul',
                'penyusun',
                'jumlah_stok',
                array(
                    'name'=>'penerbit_id',
                    'type'=>'raw',
                    'value'=>$model->penerbit->penerbit
                ),
                array(
                    'name'=>'golongan_id',
                    'type'=>'raw',
                    'value'=>isset($model->golongan_id)?$model->golongan->golongan:""
                ),
                'kode_rak',
                'edisi',
                'jilid',
                'tahun',
                'cover',
		'create_time',
		'update_time',
		'create_login',
		'update_login',
	),
)); ?>
