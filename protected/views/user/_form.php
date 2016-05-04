<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>25,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>25,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_date'); ?>
		<?php echo $form->textField($model,'registration_date',array('size'=>25,'maxlength'=>25,'value'=>date("Y-m-d"),'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'registration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->dropDownList($model,'role',array(1=>'Sales Manager',3=>'Logist Manager',2=>'Administrator')); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
      		       <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker',
                        array(
                                'name'=>'User[date_of_birth]',
                                'value' =>strval (date("Y-m-d", strtotime("-1 day"))),
                                'language' => 'ru',
                                'options' => array(
                                        'dateFormat'=>'yy-mm-dd',
                                        'yearRange'=>'-100:+100',
                                        'changeMonth' => 'true',
                                        'changeYear' => 'true',
                                        'showButtonPanel' => 'true',
                                        'constrainInput' => 'false',
                                        'duration'=>'fast',
                                        'showAnim' =>'slide',
                                ),
                                'htmlOptions'=>array(
                                'style'=>'',
                              
                                )
                        )
                );            
            ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deleted'); ?>
		<?php echo $form->dropDownList($model,'deleted',array(0=>'no',1=>'yes')); ?>
		<?php echo $form->error($model,'deleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->