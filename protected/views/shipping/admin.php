<?php
if (isset($carrier_id) && !isset($client_name)) {
    $this->menu = array(
        array('label' => 'Создать маршрут', 'url' => array('create')),
    );
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'shipping-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'route',
            'comment',
            array('name' => 'id',
                'header' => 'Add',
                'type' => 'html',
                'value' => 'CHtml::link("В маршрут",array("Shipping/ChngShiping","id"=>"$data->id","route"=>"$data->route","carrier_name"=>"' . $carrier_name . '","carrier_id"=>"' . $carrier_id . '"));'
            ),
        ),
    ));
} elseif (isset($client_name)) {
    echo '<h1>Выберете маршрут</h1>';
    $this->menu = array(
        array('label' => 'Создать маршрут', 'url' => array('create')),
    );
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'shipping-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'route',
            'comment',
            array('name' => 'id',
                'header' => 'Select',
                'type' => 'html',
                'value' => 'CHtml::link("Выбрать",array("Direction/SetDirection","id"=>"$data->id","route"=>"$data->route","carrier_name"=>"' . $carrier_name . '","carrier_id"=>"' . $carrier_id . '","client_name"=>"' . $client_name . '","client_id"=>"' . $client_id . '"));'
            ),
        ),
    ));
} else {

    Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#shipping-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
    ?>
    <h1>Перевозки</h1>
       <?php $this->menu = array(
        array('label' => 'Создать маршрут', 'url' => array('create')),
    ); ?>
    

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
        'id' => 'shipping-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'route',
            'carrier_name',
            'carriers_id',
            'comment',
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
}
?>
