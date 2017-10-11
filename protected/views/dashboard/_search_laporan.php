<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'horizontal',
	'id'=>'pencarian',
	'htmlOptions'=>array('class'=>'form'),
)); ?>

    <div class="row-fluid">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'tgl_awal', array('class'=>'col-sm-3 control-label')) ?>
                <div class="col-md-6">
                    <?php
                        $model->tgl_awal = isset($model->tgl_awal) ? $format->formatDateTimeForUser($model->tgl_awal) : date('d M Y');
                        $this->widget('DateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'tgl_awal',
                            'mode'=>'date',
                            'options'=> array(
                                'dateFormat'=>Params::DATE_FORMAT,
                            ),
                            'htmlOptions'=>array(
                                'onkeyup'=>"return $(this).focusNextInputField(event)",
                                'readonly'=>false,
                                'class'=>'span3 form-control',
                            ),
                        ));
                        $model->tgl_awal = isset($model->tgl_awal) ? $format->formatDateTimeForDb($model->tgl_awal) : "";
                    ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo CHtml::activeLabel($model,'kode',array('class'=>'col-sm-3  control-label')); ?>
                <div class="col-md-6">
                    <?php echo CHtml::activeTextField($model,'kode',array('class'=>'span5 form-control','maxlength'=>50)); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo $form->labelEx($model,'tgl_akhir', array('class'=>'col-sm-3 control-label')) ?>
                <div class="col-md-6">
                    <?php
                        $model->tgl_akhir = isset($model->tgl_akhir) ? $format->formatDateTimeForUser($model->tgl_akhir) : date('d M Y');
                        $this->widget('DateTimePicker',array(
                            'model'=>$model,
                            'attribute'=>'tgl_akhir',
                            'mode'=>'date',
                            'options'=> array(
                                'dateFormat'=>Params::DATE_FORMAT,
                            ),
                            'htmlOptions'=>array(
                                'onkeyup'=>"return $(this).focusNextInputField(event)",
                                'readonly'=>false,
                                'class'=>'span3 form-control',
                            ),
                        ));
                        $model->tgl_akhir = isset($model->tgl_akhir) ? $format->formatDateTimeForDb($model->tgl_akhir) : "";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context'=>'primary',
                    'label'=>'Cari',
                ));
            ?>
        </div>
    </div>

<?php $this->endWidget(); ?>
