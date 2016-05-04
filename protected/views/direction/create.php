<?php
/* @var $this DirectionController */
/* @var $model Direction */

$this->breadcrumbs=array(
	'Directions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Direction', 'url'=>array('index')),
	array('label'=>'Manage Direction', 'url'=>array('admin')),
);
?>

<h1>Create Direction</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>