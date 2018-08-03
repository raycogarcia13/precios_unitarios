/**
 * Created by jazz on 2/24/17.
 */

function send_ajax_form(form_id, edit){

    $('#'+form_id).submit(function(){

        var $form = $('#'+form_id);         //Formulario
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

                    if(edit==false){
                        $form[0].reset();
                    }

                    if($data.message){
                        toastr.success($data.message)
                    }

                }
            }
        });

        return false;

    });

}

function send_ajax_form_data(form_id, edit){

    $('#'+form_id).on('submit',function(){

        var $form = $('#'+form_id);         //Formulario
        var $url = $form.attr('action');    //Direccion url
        var $dat = $form.serialize();       //Datos del formulario
        var $method = $form.attr('method'); //Metodo get o post

        //Ocultar todos los errores y mensajes
        $('.errors, #message').fadeOut('fast');

        $.ajax({
            url:$url,
            type:'post',
            data:new FormData(this),
            contentType: false,       // The content type used when sending data to the server.
            processData:false,
            dataType:'json',
            success:function($data){

                if($data.success==false){

                    if($data.errors){
                        $.each($data.errors,function($i,$value){
                            $('#_'+$i).html($value).fadeIn('fast');
                        });
                    }

                    if($data.message){
                        swal({
                            title: "Error!",
                            text: $data.message,
                            timer: 2500,
                            showConfirmButton: true,
                            type: "danger",
                        });
                    }

                }else{

                    if(edit==false){
                        $form[0].reset();
                    }

                    if($data.message){
                        swal({
                            title: "Success!",
                            text: $data.message,
                            timer: 2500,
                            showConfirmButton: true,
                            type: "success",
                        });
                    }

                }

            }

        });

        return false;

    });

}