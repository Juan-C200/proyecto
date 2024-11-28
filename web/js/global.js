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

        
    
    
           
                // Manejador de eventos para los botones
                $('.boton_cambiar_panel').on('click', function() {
                    // Obtener el valor del atributo 'data-panel' del botón presionado
                    var panel = $(this).data('panel');
        
                    // Oculto ambos paneles
                    $('.cajaSeñales1, .cajaSeñales2').addClass('d-none');
                    
        
                    // Miestro el panel el cual el boton referenciado fue oprimido
                    $('#' + panel).removeClass('d-none');
                    
                });

                $('.boton_cambiar_panel1').on('click', function() {
                    // Obtener el valor del atributo 'data-panel' del botón presionado
                    var paneles = $(this).data('panel');
                    
        
                    // Oculto ambos paneles
                    $('.cajaSeñales3, .cajaSeñales4').addClass('d-none');
                  
        
                    // Miestro el panel el cual el boton referenciado fue oprimido
                    $('#' + panel).removeClass('d-none');
                    
                });

        
        
        
            //});

            $('.image-button').on('click', function() {
                // Eliminar el color verde de todos los botones
                $('.image-button').removeClass('btn-success').addClass('btn-light'); // 'btn-light' es el color blanco en Bootstrap
                
                // Añadir la clase verde al botón seleccionado
                $(this).removeClass('btn-light').addClass('btn-success');
    
                // Obtener el valor del botón seleccionado
                var valorSeleccionado = $(this).val();
                
                // Colocar el valor en el campo oculto
                $('#tipo_señal_seleccionada').val(valorSeleccionado);
    
                // Opcional: Mostrar el valor seleccionado (para depuración)
                alert('Valor seleccionado: ' + valorSeleccionado);
            });
        
    });   
    
    