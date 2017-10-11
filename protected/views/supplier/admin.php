<?php
$this->breadcrumbs=array(
            'MSupplier'=>array('index'),
            'Manage',
    );

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('#pencarian').submit(function(){
        $.fn.yiiGridView.update('msupplier-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<!--<h2>Master Supplier</h2>-->

<?php if(Yii::app()->user->hasFlash('success')) { ?><div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-check"></i> Sukses! <?php echo Yii::app()->user->getFlash('success'); ?>
	</div><?php } ?>
<div class="row">
    <?php $this->renderPartial('_search',array('model'=>$model,'search'=>$search,'style'=>'float:right;')); ?>
<div class="col-md-4">
    <?php echo Chtml::link('<i class="entypo-plus"></i> Tambah',$this->createUrl('/supplier/create'), array('class'=>'btn btn-flat btn-block btn-primary', 'style' => 'width: 100px; float:left;')); ?>
</div>    
	<div class="col-md-12">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'msupplier-grid',
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
                                /*
                                'id',
                                 */
                                'kode',
                                'nama',
                                'rekening',
                                'email',
                                'telepon',
                                'alamat',
                                'kontak',
                                'keterangan',
				array(
					'header'=>Yii::t('zii','View'),
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{view}',
					'buttons'=>array(
						'view' => array(),
					),
				),
				array(
					'header'=>Yii::t('zii','Update'),
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{update}',
					'buttons'=>array(
							'update' => array(),
					),
				),
				array(
					'header'=>Yii::t('zii','Delete'),
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{delete}',
					'buttons'=>array(
						'delete'=> array(
							'url'=>'Yii::app()->createUrl("/'.Yii::app()->controller->id.'/delete",array("id"=>$data->id))',								
						),
					)
				),
			),
		)); ?>
	</div>
</div>