<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'focus'=>'#'.CHtml::activeId($model, 'username'),
)); ?>

<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">
			<i class="entypo-user"></i>
		</div>
		<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username', 'autocomplete'=>'off')); ?>
	</div>	
</div>

<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">
			<i class="entypo-key"></i>
		</div>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password', 'autocomplete'=>'off')); ?>
	</div>
</div>
<div class="form-group">
	<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary btn-block btn-login')); ?>
</div>
<?php $this->endWidget(); ?>
</div>