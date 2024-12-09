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
                    
                    $('#contenedor').html(data);
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
                    
                    table = capturarSubcadena(data,"<table class='table mt-3' id='tabla'>","</table>");//outer trae la etiqueta completa y le complemento la data para poder imprimirla

                    $('table').html(table);
                    
                    
                }

            });
        });


        //abrir modal confirmar contraseña
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

        //cerrar modal confirmar contraseña
        $(document).on('click',"#close", function(){
            $('#modal').fadeOut(400);
            $('#modal').addClass('d-none');
            $('#container ').removeAttr("style");
            $('#navbar ').removeAttr("style");
        });

        $('#validate_password').click(function(){
            let url = $(this).attr("data-url");
            let pass = $('#contraseña').val();
            

            
            $.ajax({
                url:url,
                data:{'password' : pass},
                type: 'POST',
                success: function(data){
                    
                    if(data.includes("correcta")){

                        $("#form_update").submit();
                        alert("La contraseña es correcta.");
                    }else{
                        
                        $('#error_contraseña').removeClass('d-none');
                    }
                    
                }

            });
        });




        //abrir modal confirmar contraseña
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

        //cerrar modal confirmar contraseña
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
                $('.boton_cambiar_tipo_señal').on('click', function() {
                    $('#' + 'boton_panel_señal_vertical').removeClass('btn-primary').addClass('btn-ligth');
                    $('#' + 'boton_panel_señal_horizontal').removeClass('btn-primary').addClass('btn-ligth');


                    
                    // Obtener el valor del atributo 'data-panel' del botón presionado
                    var panel = $(this).data('panel');
        
                    // Oculto ambos paneles
                    $('#panel_señal_vertical, #panel_señal_horizontal').addClass('d-none');
                    
        
                    // Muestro el panel el cual el boton referenciado fue oprimido
                    $('#' + panel).removeClass('d-none');
                    $('#' + 'boton_' + panel).removeClass('btn-success').addClass('btn-primary');
                    
                });

                $('.boton_cambiar_panel1').on('click', function() {
                    // Obtener el valor del atributo 'data-panel' del botón presionado
                    var panel = $(this).data('panel');
                    
        
                    // Oculto ambos paneles
                    $('.cajaSeñales3, .cajaSeñales4').addClass('d-none');
                  
        
                    // Miestro el panel el cual el boton referenciado fue oprimido
                    $('#' + panel).removeClass('d-none');
                    
                });

        
        
        
            //});
            $('.image-button').removeClass('btn-success').addClass('btn-light'); // 'btn-light' es el color blanco en Bootstrap
            $('.image-button').on('click', function() {

                
                    $('.image-button').removeClass('btn-success').addClass('btn-light');

                
                    $('.image-button').addClass('btn-success'); 
                    
                    // Añadir la clase verde al botón seleccionado
                    $(this).removeClass('btn-light').addClass('btn-success');
        
                    // Obtener el valor del botón seleccionado
                    var valorSeleccionado = $(this).val();
                    console.log(valorSeleccionado);
                    // Colocar el valor en el campo oculto
                    $('#tipo_señal_seleccionada').val(valorSeleccionado);
                
                
            });

            $('.categoria').click(function(){//para abrir el formulario

                let formulario = "formulario_" + $(this).data('categoria');
                

                if($(this).hasClass('btn-primary')){
                    $('#' + formulario).fadeOut(400);
                    $('#' + formulario).addClass('d-none');
                    
                    $(this).removeClass('btn-primary');
                    $(this).addClass('btn-light');
                }else{
                    $('.categoria').removeClass('btn-primary');
                    $('.categoria').removeClass('btn-light');

                    $('.formularios').fadeOut(400);
                    $('.formularios').addClass('d-none');
                    $('#' + formulario).fadeIn(400);
                    $('#' + formulario).removeClass('d-none');
                    $(this).addClass('btn-primary');

                }

            });

            $('form').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var datosFormulario = new FormData(this);
                var formulario = $(this).data('formulario');

                $.ajax({
                    url: url,
                    type: 'POST', 
                    data: datosFormulario, 
                    processData: false, 
                    contentType: false, 
                    success: function (respuesta) {
                     
                      if(respuesta.includes("Se registro exitosamente")){
                        //abrir modal de solicitud exitosa
                        $('#modal_solicitud_exitosa').fadeIn(400);
                        $('#modal_solicitud_exitosa').removeClass('d-none');
                        $('#container').css({
                                        "filter": "blur(5px)",
                                        "transition": "filter 0.3s ease"
                                    });
                        $('#nav').css({
                                    "filter": "blur(5px)",
                                    "transition": "filter 0.3s ease"
                                });
                        $('#sidebar').css({
                                        "filter": "blur(5px)",
                                        "transition": "filter 0.3s ease"
                                    });
                        $('form').trigger('reset');
                      }else{
                       
                        //abrir modal de error
                        $('#modal_error').fadeIn(400);
                        $('#modal_error').removeClass('d-none');
                        $('#container').css({
                                        "filter": "blur(5px)",
                                        "transition": "filter 0.3s ease"
                                    });
                        $('#nav').css({
                                        "filter": "blur(5px)",
                                        "transition": "filter 0.3s ease"
                                    });
                        $('#sidebar').css({
                            "filter": "blur(5px)",
                            "transition": "filter 0.3s ease"
                        });

                        sessionStorage.setItem('formulario', formulario);//si hay un error capturamos el formulario para asi poder mostrarlo al momento de que se recargue la pagina

                        
                      }
                    }
                });
            });

            //cerrar modal de error
            $(document).on('click',".close_error", function(){
                $('#modal_error').fadeOut(400);
                $('#modal_error').addClass('d-none');
                $('#container').removeAttr("style");
                $('#nav').removeAttr("style");
                $('#sidebar ').removeAttr("style");

                sessionStorage.setItem('errores', 'true');
                window.location.href = 'index.php?modulo=Solicitudes&controlador=SeñalNueva&funcion=getCreate';
                
                        
            });



            if (sessionStorage.getItem('errores') === 'true') {

                let boton = $('[data-formulario="'+ sessionStorage.getItem('formulario') +'"]');//traemos el boton del cual el formulario fue enviado
                
                boton.click();
                
                sessionStorage.removeItem('formulario');
                sessionStorage.removeItem('errores');
            }



            //cerrar modal de solicitud exitosa
            $(document).on('click',".close", function(){
                $('#modal_solicitud_exitosa').fadeOut(400);
                $('#modal_solicitud_exitosa').addClass('d-none');
                $('#container').removeAttr("style");
                $('#nav').removeAttr("style");
                $('#sidebar ').removeAttr("style");
                
                        
            });

            
        
    });   
    
    