<script type="text/javascript" src="/assets/4347c2a7/jquery.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script>
    $(function () {
           $(".bat_click").on("click", function () {
           var comment =  $('.comment').val();
              $.ajax({
                type: 'POST',
                url:"index.php?r=SpecialOrders/SaveSpecOrders",
                dataType: "text",
                data: {'comment':comment},
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            })
         });
        
    });
</script>

<?php
/* @var $this SpecialOrdersController */

$this->breadcrumbs=array(
	'Special Orders',
);
?>
<table>
    <tr>
        <td><input type="button" value="Выполнить" class="bat_click"></td>
        <td><textarea cols="100" rows="5" class="comment"></textarea></td>
    </tr>
    
</table>