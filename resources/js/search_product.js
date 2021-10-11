$(document).ready(function(){

    $("#search_product").keyup(function(){
        var txt = $("#search_product").val();
        var get_select = $("#search_select").val();
        
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type: 'POST',
            url: 'search-product',
            data:{
                product: txt,
                select :get_select
            }, 
            success: function(data){
                if (data == "vide") {
                    $("#output_product").css('display', 'none');
                    $("#output_product_1").css('display', 'table-row-group');
                    $("#search_output_null_product").css('display', 'none');
                }else{
                    if (data) {
                        $("#output_product_1").css('display', 'none');
                        $("#search_output_null_product").css('display', 'none');
                        $("#output_product").css('display', 'table-row-group').html(data);
                    } else {
                        $("#output_product_1").css('display', 'table-row-group');
                        $("#output_product").css('display', 'none');
                        $("#search_output_null_product").css('display', 'block').attr('class', 'mt-3 alert alert-warning border')
                        .html('There is no result, Try again');
                    }
                }

            },
            error:function(){
                $("#search_output_null_product").css('display', 'block').attr('class', 'mt-3 alert alert-warning border')
                        .html('An error happend, Try again');
            }

        });
    });
});