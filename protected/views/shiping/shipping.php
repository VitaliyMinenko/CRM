
<?php
$this->breadcrumbs=array(
	'Shiping',
);

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clients-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
                'columns'=>array(
                    'route',
                    'comment',
                    array('name'=> 'id',
                                   'header'=>'Add',
                                    'type'=>'html',
                                          'value'=>'CHtml::link("В маршрут",array("Shiping/ChngShiping","id"=>"$data->id","carrier_name"=>"'.$carrier_name.'","carrier_id"=>"'.$carrier_id.'"));'
                                            ),
                    ),
        ));
