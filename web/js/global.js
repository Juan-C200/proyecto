    function capturarSubcadena(texto, palabraInicio, palabraFin) {
        // Crear la expresión regular para capturar desde palabraInicio hasta palabraFin
        const patron = new RegExp(`${palabraInicio}(.*?)${palabraFin}`, 's');
        
        // Buscar el patrón en el texto
        const coincidencias = texto.match(patron);
        
        // Si se encuentra una coincidencia, devolver la subcadena
        if (coincidencias) {
            return coincidencias[1];  // La subcadena capturada está en el índice 1
        } else {
            return null;
        }
    }
    
    $(document).ready(function(){
        
        $(document).on('keyup',"#buscar", function(){

            let buscar = $(this).val();
            let url = $(this).attr("data-url");
        
            $.ajax({
                url : url,
                type : 'POST',
                data : {'buscar': buscar},
                success : function(data){
                    html = capturarSubcadena(data,"<tbody>","</tbody>");
                    $('tbody').html(html);
                    
                }
            });
            
        });

        
        $(document).on('click',"#cambiar_estado", function(){
            let id = $(this).attr("data-id");
            let url = $(this).attr("data-url");
            let user = $(this).attr("data-user");
            let contenedor = $(this).attr("data-user");
            

            $.ajax({
                url:url,
                data:{id, user},
                type: 'POST',
                success: function(data){
                    
                    html = $('#navbar')[0].outerHTML + data;//outer trae la etiqueta completa y le complemento la data para poder imprimirla
                    $('#contenedor').html(html);
                }

            });
        });

        $(document).on('click',"#filtrar", function(){
            let url = $(this).attr("data-url");
            let filtro = $(this).attr("data-filtro");
            let orden = $(this).attr("data-orden");
            
            $.ajax({
                url:url,
                data:{filtro, orden},
                type: 'POST',
                success: function(data){
                    console.log(data);
                    html = $('#navbar')[0].outerHTML + data;//outer trae la etiqueta completa y le complemento la data para poder imprimirla
                    $('#contenedor').html(html);
                }

            });
        });


        //abrir modal
        $(document).on('click',"#boton_editar", function(){

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
                        alert("La contraseña es correcta.");
                    }else{
                        
                        $('#error_contraseña').removeClass('d-none');
                    }
                    
                }

            });

             
        });


        

        
        
        

        
    });   
    
    