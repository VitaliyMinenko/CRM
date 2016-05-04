<?php
/* @var $this CarrierController */
/* @var $model Carrier */
/* @var $form CActiveForm */
?>
<?php
$body = array(1 => 'тент',
    2 => 'реф',
    3 => 'изотерм',
    4 => 'цельномет',
    5 => 'бус',
    6 => 'зерновоз',
    7 => 'контейнер',
    8 => 'лесовоз',
    9 => 'негабарит',
    10 => 'открытая',
    11 => 'самосвал',
    12 => 'трал',
    13 => 'цистерна',
    14 => 'цементовоз',);
?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'carrier-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'City'); ?>
        <?php echo $form->textField($model, 'City', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'City'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Direcotrs_name'); ?>
        <?php echo $form->textField($model, 'Direcotrs_name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'Direcotrs_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Phone'); ?>
        <?php echo $form->textField($model, 'Phone', array('size' => 60, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'Phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Load_capacity'); ?>
        <?php echo $form->textField($model, 'Load_capacity', array('size' => 60)); ?>
        <?php echo $form->error($model, 'Load_capacity'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'volume'); ?>
        <?php echo $form->textField($model, 'volume', array('size' => 60)); ?>
        <?php echo $form->error($model, 'volume'); ?>
    </div>

    
    <?php echo $form->labelEx($model,'Direction'); ?>
    <?php echo $form->textField($model,'Direction',array('size'=>60));  ?>
    <?php echo $form->error($model,'Direction');  ?>
           

    <div class="row">
        <?php echo $form->labelEx($model, 'Special_requirements'); ?>
        <?php echo $form->textField($model, 'Special_requirements', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'Special_requirements'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Comment'); ?>
        <?php echo $form->textField($model, 'Comment', array('size' => 60, 'maxlength' => 1000)); ?>
        <?php echo $form->error($model, 'Comment'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'Body'); ?>
        <?php echo $form->textField($model, 'Body', array('size' => 60, 'maxlength' => 1000)); ?>
        <?php echo $form->error($model, 'Body'); ?>
    </div>

    <div class="row" style="display: none">
        <?php echo $form->labelEx($model, 'Last_Activity_Date'); ?>
        <?php echo $form->textField($model, 'Last_Activity_Date', array('value' => date('Y-m-d'),'size' => 60)); ?>
        <?php echo $form->error($model, 'Last_Activity_Date'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->