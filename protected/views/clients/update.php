<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs = array(
    'Clients' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Админка клиентов', 'url' => array('admin')),
    array('label' => 'Создать клиента', 'url' => array('create')),
);
?>

<h1>Update Clients <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>