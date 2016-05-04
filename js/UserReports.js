$(function () {
          $(".one_day").on("click", function () {
            var user_id = $('#users option:selected').val();
            var name_class =  $(this).attr('class');
            $.ajax({
                type: 'POST',
                url:"index.php?r=UserReports/GetDay",
                dataType: "text",
                data: {'user_id': user_id,'class_name':name_class},
                success: function (data) {
                        $('.rep').html(data);
                }
            })
        });
        
            $(".seven_days").on("click", function () {
            var user_id = $('#users option:selected').val();
            var name_class =  $(this).attr('class');
            $.ajax({
                type: 'POST',
                url:"index.php?r=UserReports/GetDay",
                dataType: "text",
                data: {'user_id': user_id,'class_name':name_class},
                success: function (data) {
                        $('.rep').html(data);
                }
            })
        });
        
            $(".one_month").on("click", function () {
            var user_id = $('#users option:selected').val();
            var name_class =  $(this).attr('class');
            $.ajax({
                type: 'POST',
                url:"index.php?r=UserReports/GetDay",
                dataType: "text",
                data: {'user_id': user_id,'class_name':name_class},
                success: function (data) {
                        $('.rep').html(data);
                }
            })
        });
           $(".one_year").on("click", function () {
            var user_id = $('#users option:selected').val();
            var name_class =  $(this).attr('class');
            $.ajax({
                type: 'POST',
                url:"index.php?r=UserReports/GetDay",
                dataType: "text",
                data: {'user_id': user_id,'class_name':name_class},
                success: function (data) {
                        $('.rep').html(data);
                }
            })
        });
        
            $(".range").on("click", function () {
            var user_id = $('#users option:selected').val();
            var name_class =  $(this).attr('class');
            var start =  $('.date_start').val();
            var stop =  $('.date_stop').val();
            $.ajax({
                type: 'POST',
                url:"index.php?r=UserReports/GetDay",
                dataType: "text",
                data: {'user_id': user_id,'class_name':name_class,'start':start,'stop':stop},
                success: function (data) {
                        $('.rep').html(data);
                }
            })
        });
  })
   




