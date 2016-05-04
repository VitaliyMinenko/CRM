<?php
/* @var $this ShippingController */
/* @var $model Shipping */

$this->breadcrumbs=array(
	'Назад'=>array('admin'),
	$model->id,
);

$this->menu=array(
                array('label'=>'Админка маршрутов ', 'url'=>array('admin')),
	array('label'=>'Создать маршрут', 'url'=>array('create')),
	array('label'=>'Изменить маршрут', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить маршрут', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Shipping #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                                 'route',
		'carrier_name',
		'carriers_id',
		'comment',
	),
)); ?>
