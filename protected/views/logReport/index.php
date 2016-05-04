<style>
    .te{
        width: 100px; 
    }
    #action{
       width: 31%; 
    }
    #comment{
        width: 30%; 
    }
    </style>

<?php
/* @var $this LogReportController */
$this->breadcrumbs=array(
	'Log Report',
);
?>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info" style=" background-color: lightgreen; font-size: 14px; color: black; height: 15px; border: 1px #000 solid; width: 500px;">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
    
<h1>Добавить в отчет информацию о работе</h1>
<?php echo CHtml::beginForm(array('LogReport/SaveReport'), 'post'); ?>
<table>
    <tr>
        <td width="50"><p class="te">Комментарий</p></td>
         <td><?php echo CHtml::textField('comment','', array('readonly'=>false,'required'=>true)); ?></td>
    </tr>
        <tr>
        <td><p class="te">Действие</p></td>
         <td><?php echo CHtml::dropDownList('action', '', 
              array('1' => 'Совершон Звонок', '6' => 'Отправить mail', '4' => 'Инные действия'));?></td>
    </tr>
</table>

<?php echo CHtml::submitButton('Добавить'); ?>
<?php echo CHtml::endForm(); ?>

  
