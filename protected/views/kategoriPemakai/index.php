<?php
$this->breadcrumbs=array(
	'Mkategori Pemakais',
);
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Index Master Kategori Pemakai</div>
			</div>			
			<div class="panel-body">				
				<?php $this->widget('booster.widgets.TbListView',array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
				)); ?>
				<br>
				<?php echo CHtml::link(Yii::t('mds','{icon} Pengaturan MKategoriPemakai',array('{icon}'=>'<i class="fa fa-gear"></i>')),$this->createUrl('admin',array()), array('class'=>'btn btn-flat btn-block btn-danger', 'style' => 'width: 100px')); ?>
			</div>		
		</div>	
	</div>
</div>