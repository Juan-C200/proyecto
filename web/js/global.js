    $(document).ready(function(){
        
        $(document).on('keyup',"#buscar", function(){

            let buscar = $(this).val();
            let url = $(this).attr("data-url");

            setTimeout(()=>{
                $.ajax({
                    url : url,
                    type : 'POST',
                    data : {'buscar': buscar},
                    success : function(data){
                        $('tbody').html(data);
                        
                    }
                });
            },1000);
        });

        
        $(document).on('click',"#cambiar_estado", function(){
            let id = $(this).attr("data-id");
            let url = $(this).attr("data-url");
            let user = $(this).attr("data-user");

            

            $.ajax({
                url:url,
                data:{id, user},
                type: 'POST',
                success: function(data){
                    console.log(data);
                    $('tbody').html(data);
                    
                }

            });
        });


        //abrir modal
        $(document).on('click',"#boton_editar", function(){

            event.preventDefault();

            $('#modal').fadeIn(400);
            $('#modal').removeClass('d-none');
            $('#container').css({
                            "filter": "blur(5px)",
                            "transition": "filter 0.3s ease"
                        });
            $('#navbar').css({
                            "filter": "blur(5px)",
                            "transition": "filter 0.3s ease"
                        });

        });

        //cerrar modal
        $(document).on('click',"#close", function(){
            $('#modal').fadeOut(400);
            $('#modal').addClass('d-none');
            $('#container ').removeAttr("style");
            $('#navbar ').removeAttr("style");
        });

        $('#validate_password').click(function(){
            let url = $(this).attr("data-url");
            let pass = $('#contraseña').val();
            console.log(pass);

            
            $.ajax({
                url:url,
                data:{'password' : pass},
                type: 'POST',
                success: function(data){
                    console.log(data);
                    if(data.includes("correcta")){
                        $("#form_update").submit();
                        alert("Se actualizo el usuario correctamente.");
                    }else{
                        
                        $('#error_contraseña').removeClass('d-none');
                    }
                    
                }

            });

             
        });


        

        
        
        

        
    });    