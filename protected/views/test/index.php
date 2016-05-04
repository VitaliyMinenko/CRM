<?php
/* @var $this TestController */

$this->breadcrumbs=array(
	'Test',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
               'dataProvider'=>$dataProvider,
              ));
?>
