$(document).ready(function(){

    $('select').select2();
    $('#editAct').submit(function(){

        var $form = $('#editAct');         //Formulario
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

                    location.href=http+'/main/editarActividad/'+$data.id

                }
            }
        });

        return false;

    });
});