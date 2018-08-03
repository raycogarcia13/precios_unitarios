<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Actividades Gruesas
        </h3>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form class="" action="<?=site_url('nomenclador/addGrupo')?>" id="addGrupo" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <div class="form-group">
                            <label for="constr">Actividad Gruesa</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <div class="errors alert alert-danger" id="_name"><span></span></div>
                        </div>

                    <div class="form-actions" >
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Insertar</button>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>

        <div class="panel panel-primary" style="display:none" id="edit">
            <div class="panel-body">
                <form class="" action="<?=site_url('nomenclador/editGrupo')?>" id="editGrupo" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <div class="form-group">
                            <label for="constr">Actividad Gruesa a Editar</label>
                            <input type="hidden" class="form-control" name="idedit" id="idedit">
                            <input type="text" class="form-control" name="nameEdit" id="nameEdit">
                            <div class="errors alert alert-danger" id="_nameEdit"><span></span></div>
                        </div>

                    <div class="form-actions" >
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Actualizar</button>
                        <button id="cancel" type="button" class="btn btn-danger pull-left"><i class="fa fa-ban"></i> Cancelar</button>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>    
                            <th style="text-align:right">Acciones</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($grupos as $item):?>
                            <tr id="tr<?=$item['id']?>">
                                <td id="td<?=$item['id']?>"><?=$item['grupo']?></td>
                                <td style="text-align:right">
                                        <a title="Editar" data-id="<?=$item['id']?>" data-val="<?=$item['grupo']?>" href="#" class="editar btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                        <a title="Eliminar" href="<?=site_url("nomenclador/delGrupo/".$item['id'])?>" data-msg="la actividad gruesa <?=$item['grupo']?>" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

</div>

</div>