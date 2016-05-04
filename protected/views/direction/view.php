<?php
/* @var $this DirectionController */
/* @var $model Direction */




?>

<h1>View Direction #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_id',
		'carrier_id',
		'shipping_id',
		'client',
		'carrier',
		'Shipping',
		'date',
		'comment',
		'cost',
		'manager_id',
	),
)); ?>
