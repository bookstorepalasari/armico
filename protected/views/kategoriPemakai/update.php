<?php
$this->breadcrumbs=array(
	'Mkategori Pemakais'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Ubah Kategori Pemakai #<?php echo $model->id; ?></div>
			</div>			
			<div class="panel-body">				
				<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
			</div>		
		</div>	
	</div>
</div>