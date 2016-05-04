<?php
/* @var $this CarrierController */
/* @var $model Carrier */

$this->breadcrumbs=array(
	'Carriers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать перевозчика', 'url'=>array('create')),
	array('label'=>'Просмотр перевозчика', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Админка первозчиков', 'url'=>array('admin')),
);
?>

<h1>Update Carrier <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>