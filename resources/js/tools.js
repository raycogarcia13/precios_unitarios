$(document).ready(function(){
        $('.errors').on('click',function(){
            $(this).fadeOut('fast')
        })


        $('.delete').on('click',function(){

            var $route = $(this).attr('href'),
                $mensaje = $(this).attr('data-msg')


                console.log($route);
                console.log($mensaje);
            swal({
                    title: "Está seguro?",
                    text: "Está seguro que desea eliminar "+$mensaje,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm){

                    if (isConfirm) {
                        $.ajax({
                            url:$route,
                            type:'get',
                            dataType:'json',
                            success:function($data){
                                if($data.success==true){
                                    toastr.success($data.message)
                                    $('#tr'+$data.id).fadeOut('fast',function(){
                                        $(this).remove()
                                    })
                                }else{
                                    toastr.error($data.message)
                                }
                            }
                        })
                    } else {

                    }

                });

            return false

        })
    })