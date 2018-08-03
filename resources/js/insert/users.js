$(document).ready(function(){
    $('select').select2();

    $('#addUser').submit(function(){
        var $form = $('#addUser');         //Formulario
        var $url = $form.attr('action');    //Direccion url
        var $dat = $form.serialize();       //Datos del formulario
        var $method = $form.attr('method'); //Metodo get o post
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

                    location.href=http+'admin/';
                }
            }
        });
        return false;
    });

    $('#editUser').submit(function(){
        var $form = $('#editUser');         //Formulario
        var $url = $form.attr('action');    //Direccion url
        var $dat = $form.serialize();       //Datos del formulario
        var $method = $form.attr('method'); //Metodo get o post
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
                }else
                if($data.success==true)
                {
                    if($data.message){
                        toastr.success($data.message)
                    }
                    $('#edit').fadeOut();
                    $('#modInsert').fadeIn();
                    $('#tdn'+$data.id).html($data.name);
                    $('#tdu'+$data.id).html($data.user);
                }
            }
        });

        return false;

    });

    $('#cancel').click(function(){
        $('#edit').fadeOut();
        $('#modInsert').fadeIn();
        $('#idedit').val('');
    });

    $('.editar').click(function(){
        var id=$(this).attr('data-id');
        var user=$(this).attr('data-user');
        var name=$(this).attr('data-name');
        $('#modInsert').fadeOut();
        $('#edit').fadeIn();
       
        $('#idedit').val(id);
        $('#nameEdit').val(name);
        $('#userEdit').val(user);
        $('#passEdit').val('');
        $('#pass2Edit').val('');
    });
});
