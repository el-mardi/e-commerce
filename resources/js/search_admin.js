$(document).ready(function(){

    $("#search_admin").keyup(function(){
        var txt = $(this).val();

        $.ajax({    
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'POST',
            url:'search-admin',
            data:{admin:txt},
            success:function(data){
                if (data == 'vide') {
                    console.log($("#output_search_null").css('dispaly', 'block')
                    .attr('class', 'alert alert-info mx-5 mt-3')
                    .html("Enter somthing to search"));
                    console.log($("#output_search_admin").css('display','none'));
                } else {
                    if (data) {
                        console.log($("#output_search_null").css('display', 'none'));
                        console.log($("#output_search_admin").css('display', 'table-row-group')
                        .html(data));
                        
                    } else {
                        console.log($("#output_search_null").css('display', 'block')
                        .attr('class', 'alert alert-danger border border-danger mx-5 mt-3')
                        .html('No results for your search Try again'));
                        console.log($("#output_search_admin").css('display','none'));
                        
                    }
                }
            },
            error:function(){
                console.log($("#output_search_null").css('display', 'block')
                        .attr('class', 'alert alert-danger border border-danger mx-5 mt-3')
                        .html('Error Request, Try later'));
                
            }

        });
    });
});