<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->id,
);

$this->menu=array(
                array('label'=>'Админка клиентов', 'url'=>array('admin')),
	array('label'=>'Создать клиента', 'url'=>array('create')),
	array('label'=>'Изменить клиента', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить клиента', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Clients #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Company_name',
		'Contact_person',
		'City',
		'phone',
		'email',
		'addres',
		'direction',
		'comment',
		'last_activity_date',
		'who_add_id',
		'who_add_name',
	),
)); ?>
