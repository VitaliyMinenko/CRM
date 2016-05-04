<?php
/* @var $this CustomQueryController */

$this->breadcrumbs=array(
	'Custom Query',
);
?>
<h1>Выборка из базы</h1>
Выбрать из базы <?php echo CHtml::dropDownList('listname', '', array('M' => 'Male', 'F' => 'Female'));?> 

