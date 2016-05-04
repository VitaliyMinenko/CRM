<?php
/* @var $this CarrierController */
/* @var $model Carrier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>40,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Direcotrs_name'); ?>
		<?php echo $form->textField($model,'Direcotrs_name',array('size'=>40,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>40,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Load_capacity'); ?>
		<?php echo $form->textField($model,'Load_capacity',array('size'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Body'); ?>
		<?php echo $form->textField($model,'Body',array('size'=>40,'maxlength'=>50)); ?>
	</div>
    
                <div class="row">
		<?php echo $form->label($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>40,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Direction'); ?>
		<?php echo $form->textField($model,'Direction',array('size'=>40,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Special_requirements'); ?>
		<?php echo $form->textField($model,'Special_requirements',array('size'=>40,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textField($model,'Comment',array('size'=>40,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'Last_Activity_Date'); ?>
		<?php //echo $form->textField($model,'Last_Activity_Date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->