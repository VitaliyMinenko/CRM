<?php
/* @var $this ShippingController */
/* @var $model Shipping */

$this->breadcrumbs=array(
	'Shippings'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Админка перевозок', 'url'=>array('admin')),
);
?>

<h1>Create Shipping</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>