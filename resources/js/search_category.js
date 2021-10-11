$(document).ready(function(){

    $("#search_category").keyup(function(){
        var txt = $(this).val();
        // console.log(txt);

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type: 'POST', 
            url: 'search-category',
            data:{category: txt},
            success : function(data){
                if (data == "vide") {
                    // window.location = '/category';
                    $("#output_category").css('display', 'none');
                    $("#output_category_1").css('display', 'table-row-group');

                } else {
                    if (data) {
                        
                        $("#output_category").css('display', 'table-row-group').html(data);
                        $("#output_category_1").css('display', 'none');
                        $("#output_search_null").css('display','none');
                        
                    }else{
                        $("#output_category_1").css('display', 'table-row-group');
                        $("#output_category").css('display', 'none');
                        $("#output_search_null").css('display','block').attr('class', ' mt-3 mx-5 border alert alert-warning')
                         .html("There is no results. Try again");
                    }
                }
               
            },
            error: function(data){
                $("#output_search_null").attr('class', ' mt-3 mx-5 border border-danger alert alert-danger')
                .html("Oooopps the request not sent good, Try later");            }
        });
    });

});