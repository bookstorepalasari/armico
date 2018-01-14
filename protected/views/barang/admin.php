<?php
$this->breadcrumbs=array(
            'MBarang'=>array('index'),
            'Manage',
    );

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('#pencarian').submit(function(){
        $.fn.yiiGridView.update('mbarang-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<!--<h2>Master Barang</h2>-->

<?php if(Yii::app()->user->hasFlash('success')) { ?>
<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i> Sukses! <?php echo Yii::app()->user->getFlash('success'); ?>
</div><?php } ?>
<div class="row">
    <div class="col-md-5" style="float:right;">
        <?php $this->renderPartial('_search',array('model'=>$model,'search'=>$search)); ?>
    </div>
    <div class="col-md-7">
        <?php echo Chtml::link('<i class="entypo-plus"></i> Tambah',$this->createUrl('/barang/create'), array('class'=>'btn btn-flat btn-block btn-primary', 'style' => 'width: 100px; float:left;')); ?>
        <?php echo Chtml::link('<i class="glyphicon glyphicon-import"></i> Import Excel',$this->createUrl('/barang/ImportExcel'), array('class'=>'btn btn-green disabled','type'=>'button', 'style' => 'width: 120px; margin-left:10px;')); ?>
        <?php echo Chtml::link('<i class="glyphicon glyphicon-export"></i> Export Excel','#', array('class'=>'btn btn-blue','type'=>'button', 'style' => 'width: 120px; margin-left:10px;', 'onclick'=>'$("#modifTemplate").dialog("open");')); ?>
        <?php echo Chtml::link('<i class="glyphicon glyphicon-barcode"></i> Cetak Barcode Baru','#', array('class'=>'btn btn-default','type'=>'button', 'style' => 'width: 160px; margin-left:10px;','onclick'=>'$("#scanBarcode").dialog("open"); resetInput();')); ?>
    </div> 
</div>
<div class="row">
	<div class="col-md-12">
		<?php $this->widget('booster.widgets.TbGridView',array(
			'id'=>'mbarang-grid',
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
                                'barcode',
                                'no_isbn',
                                'judul',
                                'penyusun',
                                'jumlah_stok',
                                'penerbit_id',
                                'golongan_id',
                                'kode_rak',
                                'edisi',
                                'jilid',
                                'tahun',
                                'cover',
                            /*
                                'harga_beli',
                                'harga_jual',
                                'supplier_id',
                             */
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
<div style="display: none;">
<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'scanBarcode',
                'options'=>array(
                    'title'=>Yii::t('job','Scan Barcode'),
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
 
echo $this->renderPartial('scan_barcode', array('model'=>$modBarcode));
 
 $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'modifTemplate',
                'options'=>array(
                    'title'=>Yii::t('job','Modify Template'),
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'80%',
                    'height'=>'auto',
                ),
                ));
 
echo $this->renderPartial('modify_template', array('model'=>$modTemplate));
 
 $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div>
<script type="text/javascript">
    function resetInput(){
            $('#HistoryBarcode_barcode').focus();
            $('#HistoryBarcode_no_isbn').val('');
            $('#HistoryBarcode_barcode').val('');
            $('#HistoryBarcode_judul_buku').val('');
            $('#HistoryBarcode_panjang').val('');
            $('#HistoryBarcode_penerbit_id').val('');
            $('#HistoryBarcode_lebar').val('');
            $('#HistoryBarcode_harga_jual').val('');
            $('#HistoryBarcode_tahun').val('');
            $('#HistoryBarcode_edisi').val('');
            $('.message-required').css('display','none');
    }
</script>