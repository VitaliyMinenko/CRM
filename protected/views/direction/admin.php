<style>
    .direction-grid{
        width:1000px;
    }
</style>
<?php
/* @var $this DirectionController */
/* @var $model Direction */

$this->breadcrumbs = array(
    'Directions' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#direction-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Поосмтор поездок</h1>



<?php if (Yii::app()->user->checkAccess('2')) { ?>
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
        'id' => 'direction-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array('name' => 'id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'client_id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'carrier_id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'shipping_id', 'headerHtmlOptions' => array('width' => '1')),
            'client',
            'carrier',
            'Shipping',
            array('name' => 'date', 'headerHtmlOptions' => array('width' => '65')),
            array('name' => 'comment', 'headerHtmlOptions' => array('width' => '400')),
            array('name' => 'cost', 'headerHtmlOptions' => array('width' => '5')),
            array('name' => 'manager_id', 'htmlOptions' => array('width' => '5')),
            array(
                'class' => 'CButtonColumn',
            ),
        ),
    ));
}
if (Yii::app()->user->checkAccess('3')) {
    ?>

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
        'id' => 'direction-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array('name' => 'id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'client_id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'carrier_id', 'headerHtmlOptions' => array('width' => '1')),
            array('name' => 'shipping_id', 'headerHtmlOptions' => array('width' => '1')),
            'client',
            'carrier',
            'Shipping',
            array('name' => 'date', 'headerHtmlOptions' => array('width' => '65')),
            array('name' => 'comment', 'headerHtmlOptions' => array('width' => '400')),
            array('name' => 'cost', 'headerHtmlOptions' => array('width' => '5')),
            array('name' => 'manager_id', 'htmlOptions' => array('width' => '5')),
            array(
                'name' => 'id', 'header' => 'Done', 'htmlOptions' => array('width' => '5'), 'type' => 'html', 'value' => 'CHtml::link("Done",array("Direction/Done","id"=>"$data->id"));'
            ),
        ),
    ));
}
?>

