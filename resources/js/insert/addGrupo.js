$(document).ready(function(){

    $('#addGrupo').submit(function(){

        var $form = $('#addGrupo');         //Formulario
        var $url = $form.attr('action');    //Direccion url
        var $dat = $form.serialize();       //Datos del formulario
        var $method = $form.attr('method'); //Metodo get o post
        //Ocultar todos los errores y mensajes
        $('.errors, #message').fadeOut('fast');

        $.ajax({
            url:$url,
            type:$method,
            dataType:'json',
            data:$dat,
            success:function($data){

                if($data.success==false){

                    if($data.errors){
                        $.each($data.errors,function($i,$value){
                            $('#_'+$i).children('span').html($value)
                            $('#_'+$i).fadeIn('fast')
                            $('#_'+$i).click(function(){
                                $(this).parent('div').children('input').focus()
                            })
                        });
                    }

                    if($data.message){
                        toastr.error($data.message)
                    }

                }else{

                    if($data.message){
                        toastr.success($data.message)
                    }

                    location.href=http+'nomenclador/grupo/';

                }
            }
        });

        return false;

    });

    $('#editGrupo').submit(function(){
        
                var $form = $('#editGrupo');         //Formulario
                var $url = $form.attr('action');    //Direccion url
                var $dat = $form.serialize();       //Datos del formulario
                var $method = $form.attr('method'); //Metodo get o post
                //Ocultar todos los errores y mensajes
                $.ajax({
                    url:$url,
                    type:$method,
                    dataType:'json',
                    data:$dat,
                    success:function($data){
                        if($data.success==true)
                        {
                            if($data.message){
                                toastr.success($data.message)
                            }
                            $('#edit').fadeOut();
                            // var id=$('#idedit').val();
                            $('#td'+$data.id).html($data.data);
                        }
                    }
                });
        
                return false;
        
            });

    $('#cancel').click(function(){
        $('#edit').fadeOut();
        $('#idedit').val('');
    });

    $('.editar').click(function(){
        var id=$(this).attr('data-id');
        var val=$(this).attr('data-val');

        $('#edit').fadeIn();
        $('#idedit').val(id);
        $('#nameEdit').val(val);
    });
});
