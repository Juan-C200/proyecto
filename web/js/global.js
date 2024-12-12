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
                    
                    table = capturarSubcadena(data,"<table class='table mt-3' id='tabla'>","</table>");

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



        
    
    
           
        // Manejador de eventos para los botones de las señales
        $(document).on('click', '.tipo', function() {

            
            $('.tipo').removeClass('btn-primary').addClass('btn-ligth');
            $(this).addClass('btn-primary');
            
            // Obtener el valor del atributo 'data-panel' del botón presionado
            var panel = $(this).data('panel');

            // Oculto ambos paneles
            $('.panel').addClass('d-none');
            

            // Muestro el panel el cual el boton referenciado fue oprimido
            $('#' + panel).removeClass('d-none');
            
            
        });

        // $(document).on('click', '.boton_cambiar_panel1', function() {
        
        //     // Obtener el valor del atributo 'data-panel' del botón presionado
        //     var panel = $(this).data('panel');
            

        //     // Oculto ambos paneles
        //     $('.cajaSeñales3, .cajaSeñales4').addClass('d-none');
            

        //     // Miestro el panel el cual el boton referenciado fue oprimido
        //     $('#' + panel).removeClass('d-none');
            
        // });


        

        // Manejador de eventos para los botones que contienen los reductores
        // $('.boton_cambiar_tipo_reductor').on('click', function() {
        //     $('#' + 'boton_panel_reductor_estructural').removeClass('btn-primary').addClass('btn-ligth');
        //     $('#' + 'boton_panel_reductor_modular').removeClass('btn-primary').addClass('btn-ligth');
        //     $('#' + 'boton_panel_reductor_señalizacion').removeClass('btn-primary').addClass('btn-ligth');


        //     // Obtener el valor del atributo 'data-panel' del botón presionado
        //     var panel = $(this).data('panel');

        //     // Oculto paneles
        //     $('#panel_reductor_estructural, #panel_reductor_modular, #panel_reductor_señalizacion').addClass('d-none');
            

        //     // Muestro el panel el cual el boton referenciado fue oprimido
        //     $('#' + panel).removeClass('d-none');
        //     $('#' + 'boton_' + panel).removeClass('btn-success').addClass('btn-primary');
            
        // });
        
        
        $(document).on('click', '.image-button', function() {//botones con imagenes
            
            $('.image-button').removeClass('btn-success').addClass('btn-light');


            if($(this).hasClass('btn-success')){
                
                $(this).removeClass('btn-success');
                $(this).addClass('btn-light');
            }else{
                $(this).removeClass('btn-light');
                $(this).addClass('btn-success');
            }

            // Obtener el valor del botón seleccionado
            var valorSeleccionado = $(this).val();
            
            // Colocar el valor en el campo oculto
            $('.input_seleccionable').val(valorSeleccionado);

        });

        $('.categoria').click(function(){//para abrir el formulario
            
            let url = $(this).data('url');
            
            if($(this).hasClass('btn-primary')){
                $('#form').fadeOut(400);
                
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-light');
            }else{
                $('.categoria').removeClass('btn-primary');
                $('.categoria').removeClass('btn-light');

                $('#form').fadeIn(400);
                $(this).addClass('btn-primary');
            }

            $.ajax({
                url:url,
                success: function(data){
                    console.log(data);
                    form = capturarSubcadena(data,"<!-- formulario -->","<!-- finFormulario -->");
                    $('#form').html(form);
                }
            });
            
        });
                

        $(document).on('submit', 'form', function(e) {
            
                e.preventDefault();
                
                var url = $(this).attr('action');
                var datosFormulario = new FormData(this);
                alert(url);
                

                $.ajax({
                    url: url,
                    type: 'POST', 
                    data: datosFormulario, 
                    processData: false, 
                    contentType: false, 
                    success: function (respuesta) {
                        console.log(respuesta);
                        form = capturarSubcadena(respuesta,"<!-- formulario -->","<!-- finFormulario -->");
                        $('#form').html(form);
                        
                        if(respuesta.includes("Se registro exitosamente")){

                            //abrir modal de solicitud exitosa
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
                            $('#modal_exitoso').fadeIn(400);
                            
                            $('form').trigger('reset');
                            $('.image-button').removeClass('btn-success');
                        }else{
                            
                            //abrir modal de error
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
                            $('#modal_error').fadeIn(400);
                        }
                    }
                });
        });

        $('.close').click(function() {
        
            $('#container').removeAttr("style");
            $('#nav').removeAttr("style");
            $('#sidebar ').removeAttr("style");
            $('.modal').fadeOut(400);
        });

            

            
        
    });   
    
    