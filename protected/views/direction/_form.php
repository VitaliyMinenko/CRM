<?php
/* @var $this DirectionController */
/* @var $model Direction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'direction-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id'); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrier_id'); ?>
		<?php echo $form->textField($model,'carrier_id',array('size'=>60)); ?>
		<?php echo $form->error($model,'carrier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipping_id'); ?>
		<?php echo $form->textField($model,'shipping_id',array('size'=>60)); ?>
		<?php echo $form->error($model,'shipping_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client'); ?>
		<?php echo $form->textField($model,'client',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrier'); ?>
		<?php echo $form->textField($model,'carrier',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'carrier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Shipping'); ?>
		<?php echo $form->textField($model,'Shipping',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Shipping'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>60)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('size'=>60)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'manager_id'); ?>
		<?php echo $form->textField($model,'manager_id',array('size'=>60)); ?>
		<?php echo $form->error($model,'manager_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->