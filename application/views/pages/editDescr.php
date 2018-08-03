<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Descripción de la Actividad
        </h3>

<script>
    var idAct="<?=$descr->id_actividad?>";
</script>
    <div class="col-md-offset-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form class="" action="<?=site_url('main/editDescrAjax')?>" id="editDescr" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <input type="hidden" value="<?=$descr->id?>" name="id" id="id">
                        <div class="form-group">
                            <label>Renglón</label>
                            <select class="form-control" name="reng" id="reng">
                                <?php foreach ($renglones as $item):?>
                                    <option value="<?=$item['id']?>" <?php if($item['id']==$descr->id_renglon) echo "selected" ?> ><?=$item['renglon']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="constr">Descripción</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?=$descr->descripcion?>">
                            <div class="errors alert alert-danger" id="_name"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">UM</label>
                            <select class="form-control" name="um" id="um">
                                <?php foreach ($um as $item):?>
                                    <option value="<?=$item['id']?>" <?php if($item['id']==$descr->id_unidad) echo "selected"?> ><?=$item['unidad']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="constr">Rendimiento</label>
                            <input type="number" class="form-control" name="rend" id="rend" step="0.01" value="<?=$descr->rendimiento?>">
                            <div class="errors alert alert-danger" id="_rend"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">Precio Unitario</label>
                            <input type="number" class="form-control" name="pu" id="pu" step="0.01" value="<?=$descr->precio_unitario?>" >
                            <div class="errors alert alert-danger" id="_pu"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">Total</label>
                            <input type="number" class="form-control" name="total" id="total" step="0.01" value="<?=$descr->total?>" >
                            <div class="errors alert alert-danger" id="_total"><span></span></div>
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