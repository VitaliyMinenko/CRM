<?php
/* @var $this DirectoryController */

$this->breadcrumbs=array(
	'Directory',
);
?>
<h1>Создание перевозки</h1>

<?php echo CHtml::beginForm(array('Direction/CreateDirection'), 'post'); ?>
<table>
    <tr>
        <td>Дата </td>
         <td>
             <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'date',
    'value' => strval(date("Y-m-d", strtotime("-0 day"))),
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
        'style' => 'width:100%;',
        'class' => 'date',
    )
        )
);
?> </td>
    </tr>
    <tr>
        <td>Коментарий </td>
         <td><?php echo CHtml::textField('comment', '', array('readonly'=>FALSE,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>Стоимость</td>
         <td><?php echo CHtml::textField('cost', '', array('readonly'=>FALSE,'class'=>'intext','required'=>true)); ?></td>
    </tr>
        <tr>
        <td>Имя заказчика</td>
         <td><?php echo CHtml::textField('client_name',$client_name, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>Название маршрута</td>
        <td><?php echo CHtml::textField('route_name', $route_name, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>Перевозчик</td>
         <td><?php echo CHtml::textField('carrier_name',$carrier_name, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>ID Клиента</td>
         <td><?php echo CHtml::textField('client_id',$client_id, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>ID Перевозчика</td>
         <td><?php echo CHtml::textField('carrier_id', $carrier_id, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
    <tr>
        <td>ID Маршрута</td>
         <td><?php echo CHtml::textField('route_id',$route_id, array('readonly'=>true,'class'=>'intext')); ?></td>
    </tr>
</table>
  <?php echo CHtml::submitButton('Создать'); ?>
    <?php echo CHtml::endForm(); ?>
