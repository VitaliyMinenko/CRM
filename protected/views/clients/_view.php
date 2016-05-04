<?php
/* @var $this ClientsController */
/* @var $data Clients */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Company_name')); ?>:</b>
	<?php echo CHtml::encode($data->Company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Contact_person')); ?>:</b>
	<?php echo CHtml::encode($data->Contact_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addres')); ?>:</b>
	<?php echo CHtml::encode($data->addres); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('direction')); ?>:</b>
	<?php echo CHtml::encode($data->direction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_activity_date')); ?>:</b>
	<?php echo CHtml::encode($data->last_activity_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('who_add_id')); ?>:</b>
	<?php echo CHtml::encode($data->who_add_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('who_add_name')); ?>:</b>
	<?php echo CHtml::encode($data->who_add_name); ?>
	<br />

	*/ ?>

</div>