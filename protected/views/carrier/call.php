<?php ?>
<?php echo CHtml::beginForm('index.php?r=Carrier/SaveCall', 'post'); ?>
<table>
    <tr>
        <td>Результат звонка</td>
        <td><?php echo CHtml::textField('comment', '', array('required' => 'true', 'size' => 90,)); ?><input type="hidden" value="<?php echo $client_id; ?>" name="id"></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo CHtml::submitButton('Сохранить'); ?></td>
    </tr>
</table>
<?php echo CHtml::endForm(); ?>