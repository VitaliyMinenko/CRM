<?php
/* @var $this ShippingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shippings',
);

$this->menu=array(
	array('label'=>'Create Shipping', 'url'=>array('create')),
	array('label'=>'Manage Shipping', 'url'=>array('admin')),
);
?>

<h1>Shippings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
