<script type="text/javascript" src="/assets/4347c2a7/jquery.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script>
    $(function () {


        $('.create_shipping').on("click", function () {
            $('div.cr_shipping').show('700');
        });
        $('.find_shipping').on("click", function () {
            $('div.view_shipping').show('700');
        });
        $('.btn').on("click", function () {
            $('div.view_shipping').show('700');
        });
    })
</script>
<?php
 if (isset($_POST['name_shipping']) && isset($_POST['comment_shipping'])) { ?>
<script>
        $(document).ready(function() {
             $('div.view_shipping').show('700');
});

</script>
 <?php }
?>



<style>
    .name_shipping{ width: 600px;}
    .comment_shipping{ width: 600px;}
</style>

<?php
/* @var $this ShipingController */

$this->breadcrumbs=array(
	'Shiping',
);
?>
<input type="button" class="create_shipping" value="Создать перевозку">
<!--<input type="button" class="find_shipping" value="Найти перевозку">-->
<div class="cr_shipping" style="display: none">
    <?php echo CHtml::beginForm(); ?>
    <table>
        <tr>
            <td><b>Наименование направления:</b></td>
            <td><input type="text" class="name_shipping" name="name_shipping"></td>
         </tr>
         <tr>
            <td><b>Коментарий:</b></td>
            <td><textarea class="comment_shipping" name="comment_shipping"></textarea></td>
         </tr>
          <tr>
            <td><?php echo CHtml::submitButton('Добавить перевозку +', array('class' => 'btn')); ?></td>
            <td></td>
         </tr>
    </table>

</div>
<div class="view_shipping" style="display: none">
    <?php
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

    </div>
 