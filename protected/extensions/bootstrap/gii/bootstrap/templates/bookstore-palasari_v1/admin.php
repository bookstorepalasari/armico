<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
    echo "<?php\n";
    $label = $this->pluralize($this->class2name($this->modelClass));
    echo "\$this->breadcrumbs=array(
            '$label'=>array('index'),
            'Manage',
    );\n";
?>

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('#pencarian').submit(function(){
        $.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h2>Master <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h2>

<?php echo "<?php if(Yii::app()->user->hasFlash('success')) { ?>"; ?>
<?php echo "<div class=\"alert alert-success alert-dismissible\">
		<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
		<i class=\"icon fa fa-check\"></i> Sukses! <?php echo Yii::app()->user->getFlash('success'); ?>
	</div>";?>
<?php echo "<?php } ?>"; ?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Pencarian
				</div>
			</div>			
			<div class="panel-body">				
				<?php echo "<?php \$this->renderPartial('_search',array('model'=>\$model,)); ?>\n"; ?>
			</div>		
		</div>	
	</div>

	<div class="col-md-12">
		<?php echo "<?php echo Chtml::link('<i class=\"entypo-plus\"></i> Tambah',\$this->createUrl('/" . $this->controller . "/create'), array('class'=>'btn btn-flat btn-block btn-primary', 'style' => 'width: 100px')); ?>"; ?>
		<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
			'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
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
				<?php
					$count = 0;
					foreach ($this->tableSchema->columns as $column) {
						if (++$count == 7) {
							echo "\t\t/*\n";
						}
						echo "\t\t'" . $column->name . "',\n";
					}
					if ($count >= 7) {
						echo "\t\t*/\n";
					}
				?>
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
							'url'=>'Yii::app()->createUrl("/'.Yii::app()->controller->id.'/delete",array("id"=>$data-><?php echo $this->tableSchema->primaryKey; ?>))',								
						),
					)
				),
			),
		)); ?>
	</div>
</div>