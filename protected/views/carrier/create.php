<?php
/* @var $this CarrierController */
/* @var $model Carrier */

$this->breadcrumbs=array(
	'Carriers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Админка перевозчиковr', 'url'=>array('admin')),
);
?>

<h1>Create Carrier</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>