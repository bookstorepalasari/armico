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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Ubah <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>
				</div>
			</div>			
			<div class="panel-body">				
				<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>\n"; ?>
			</div>		
		</div>	
	</div>
</div>