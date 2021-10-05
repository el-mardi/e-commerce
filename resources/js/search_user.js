$(document).ready(function() {

    $("#search_user").keyup(function(){
        var txt = $(this).val();
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'search-user',
            data: {user : txt},
            success: function(data){
                if(data=="vide"){
                    // window.location = '/user';
                    $("#output_search_user").css('display', 'none');
                    $("#output_search_user_1").css('display', 'table-row-group');

                }else{

                if(data){
                    $("#output_search_user").css('display','table-row-group');
                    $("#output_search_user_1").css('display', 'table-row-group').html(data);
                    $("#output_search_user_null").css('display', 'none');
                }else{
                    $("#output_search_user_1").css('display', 'table-row-group');
                    $("#output_search_user").css('display', 'none');
                    $("#output_search_user_null").css('display', 'block').attr('class', ' mt-3 mx-5 border alert alert-warning').html("There is no results. Try again");

                }
                }
            },
            error:function(data){
                $("#output_search_user_null").attr('class', ' mt-3 mx-5 border border-danger alert alert-danger')
                .html("Oooopps the request not sent good, Try later");
                
            }
        });

    });
   });