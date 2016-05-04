<?php
/* @var $this CarrierController */
/* @var $data Carrier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Direcotrs_name')); ?>:</b>
	<?php echo CHtml::encode($data->Direcotrs_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Load_capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Load_capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Body')); ?>:</b>
	<?php echo CHtml::encode($data->Body); ?>
	<br />
                <b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Direction')); ?>:</b>
	<?php echo CHtml::encode($data->Direction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Special_requirements')); ?>:</b>
	<?php echo CHtml::encode($data->Special_requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Last_Activity_Date')); ?>:</b>
	<?php echo CHtml::encode($data->Last_Activity_Date); ?>
	<br />

	*/ ?>

</div>