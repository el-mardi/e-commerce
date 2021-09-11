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
                    console.log($("#output_search_user_null").css('display', 'block'));
                    console.log($("#output_search_user_null").attr('class', ' mt-3 mx-5 border alert alert-info')
                    .html("Enter something in search "));     
                    console.log($("#output_search_user").css('display', 'none'));

                }else{

                if(data){
                    console.log($("#output_search_user").css('display', 'table-row-group'));
                    console.log($("#output_search_user").html(data));
                    console.log($("#output_search_user_null").css('display', 'none'));
                }else{
                    console.log($("#output_search_user_null").css('display', 'block'));
                    console.log($("#output_search_user_null").attr('class', ' mt-3 mx-5 border alert alert-warning')
                    .html("There is no results. Try again"));
                    console.log($("#output_search_user").css('display', 'none'));

                }
                }
            },
            error:function(data){
                console.log($("#output_search_user_null").attr('class', ' mt-3 mx-5 border border-danger alert alert-danger')
                .html("Oooopps the request not sent good, Try later"));
                
            }
        });

    });
   });