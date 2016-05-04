<?php
/* @var $this DirectionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Directions',
);

$this->menu=array(
	array('label'=>'Create Direction', 'url'=>array('create')),
	array('label'=>'Manage Direction', 'url'=>array('admin')),
);
?>

<h1>Directions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
