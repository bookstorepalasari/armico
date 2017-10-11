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
	'Create',
);\n";
?>
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Tambah <?php echo $this->modelClass; ?>
				</div>
			</div>			
			<div class="panel-body">				
				<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>\n"; ?>
			</div>		
		</div>	
	</div>
</div>