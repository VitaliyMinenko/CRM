<script type="text/javascript" src="/assets/4347c2a7/jquery.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/assets/4347c2a7/jquery.ba-bbq.js"></script>
<script type="text/javascript" src="/js/jquery.datetimepicker.js"></script>
<link href="/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
<script>
    $(function () {
         $(".bat_click").on("click", function () {
           var action =  $(this).attr('id');
           var id = '<?php echo $uzver['id']?>';
           var comment =  $('.comment').val();
           if (confirm("Добавить запись в отчет?")) {
              $.ajax({
                type: 'POST',
                url:"index.php?r=Clients/SetReport",
                dataType: "text",
                data: {'id': id,'action':action,'comment':comment},
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            })
              } else {
              
              }
         });
           $('.datetimepicker').datetimepicker({

 timepicker:true,
 format:'Y-m-d H:i'
});
          $("#button_plane").on("click", function () {
              $( "div.add_plane" ).show(700);

         });
           $('.hi').on("click", function () {
            $('div.add_plane').hide('700');
        });
           $(".plane").on("click", function () {
           var id = '<?php echo $uzver['id']?>';
           var comment =  $('.plane_comment').val();
           var dt =  $('.date').val();
           if (confirm("Добавить запись в планировщик?")) {
              $.ajax({
                type: 'POST',
                url:"index.php?r=Clients/AddPlane",
                dataType: "text",
                data: {'id': id,'comment':comment,'dt':dt},
                success: function (data) {
                   
                  alert(data);
                  location.reload();
                    
            
                }
            })
              } else {
              
              }
         });
    
  });
</script>
<?php
$this->breadcrumbs=array(
	'Clients'=>array('admin'),
	'Work',
);
?>

<h1>Работать с клиентом:</h1>
<p class="abot">Компания: <span><?php echo $uzver['Company_name'] ?></span></p>
<p class="abot">Телефон: <span><?php echo $uzver['phone'] ?></span></p>
<p class="abot">Контактное лицо: <span><?php echo $uzver['Contact_person'] ?></span></p>
<p class="abot">Адрес: <span><?php echo $uzver['addres'] ?></span></p>
<p class="abot">Маил: <span><?php echo $uzver['email'] ?></span></p>
<p class="abot">Комментарий: <span><?php echo $uzver['comment'] ?></span></p>
<br>
<p class="abot">Комментарий:</p>
<textarea cols="35" rows="7" class="comment" maxlength="999"></textarea>
<br>
<br>

<a href="javascript:"class="bat_click"  id="button_mail"/>Отправил email &#9993</a>
<a href="javascript:" class="bat_click"  id="button_call"/>Позвонил &#9990</a>
<a href="javascript:" class="bat_click"  id="button_meet"/>Осуществил встречю</a>
<br>
<br>
<a href="javascript:" class="bat_click"   id="button_agreement"/>Заключил договор &#9745</a>
<a href="javascript:" class="bat_click"   id="button_other"/>Другие действия</a>
<a href="javascript:" id="button_plane"/>Добавить в планировщик +</a>
<br>
<br>
<div class="add_plane" style="display:none">
    
    Добавить на время  <input type="text" name="from" id="from" class="datetimepicker date" value="<?php echo (isset($from) && $from !='')?$from:strval (date("Y-m-d H:i", strtotime("-1 day today")))?>">
  
        <textarea cols="33" rows="7" class="plane_comment" maxlength="999"></textarea>
        <br>
     <br>
     <a href="javascript:" class="plane"/>Добавить +</a>
<br>
<a href="javascript:" class="hi"/>&#8593;</a>

</div>

<div class="msg"></div>