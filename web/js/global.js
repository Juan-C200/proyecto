    $(document).ready(function(){

        $('#form').submit(function(event){

            //evita el envio del formulario si hay errores
            event.preventDefault();
            let mensajes=[];

            //limpia mensajes de errores previos
            $('#error').html('');

            //bandera para verificar si hay errores
            let esValido = true;

            //validar campo de nombre
            const nombre= $('#nombre').val().trim();
            if(nombre === ""){
                mensajes.push("El campo Nombre es obligatorio");
                esValido = false;

            }

            //validar campo apellido
            const apellido= $('#apellido').val().trim();
            if(apellido === ""){
                mensajes.push("El campo Apellido es obligatorio");
                esValido = false;

            }

            if(esValido){
                $('#error').fadeOut(300);
                this.submit();
            }else{
                $('#error').fadeIn(400);
                $('#error').html(mensajes.map(msg =>  `${msg}<br>`).join(''));
                $('#error').removeClass('d-none');
                
            }


        });

        $(document).on('keyup',"#buscar", function(){

            let buscar = $(this).val();
            let url = $(this).attr("data-url");

            $.ajax({
                url : url,
                type : 'POST',
                data : {'buscar': buscar},
                success : function(data){
                    $('tbody').html(data);
                    console.log(data);
                }
            });
        });

        $(document).on('keyup',"#buscarTarea", function(){

            let buscar = $(this).val();
            let url = $(this).attr("data-url");

            $.ajax({
                url : url,
                type : 'POST',
                data : {'buscar': buscar},
                success : function(data){
                    $('tbody').html(data);
                    console.log(data);
                }
            });
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
                    $('tbody').html(data);
                    
                }

            });
        });

        // $(document).on('click',"#cambiar_estado_tarea", function(){
        //     let id = $(this).attr("data-id");
        //     let url = $(this).attr("data-url");
        //     let tarea = $(this).attr("data-tarea");
            

        //     $.ajax({
        //         url:url,
        //         data:{id, tarea},
        //         type: 'POST',
        //         success: function(data){
        //             $('tbody').html(data);
        //             console.log(data);
        //         }

        //     });
        // });

        $(document).on("click","#copyList",function(){
            let listUser = $("#listUser").html();
           
            $("#responsables").append(
                "<div class='col-md-4 form-group'>"+
                    "<label>Responsable</label>"+
                    "<div class='row'>"+
                        "<div class='col-md-10'>"+listUser+"</div>"+
                        "<div class='col-md-2'>"+
                            "<button class='btn btn-danger' type='button' id='removeList'>-</button>"+
                        "</div>"+
                    "</div>"+
                "</div>"
            );
        });

        $(document).on("click","#removeList",function(){
            $(this).parent().parent().parent().remove();
        });
    });    
        
