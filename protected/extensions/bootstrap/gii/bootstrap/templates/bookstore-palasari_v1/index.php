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
	'$label',
);\n";
?>
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Index Master <?php echo $this->modelClass; ?>
				</div>
			</div>			
			<div class="panel-body">				
				<?php echo "<?php"; ?> $this->widget('booster.widgets.TbListView',array(
					'dataProvider'=>$dataProvider,
					'itemView'=>'_view',
				)); ?>
				<br>
				<?php echo "<?php echo CHtml::link(Yii::t('mds','{icon} Pengaturan ".$this->modelClass."',array('{icon}'=>'<i class=\"fa fa-gear\"></i>')),\$this->createUrl('admin',array()), array('class'=>'btn btn-flat btn-block btn-danger', 'style' => 'width: 100px')); ?>\n"; ?>
			</div>		
		</div>	
	</div>
</div>