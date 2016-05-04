<script type="text/javascript" src="/assets/4347c2a7/jquery.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/js/jquery.datetimepicker.js"></script>
<link href="/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
<script>
    $(function () {
        $('.datetimepicker').datetimepicker({
            timepicker: true,
            format: 'Y-m-d H:i'
        });
        $(".resolve").on("click", function () {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "index.php?r=Planes/Resolve",
                dataType: "text",
                data: {'id': id},
                success: function (data) {
                     location.reload();
                }
            })
        });
        
        $('.add_new_plane').on("click", function () {
            $('div.add_block').show('700');
        });
        $('.hi').on("click", function () {
            $('div.add_block').hide('700');
        });
        $(".plane").on("click", function () {
            var comment = $('.plane_comment').val();
            var dt = $('.date').val();
            if (confirm("Добавить запись в планировщик?")) {
                $.ajax({
                    type: 'POST',
                    url: "index.php?r=Clients/AddPlane",
                    dataType: "text",
                    data: {'comment': comment, 'dt': dt},
                    success: function (data) {

                        alert(data);
                        location.reload();


                    }
                })
            } else {

            }
        });

    })
</script>


<?php
$this->breadcrumbs = array(
    'Planes',
);
?><?php echo CHtml::beginForm(array('Planes/index'), 'post', array('autocomplete' => "on")); ?> 
<p>Задания на : <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'today',
    'value' => strval(date($dt, strtotime("0day"))),
    'language' => 'ru',
    'options' => array(
        'dateFormat' => 'yy-mm-dd',
        'yearRange' => '-100:+100',
        'changeMonth' => 'true',
        'changeYear' => 'true',
        'showButtonPanel' => 'true',
        'constrainInput' => 'false',
        'duration' => 'fast',
        'showAnim' => 'slide',
        'defaultDate' => '-10d',
    ),
    'htmlOptions' => array(
        'style' => 'width:90px;',
        'class' => 'today',
    )
        )
);
?> 
    <?php echo CHtml::submitButton('Поиск'); ?>
    <?php echo CHtml::endForm(); ?>
</p>
<b>Добавить в планировщик</b><input type="button" class="add_new_plane" value="+">
<div class="add_block" style="display:none">
    Добавить на время  <input type="text" name="from" id="from" class="datetimepicker date" value="<?php echo (isset($from) && $from != '') ? $from : strval(date("Y-m-d H:i", strtotime("0 day today"))) ?>">
    <br>
    <br>
    <textarea cols="33" rows="7" class="plane_comment" maxlength="999"></textarea>
    <br>
    <br>
    <a href="javascript:" class="hi"/>&#8593;</a><a href="javascript:" class="plane"/>Добавить +</a>

</div>
<br>
<br>
<div class="info">
    <table class="info_table">
        <tr>
            <th width="5">#</th>
            <th width="550">План</th>
            <th width="50">Время</th>
            <th width="50">Исполнено</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($data as $plan) { ?>
            <tr>
                <td><?php echo $i;
        $i++; ?></td>
                <td><?php echo $plan['comment']; ?></td>
                <td><?php echo $plan['date']; ?></td>
                <td><input type="checkbox" class="resolve" value="<?php echo $plan['id']; ?>" >Исполнить</td>
            </tr>
        <?php } ?>
    </table>
</div>