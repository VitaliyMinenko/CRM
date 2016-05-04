<?php
/* @var $this ShippingController */
/* @var $model Shipping */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipping-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'carrier_name'); ?>
		<?php // echo $form->textField($model,'carrier_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'carrier_name'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'route'); ?>
		<?php echo $form->textField($model,'route',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'route'); ?>
	</div>

<!--	<div class="row">
		<?php// echo $form->labelEx($model,'carriers_id'); ?>
		<?php //echo $form->textField($model,'carriers_id',array('size'=>60,'maxlength'=>5000)); ?>
		<?php //echo $form->error($model,'carriers_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->