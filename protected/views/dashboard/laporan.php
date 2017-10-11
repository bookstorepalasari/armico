<?php
$this->breadcrumbs=array(
            'Mkategori Pemakais'=>array('index'),
            'Manage',
    );

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('#pencarian').submit(function(){
        $.fn.yiiGridView.update('mkategori-pemakai-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h2>Laporan Barang</h2>

<?php if(Yii::app()->user->hasFlash('success')) { ?><div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-check"></i> Sukses! <?php echo Yii::app()->user->getFlash('success'); ?>
	</div><?php } ?>
<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Pencarian
				</div>
			</div>			
			<div class="panel-body">				
				<?php $this->renderPartial('_search_laporan',array('model'=>$model,'format'=>$format)); ?>
			</div>		
		</div>	
	</div>

	<div class="col-md-12">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'mkategori-pemakai-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'template'=>"{summary}\n{items}\n{pager}",
			'itemsCssClass'=>'table table-bordered datatable',
			'columns'=>array(
				array(
					'header'=>'No.',
					'value' => '($this->grid->dataProvider->pagination) ? 
									($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1)
									: ($row+1)',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'text-align:right;'),
				),
				'id',
				'barcode',
			),
		)); ?>
	</div>
	<br>
	<div class="col-md-12">
		<?php echo CHtml::htmlButton(Yii::t('mds','{icon} Print',array('{icon}'=>'<i class="entypo-print"></i>')),array('class'=>'btn btn-info', 'type'=>'button','onclick'=>'print(\'PRINT\')'))."&nbsp&nbsp"; ?>
		<?php echo CHtml::htmlButton(Yii::t('mds','{icon} PDF',array('{icon}'=>'<i class="entypo-docs"></i>')),array('class'=>'btn btn-danger', 'type'=>'button','onclick'=>'print(\'PDF\')'))."&nbsp&nbsp"; ?>
		<?php echo CHtml::htmlButton(Yii::t('mds','{icon} Excel',array('{icon}'=>'<i class="entypo-list"></i>')),array('class'=>'btn btn-success', 'type'=>'button','onclick'=>'print(\'EXCEL\')'))."&nbsp&nbsp"; ?>
	</div>
</div>
<?php echo $this->renderPartial('_jsFunctions_report', array('model'=>$model)); ?>