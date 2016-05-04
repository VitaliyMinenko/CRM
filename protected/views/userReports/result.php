<?php $colors = array('#4169E0', '#FFFF00', '#006400', '#00BFFF', '#4682B4', '#DC143C', '#DA70D6', '#556B2F');
function act($action){
    if ($action == 1) {
                return 'Звонки';
       }
       elseif($action == 2) {
                return 'Встречи';
       }
        elseif($action == 3) {
                return 'Заключенные договора';
       }
        elseif($action == 4) {
                return 'Иные поручения';
       }
        elseif($action == 5) {
                return 'Другие поручения';
       }
       elseif($action == 6) {
                return 'Отправленые mail';
       }
}
?>
<?php

?>
<div class="grafic_table">
    <?php foreach ($statisic as $key => $stat) { ?>
        <div style="width:400px; height: 25px; margin-top: 5px;">
            <div style=" background-color: <?php echo $colors[rand(0, 7)]; ?>; height: 25px;width:<?php echo $stat[1] ?>%">
            </div>
        </div> 
        <span><?php echo $key . '  ' . $stat[0] ?></span>
    <?php } ?>
</div>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        array('name' => 'Company_name',
            'header' => 'Название Компании'),
        array('name' => 'first_name',
            'header' => 'Имя'),
        array('name' => 'last_name',
            'header' => 'Фамилия'),
        array('name' => 'action',
            'header' => 'Действие',
            'value'=>'act($data["action"])',    ),
        array('name' => 'comment',
            'htmlOptions'=>array('width'=>'100px'),
            'header' => 'Комментарий',),
        array('name' => 'date',
            'header' => 'Дата'),
    ),
));
?>