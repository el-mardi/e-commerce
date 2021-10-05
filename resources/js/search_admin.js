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
                if (txt == "") {
                    // window.location = '/admin';
                    $("#output_search_admin_1").css('display', 'table-row-group');
                    $("#output_search_admin").css('display', 'none');

                } else {
                    if (data) {
                        $("#output_search_admin_1").css('display', 'none');
                        $("#output_search_admin").css('display', 'table-row-group').html(data);
                        $("#output_search_null").css('display', 'none');
                        
                    } else {
                        $("#output_search_admin_1").css('display', 'table-row-group');
                        $("#output_search_admin").css('display','none');
                        $("#output_search_null").css('display', 'block')
                        .attr('class', 'alert alert-danger border border-danger mx-5 mt-3')
                        .html('No results for your search Try again');

                    }
                }
            },
            error:function(){
                        $("#output_search_null").css('display', 'block')
                        .attr('class', 'alert alert-danger border border-danger mx-5 mt-3')
                        .html('Error Request, Try later');
                
            }

        });
    });
});