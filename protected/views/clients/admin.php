<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs = array(
    'Clients' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Добавить Клиента', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clients-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php if (Yii::app()->user->checkAccess('2')) { ?>
    <h1>Просмотр Редактирование Клиентов</h1>


    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'clients-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'id',
                'htmlOptions' => array('style' => 'width:3px;')
            ),
            'Company_name',
            'Contact_person',
            'City',
            'phone',
            'email',
            'addres',
            'direction',
            'comment',
            'last_activity_date',
            //	'who_add_id',
            'who_add_name',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkAccess('1')) { ?>
    <h1>Просмотр Клиентов</h1>


    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'clients-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'id',
                'htmlOptions' => array('style' => 'width:3px;')
            ),
            'Company_name',
            'Contact_person',
            'City',
            'phone',
            'email',
            'addres',
            'direction',
            'comment',
            'last_activity_date',
            //	'who_add_id',
            'who_add_name',
            array('name' => 'id', 'header' => 'работать', 'type' => 'html', 'value' => 'CHtml::link(CHtml::encode("работать"),
                         array("Clients/work","id" => $data->id,"Company_name" => $data->Company_name,"phone" => $data->phone,"Contact_person" => $data->Contact_person,"addres" => $data->addres,"email" => $data->email,"comment" => $data->comment))'),
        ),
    ));
    ?>
<?php } ?>
<?php if (Yii::app()->user->checkAccess('3')) { ?>
    <h1>Просмотр Клиентов</h1>


    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'clients-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'id',
                'htmlOptions' => array('style' => 'width:3px;')
            ),
            'Company_name',
            'Contact_person',
            'City',
            'phone',
            'email',
            'addres',
            'direction',
            'comment',
            'last_activity_date',
            //	'who_add_id',
            'who_add_name',
            array('name' => 'id', 'header' => 'работать', 'type' => 'html', 'value' => 'CHtml::link(CHtml::encode("работать"),
                         array("Carrier/GetCarrier","id" => $data->id,"Company_name" => $data->Company_name))'),
        ),
    ));
    ?>
<?php } ?>
