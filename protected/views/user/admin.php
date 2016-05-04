<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Добавить сотрудника', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php

function getRole($num) {
    if ($num == 1) {
        echo 'Sales Manager';
    } elseif ($num == 2) {
        echo 'Administrator';
    } elseif ($num == 3) {
        echo 'Logist';
    }
}
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'htmlOptions' => array('style' => 'width:3px;')
        ),
        'login',
        //'password',
        'first_name',
        'last_name',
        'registration_date',
        'date_of_birth',
        array('name' => 'role', 'value' => 'getRole($data->role)'),
        //'deleted',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
