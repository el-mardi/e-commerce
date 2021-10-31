$(document).ready(function(){

    $("#search_by").change(function(){
      var search_by = $("#search_by").val();

      if (search_by === "percentage") {
        $("#search_markdown").css('display', 'block')
        $("#search_date").css('display', 'none')
        $("#select_status").css('display', 'none')

        $("#search_markdown").keyup(function(){
            var text = $("#search_markdown").val();
            callAjax(text,"percentage");
        });
      }
      else if (search_by === "status") {
        $("#select_status").css('display', 'block')
        $("#search_markdown").css('display', 'none')
        $("#search_date").css('display', 'none')

        $("#select_status").change(function(){
            var status = $("#select_status").val();
            callAjax(status,"status");
        });

      }
      else if (search_by === "start_at") {
        $("#search_date").css('display', 'block')
        $("#search_markdown").css('display', 'none')
        $("#select_status").css('display', 'none')
        $("#markNotification").fadeIn("slow").delay(6000).fadeOut();

        $("#search_date").keypress(function(e){
          if (e.which == 13) {
            var start_at = $("#search_date").val();
            console.log(start_at);
            
            callAjax(start_at,"start_at");
          }
         
        });
      }
      else if (search_by === "end_at") {
        $("#search_date").css('display', 'block')
        $("#search_markdown").css('display', 'none')
        $("#select_status").css('display', 'none')
        $("#markNotification").fadeIn("slow").delay(6000).fadeOut();

        $("#search_date").keypress(function(e){
          if (e.which == 13) {
            var end_at = $("#search_date").val();
            callAjax(end_at,"end_at");
          }
          
        
        });

      }
      else if(search_by === ""){
        $("#search_date").css('display', 'none')
        $("#search_markdown").css('display', 'none')
        $("#select_status").css('display', 'none')

      }
      
    });

    function callAjax(value, check){
        
        $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url:'/search-markdown',
          type:'POST',
          data:{
              value:value,
              check:check,
          },
          success:function(data){
            if (value == "") {
              $("#output_search_markdown1").css('display', 'table-row-group');
              $("#output_search_markdown_null").css('display','none');
              $("#output_search_markdown").css('display', 'none');
            }
            else if (data === "vide") {
              $("#output_search_markdown_null").css('display','block').attr('class', 'alert alert-warning mt-3 mx-4 border').html("No results, Try again");
              $("#output_search_markdown1").css('display', 'table-row-group');
              $("#output_search_markdown").css('display', 'none');
              
            }else{
              $("#output_search_markdown_null").css('display', 'none');
              $("#output_search_markdown").css('display', 'table-row-group').html(data);
              $("#output_search_markdown1").css('display', 'none');

            }
            
          },
          error:function(data){
            console.log("Errors");
            
          }

        });

        
    }
});