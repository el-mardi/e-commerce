
$(document).ready(function(){

    $("#category_for_new_order").change(function(){
        var category = $("#category_for_new_order option:selected").val();
        
        $.ajax({
            
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'POST',
            url:'/addOrder',
            data:{
                categorySelected: category,
            },
    
            success:function(data){
               $("#product_for_new_order").html(data);
                
            },
    
            error:function(data){
                console.log("error");
                
            },
    
        });

    });


    $("#product_for_new_order").change(function(){

        var product = $("#product_for_new_order option:selected").val();

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'POST',
            url:'/addOrder',
            data:{
                productSelected: product,
            },
    
            success:function(data){                
                $("#table_show_detail").css('display', 'table');
                $("#table_show_detail_tbody").html(data);
                $("#quantite_for_new_order").css('display', 'block');
                $("#add_to_facture").css('display', 'block');
               
            },
    
            error:function(data){
                console.log("error");
                
            },
        });

    });

    $("#add_to_facture").click(function(){
        var category = $("#category_for_new_order option:selected").val();
        var product = $("#product_for_new_order option:selected").val();
        var quantite = $("#quantite_for_new_order").val();

        console.log(category, product, quantite);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/addOrder',
            data:{
                theCategory: category,
                theProduct: product,
                thQuantite: quantite,
            },
            success:function(data){
                if (data === "quantite insufficient") {
                $("#errors").css('display','block').attr('class', 'alert alert-danger border').html("quantite insufficient, Please reduce your quantity");
                    
                } else {
                    $("#facture_body").append(data);
                    $("#quantite_for_new_order").val(1);
                    $("#errors").css('display','none');
                }
               
            },
            error:function(data){

            }
        });


    });

    $("#Create_order").click(function(){
        var category = $("#category_for_new_order option:selected").val();
        var product = $("#product_for_new_order option:selected").val();
        var quantite = $("#quantite_for_new_order").val();
        if ( product ==="" || quantite ==="") {
            $("#errors").css('display','block').attr('class', 'alert alert-danger border').html("Please fill the formule");
        }else{

            $.ajax({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/addOrder',
                data:{
                    
                },
                success:function(data){
                   
                    $("#full_page").css('display','none');
                    $("#user_div").css('display','block');
                },
                error:function(data){
    
                }
            });
            
        }

    });

    $("#search_for_prd").keyup(function(){

        var search_for_prd =$("#search_for_prd").val();
        $("#notification_for_input").css('display', 'block').html("The results in the select inbox ");
        $("#return_to_category").css('display', 'block');

       
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/addOrder',
            data:{
                search_prd:search_for_prd
            },
            success:function(data){
                $("#category_for_new_order").css('display', 'none');
                $("#product_for_new_order").html(data);
            },
            error:function(data){

            }
        });
        
    });

    $("#return_to_category").click(function(){

        $("#category_for_new_order").css('display', 'block');
        $("#notification_for_input").css('display', 'none');
        $("#return_to_category").css('display', 'none');
        $("#search_for_prd").val('');
        $("#product_for_new_order").html("<option value=''selected>Select product</option>");

    });

   
        $("#select_user").change(function(){
            user = $("#select_user option:selected").val(); 

            $("#submit_order").click(function(){
                console.log(user);

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url: '/order',
                    data:{id_user: user},
                    success:function(data){
                        $("#id_for_check").html(data);
                    },
                    error:function(){

                    },
                });
             
            });

        });

    
}); //ready