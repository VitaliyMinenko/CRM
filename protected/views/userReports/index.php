<script type="text/javascript" src="../../../js/UserReports.js"></script>
<style>
    .rep{
        margin: 0;
        padding:0;
    }
</style>
    <?php
/* @var $this UserReportsController */

$this->breadcrumbs = array(
    'User Reports',
);
?>
<h1>Просмотр отчета работников</h1>
    Работник  <?php echo CHtml::dropDownList('users', $all_users, $all_users); ?>
    Отчет за  <?php echo CHtml::button('Сегодня', array('class' => 'one_day')); ?>
    <?php echo CHtml::button('7 дней', array('class' => 'seven_days')); ?>
    <?php echo CHtml::button('Месяц', array('class' => 'one_month')); ?>
    <?php echo CHtml::button('Год', array('class' => 'one_year')); ?><BR>
     Искать по диапазону  <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'date_start',
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
            'style' => 'width:90px;',
            'class'=>'date_start',
        )
            )
    );
    ?> 
    по
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'date_stop',
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
            'style' => 'width:90px;',
            'class'=>'date_stop',
        )
            )
    );
    ?>
    <?php echo CHtml::button('Искать', array('class' => 'range')); ?>
<div class="rep">
 
</div>



