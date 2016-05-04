 
<?php
$this->breadcrumbs=array(
	'Shiping',
);
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clients-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
                'columns'=>array(
                    'id',
                    'route',
                    'carriers_id',
                    'carrier_name',
                    'comment',
                )
     )
         );?>