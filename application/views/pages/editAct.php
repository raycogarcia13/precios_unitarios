<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Editar Actividad
        </h3>

    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form class="" action="<?=site_url('main/editActiv')?>" id="editAct" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$act->id?>">
                            <label for="constr">Grupo</label>
                            <select class="form-control" name="grupo" id="grupo">
                                <?php foreach ($grupos as $item):?>
                                    <option value="<?=$item['id']?>" <?php if($item['id']==$act->idgroup) echo "selected"?>><?=$item['grupo']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="constr">Código</label>
                            <input type="text" class="form-control" value="<?=$act->codigo?>" name="codigo" id="codigo">
                            <div class="errors alert alert-danger" id="_codigo"><span></span></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="constr">Actividad</label>
                            <input type="text" class="form-control" value="<?=$act->actividad?>" name="name" id="name">
                            <div class="errors alert alert-danger" id="_name"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">UM</label>
                            <select class="form-control" name="um" id="um">
                                <?php foreach ($um as $item):?>
                                    <option value="<?=$item['id']?>" <?php if($item['id']==$act->idum) echo "selected"?> ><?=$item['unidad']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                    </div>


                    <div class="form-actions" >
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Actualizar</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>