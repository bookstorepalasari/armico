<?php
$this->breadcrumbs=array(
	'Mkategori Pemakais'=>array('index'),
	$model->id,
);
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Lihat Kategori Pemakai #<?php echo $model->id; ?></div>
			</div>			
			<div class="panel-body">				
				<?php $this->widget('booster.widgets.TbDetailView',array(
					'data'=>$model,
					'attributes'=>array(
								'id',
		'nama',
		'keterangan',
		'create_time',
		'update_time',
		'create_login',
		'update_login',
		'is_aktif',
					),
				)); ?>
				<br>
				<?php echo CHtml::link(Yii::t('mds','{icon} Kembali',array('{icon}'=>'<i class="fa fa-gear"></i>')),$this->createUrl('admin',array()), array('class'=>'btn btn-flat btn-block btn-danger', 'style' => 'width: 100px')); ?>
			</div>		
		</div>	
	</div>
</div>