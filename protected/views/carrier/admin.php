<?php
/* @var $this CarrierController */
/* @var $model Carrier */


if (isset($client_id)) {

    echo '<h1>Выбирите перевозчика</h1>';
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'carrier-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'name',
            'City',
            'Direcotrs_name',
            'Phone',
            'Load_capacity',
            'Body',
            'volume',
            'Direction',
            'Special_requirements',
            'Comment',
            'Last_Activity_Date',
            array('name' => 'id',
                'header' => 'Перевозка',
                'type' => 'html',
                'value' => 'CHtml::link("Выбрать",array("Shipping/SelectShiping","id"=>"$data->id","name"=>"$data->name","client_name"=>"' . $client_name . '","client_id"=>"' . $client_id . '"));'
            ),
        ),
    ));
} else {

    if (Yii::app()->user->checkAccess('2')) {

        Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#carrier-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
        ?>

        <h1>Просмотр перевозчиков</h1>
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
            'id' => 'carrier-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'name',
                'City',
                'Direcotrs_name',
                'Phone',
                'Load_capacity',
                'Body',
                'volume',
                'Direction',
                array(
                    'name' => 'Direction_id',
                    'htmlOptions' => array('style' => 'width:3px;')
                ),
                'Special_requirements',
                'Comment',
                'Last_Activity_Date',
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
    } else {
        $this->menu = array(
            array('label' => 'Создать перевозчика', 'url' => array('create')),
        );

        Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#carrier-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
        ?>

        <h1>Управление перевозчиками</h1>
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
            'id' => 'carrier-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'name',
                'City',
                'Direcotrs_name',
                'Phone',
                'Load_capacity',
                'Body',
                'volume',
                'Direction',
                array(
                    'name' => 'Direction_id',
                    'htmlOptions' => array('style' => 'width:3px;')
                ),
                'Special_requirements',
                'Comment',
                'Last_Activity_Date',
                array('name' => 'id',
                    'header' => 'Перевозка',
                    'type' => 'html',
                    'value' => 'CHtml::link("Позвонить",array("Carrier/Call","id"=>"$data->id"));'
                ),
                array('name' => 'id',
                    'header' => 'Перевозка',
                    'type' => 'html',
                    'value' => 'CHtml::link("В маршрут",array("Shipping/addShiping","id"=>"$data->id","name"=>"$data->name"));'
                ),
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
    }
}
?>

        
     