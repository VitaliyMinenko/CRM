<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs = array(
    'Клиенты' => array('admin'),
    'Создать',
);

$this->menu = array(
    array('label' => 'Админка клиентов', 'url' => array('admin')),
    array('label' => 'Создать клиента', 'url' => array('create')),
);
?>

<h1>Create Clients</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>