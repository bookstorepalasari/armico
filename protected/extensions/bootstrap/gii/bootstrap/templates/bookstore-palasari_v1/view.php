<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Lihat <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>
				</div>
			</div>			
			<div class="panel-body">				
				<?php echo "<?php"; ?> $this->widget('booster.widgets.TbDetailView',array(
					'data'=>$model,
					'attributes'=>array(
						<?php
						foreach ($this->tableSchema->columns as $column) {
								echo "\t\t'" . $column->name . "',\n";
						}
						?>
					),
				)); ?>
				<br>
				<?php echo "<?php echo CHtml::link(Yii::t('mds','{icon} Kembali',array('{icon}'=>'<i class=\"fa fa-gear\"></i>')),\$this->createUrl('admin',array()), array('class'=>'btn btn-flat btn-block btn-danger', 'style' => 'width: 100px')); ?>\n"; ?>
			</div>		
		</div>	
	</div>
</div>