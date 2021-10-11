$(document).ready(function(){
    var select_date;

    $("#order_search_select").click(function(){
        var value = $(this).val();
        if (value === "date") {
            $("#select_date").show();
            $("#notification").fadeIn("slow").delay(4000).fadeOut("slow");
        }else{
            $("#select_date").hide();
        }
    });
   

    $("#select_date").keypress(function(e) {

        var txt ="txt";
        var Theselect = $("#order_search_select").val();

        if(e.which == 13) {

            select_date = $("#select_date").datepicker().val();

            console.log(select_date);
            callAjax(txt,Theselect,select_date)

        }
    });
    
    $("#search_order").keyup(function(){

        var txt=$("#search_order").val();
        var Theselect = $("#order_search_select").val();
        callAjax(txt,Theselect,Date())
      
    });


    function callAjax(txt,Theselect,select_date){
          
        $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url:'/search-order',
            data:{
                order:txt,
                select:Theselect,
                date_input:select_date,
            },
            success:function(data){
                if (data == "NoResult" || data == "vide") {
                    if (data == "vide") {
                        console.log("vide");
                        $("#output_search_order").css('display', 'none');
                        $("#output_search_order_1").css('display', 'table-row-group');
                        $("#output_search_order_null").css('display', 'none'); 

                    }else{
                    $("#output_search_order").css('display', 'none');
                    $("#output_search_order_1").css('display', 'table-row-group');
                    $("#output_search_order_null").css('display', 'block')
                    .attr('class', 'alert alert-warning border mt-3 mx-5')
                    .html("There is no result #f8ffbdin");  
                    }
                }
                else {
                        $("#output_search_order").css('display', 'table-row-group').html(data);
                        $("#output_search_order_1").css('display', 'none');
                        $("#output_search_order_null").css('display', 'none');
                }
            },
            error:function(data){
                $("#output_search_order_null").css('display', 'block')
                .attr('class', 'alert alert-danger border mt-3')
                .html("Ooopps, the request not sent good, try again later");
            }
        });
    }
});