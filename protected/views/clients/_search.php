<?php
/* @var $this ClientsController */
/* @var $model Clients */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
<?php //echo $form->label($model,'id');  ?>
<?php //echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20));  ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'Company_name'); ?>
<?php echo $form->textField($model, 'Company_name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'Contact_person'); ?>
<?php echo $form->textField($model, 'Contact_person', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'City'); ?>
<?php echo $form->textField($model, 'City', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'phone'); ?>
<?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'email'); ?>
<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'addres'); ?>
<?php echo $form->textField($model, 'addres', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'direction'); ?>
<?php echo $form->textField($model, 'direction', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'comment'); ?>
<?php echo $form->textField($model, 'comment', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'last_activity_date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Clients[last_activity_date]',
            'value' => strval(date("Y-m-d", strtotime("-1 day"))),
            'language' => 'ru',
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'yearRange' => '-100:+100',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'showButtonPanel' => 'true',
                'constrainInput' => 'false',
                'duration' => 'fast',
                'showAnim' => 'slide',
                'defaultDate' => '-10d',
            ),
            'htmlOptions' => array(
                'style' => 'width:390px;',
                'class' => 'last_activity_date',
            )
                )
        );
        ?>
    </div>

    <div class="row">
<?php //echo $form->label($model,'who_add_id');  ?>
<?php //echo $form->textField($model,'who_add_id');  ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'who_add_name'); ?>
<?php echo $form->textField($model, 'who_add_name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->