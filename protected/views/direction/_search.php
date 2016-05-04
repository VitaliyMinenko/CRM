<?php
/* @var $this DirectionController */
/* @var $model Direction */
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
<?php echo $form->label($model, 'id'); ?>
<?php echo $form->textField($model, 'id', array('size' => 60, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'client_id'); ?>
<?php echo $form->textField($model, 'client_id', array('size' => 60)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'carrier_id'); ?>
<?php echo $form->textField($model, 'carrier_id', array('size' => 60)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'shipping_id'); ?>
<?php echo $form->textField($model, 'shipping_id', array('size' => 60)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'client'); ?>
<?php echo $form->textField($model, 'client', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'carrier'); ?>
<?php echo $form->textField($model, 'carrier', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'Shipping'); ?>
<?php echo $form->textField($model, 'Shipping', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'date'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Direction[date]',
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
                'class' => 'Direction_date',
            ))
        );
        ?>
    </div>
    <div class="row">
<?php echo $form->label($model, 'comment'); ?>
<?php echo $form->textField($model, 'comment', array('size' => 60, 'maxlength' => 1000)); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'cost'); ?>
<?php echo $form->textField($model, 'cost', array('size' => 60)); ?>

    </div>

    <div class="row">
<?php echo $form->label($model, 'manager_id'); ?>
<?php echo $form->textField($model, 'manager_id', array('size' => 60)); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->