<?php
/* @var $this ShippingController */
/* @var $model Shipping */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrier_name'); ?>
		<?php echo $form->textField($model,'carrier_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'route'); ?>
		<?php echo $form->textField($model,'route',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carriers_id'); ?>
		<?php echo $form->textField($model,'carriers_id',array('size'=>60,'maxlength'=>5000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->