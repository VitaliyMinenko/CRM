<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Создать сотрудникаr', 'url'=>array('create')),
	array('label'=>'Изменить сотрудника', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить сотрудника', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Админка сотрудников', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'password',
		'first_name',
		'last_name',
		'registration_date',
		'role',
		'date_of_birth',
		'deleted',
	),
)); ?>
