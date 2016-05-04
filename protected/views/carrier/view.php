<?php
/* @var $this CarrierController */
/* @var $model Carrier */

$this->breadcrumbs=array(
	'Перевозчики'=>array('admin'),
	$model->name,
);

$this->menu=array(
                array('label'=>'Админка перевозчиков', 'url'=>array('admin')),
	array('label'=>'Изменть перевозчика', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить перевозчика', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h1>View Carrier #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'City',
		'Direcotrs_name',
		'Phone',
		'Load_capacity',
		'Body',
                                'volume',
		'Direction',
		'Special_requirements',
		'Comment',
		'Last_Activity_Date',
	),
)); ?>
