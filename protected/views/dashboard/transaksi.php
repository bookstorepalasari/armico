<?php
$this->breadcrumbs=array(
	'Mkategori Pemakais'=>array('index'),
	'Create',
);
?>

<div class="row">
	<div class="col-md-12">		
		<div class="panel panel-primary" data-collapsed="0">		
			<div class="panel-heading">
				<div class="panel-title">
					Tambah Kategori Pemakai</div>
			</div>			
			<div class="panel-body">				
				<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
					'id'=>'mkategori-pemakai-form',
					'enableAjaxValidation'=>false,
					'type'=>'horizontal',
					'focus' => '#mkategori-pemakai-form div.form-group:first-child div input',
					'htmlOptions'=>array('class'=>'form-groups-bordered','onKeyPress'=>'return disableKeyPress(event);', 'onsubmit'=>'return requiredCheck(this);', 'enctype' => 'multipart/form-data'),
				)); ?>

					<?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

					<?php echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo $form->labelEx($model,'create_time'); ?></label>
						<div class="col-sm-9">
							<?php
								$model->create_time = isset($model->create_time) ? $format->formatDateTimeForUser($model->create_time) : date('d M Y H:i:s');
								$this->widget('DateTimePicker',array(
									'model'=>$model,
									'attribute'=>'create_time',
									'mode'=>'datetime',
									'options'=> array(
										'dateFormat'=>Params::DATE_FORMAT,
									),
									'htmlOptions'=>array(
										'onkeyup'=>"return $(this).focusNextInputField(event)",
										'readonly'=>true,
										'class'=>'span3 realtime form-control',
									),
								));
								$model->create_time = isset($model->create_time) ? $format->formatDateTimeForDb($model->create_time) : "";
							?>
						</div>
					</div>
					<div class="form-group ">
						<?php echo CHtml::label('Barcode', 'barcode', array('class'=>'col-sm-3 control-label')); ?>
						<div class="col-sm-3">
							<?php echo CHtml::hiddenField('id','',array()); ?>
							<?php echo CHtml::hiddenField('barcode','',array()); ?>
						<?php
							$this->widget('JuiAutoComplete', array(
								'name'=>'barcode',
								'id'=>'barcode',
								'source'=>'js: function(request, response) {
									$.ajax({
										url: "'.$this->createUrl('AutocompleteProduct').'",
										dataType: "json",
										data: {
											barcode: request.term,
										},
										success: function (data) {
											 response(data);
										}
									})
								 }',
								 'options'=>array(
									   'showAnim'=>'fold',
									   'minLength' => 2,
									   'focus'=> 'js:function( event, ui ) {
											$(this).val("");
											return false;
										}',
									   'select'=>'js:function( event, ui ) {
											$(this).val(ui.item.value);
											$("#id").val(ui.item.id);
											$("#name").val(ui.item.name);
											$("#barcode").val(ui.item.barcode);
											addProduct(ui.item.id,ui.item.barcode);
											return false;
										}',
								),
								'htmlOptions'=>array(
									'onkeyup'=>"return $(this).focusNextInputField(event)",
									'onblur'=>"if($(this).val()=='') clearFormProduct(); else addProduct('',this.value)",
									'class'=>'span5 form-control',
									'id'=>'barcode',
								),
								'tombolDialog'=>array('idDialog'=>'dialogProduct'),
							));
							?>
						</div>
					</div>
					<?php echo $form->checkBoxGroup($model,'is_aktif'); ?>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-5">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
							'buttonType'=>'submit',
							'label'=>$model->isNewRecord ? 'Create' : 'Save',
							'htmlOptions'=>array('class'=>'btn-success', 'onkeypress'=>'return formSubmit(this,event)',),
						)); ?>
				<?php echo $model->isNewRecord ? '&nbsp;&nbsp;'.CHtml::ResetButton('Reset', array('class' => 'btn btn-default')) : ''; ?><?php echo Chtml::link('Back','', array('class' => 'btn btn-link')); ?>	</div>
				</div>
				<?php $this->endWidget(); ?>

			</div>		
		</div>	
	</div>
</div>
<?php
//========= Dialog buat cari data produk =========================
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'dialogProduct',
    'options'=>array(
        'title'=>'Daftar Produk',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>980,
        'height'=>600,
        'resizable'=>false,
    ),
));

$modProduct = new MBarang('search');
$modProduct->unsetAttributes();
if(isset($_GET['MBarang'])){
    $modProduct->attributes = $_GET['MBarang'];
    $modProduct->name = $_GET['MBarang']['barcode'];
}
$this->widget('booster.widgets.TbGridView',array(
	'id'=>'m-barang-grid',
	'dataProvider'=>$modProduct->search(),
	'filter'=>$modProduct,
        'template'=>"{summary}\n{items}\n{pager}",
        'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'columns'=>array(
		array(
			'header'=>'Pilih',
			'type'=>'raw',
			'value'=>'CHtml::Link("<i class=\"entypo-check\"></i>","#",array("class"=>"btn-small",
						"id" => "selectProduct",
						"onClick" => "
							$(\'#id\').val($data->id);
							$(\'#barcode\').val(\'$data->barcode\');
							addProduct($data->id,\'$data->barcode\');
							return false;"
							))',
		),
		'barcode',
	),
        'afterAjaxUpdate'=>'function(id, data){jQuery(\''.Params::TOOLTIP_SELECTOR.'\').tooltip({"placement":"'.Params::TOOLTIP_PLACEMENT.'"});}',
));

$this->endWidget();
?>
<?php echo $this->renderPartial('_jsFunctions', array('model'=>$model)); ?>